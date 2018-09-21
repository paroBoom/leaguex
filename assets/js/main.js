(function ($) {

    "use strict";
    
    /* Init BMD */ 
    $('body').bootstrapMaterialDesign({});

    /* Init tooltips */
    $('[data-toggle="tooltip"]').tooltip({ trigger: 'hover' });
    $('[data-toggle="tooltip"]').on('shown.bs.tooltip', function() {
        $('.tooltip').addClass('scale').css('opacity', 1);
    });
        
    /* Select dropdownjs */
    $('.select').dropdown({ 'optionClass': 'ripple' });
    
    /* Animated page transition */ 
    setTimeout(function () {$('.page-loader').fadeOut();},150);

    /* Remember me - login section */ 
    if (localStorage.chkbx && localStorage.chkbx != '') {
        $('#rememberme').attr('checked', 'checked');
        $('#email').val(localStorage.usrname);
        $('#password').val(localStorage.pass);
    } else {
        $('#rememberme').removeAttr('checked');
        $('#email').val('');
        $('#password').val('');
    } 
    $('#rememberme').click(function() { 
        if ($('#rememberme').is(':checked')) {
            // save username and password
            localStorage.usrname = $('#email').val();
            localStorage.pass = $('#password').val();
            localStorage.chkbx = $('#rememberme').val();
        } else {
            localStorage.usrname = '';
            localStorage.pass = '';
            localStorage.chkbx = '';
        }
    });

    /* Notification messages (success, error e.g.) */
    $.notifyDefaults({

        placement: {from: 'bottom', align: 'left'},
        animate: {enter: 'animated slideInUp', exit: 'slideOutDown'},
        type: 'custom',
        delay: 1400,
        allow_dismiss: false,
        template: '<div data-notify="container" class="col-xl-4 col-lg-4 col-md-6 alert alert-{0}" role="alert">' +
            '<span data-notify="message">{2}</span>' +   
        '</div>'
    
    })

    /* Button submit animation */
    var $button = $('button.load-btn');
	
	$button.on('click', function() {

        var $this = $(this);
        
		if($this.hasClass('btn-loader')) {
			return false;
        }
        
        setTimeout(function() {
			$this.addClass('btn-loader');
        }, 130);
        
		setTimeout(function() {
            $this.removeClass('btn-loader');
        }, 1200);
		
    });
    
    /* Sidebar */
    var n, o = !1,
        t = !1,
        l = !1,
        r = 0,
        d = 0,
        g = 0;
    o || ((n = $('.navbar-toggler')).click(function(){
        1 == r ? ($('html').removeClass('sidebar_open'), r = 0) : ($('html').addClass('sidebar_open'), r = 1) 
    }), o = !0);    
    if(!t) {
        var m = $('.topnavbar-toggler');
        m.on('click', function() {
            1 == d ? ($('html').removeClass('topnavbar_open'), d = 0) : ($('html').addClass('topnavbar_open'), d = 1)
        }), t = !0
    }
    if(!l) {
        var h = $('.btn-minisb');
        h.on('click', function() {
            1 == g ? ($('html').removeClass('sidebar_mini'), g = 0) : ($('html').addClass('sidebar_mini'), g = 1)
        }), l = !0
    }
    $('.sidebar-left').hover(function() {
        $('html').hasClass('sidebar_mini') && $('html').addClass('sidebar_mini_hover')
    }, function() {
        $('html').hasClass('sidebar_mini') && $('html').removeClass('sidebar_mini_hover')   
    })

    // Submenu     
    $('.nav-item a, .club-info a').on('click', function() {
        $(this).parent().find('.collapse').hasClass('show') ? $(this).parent().removeClass('submenu_open') : $(this).parent().addClass('submenu_open') 
    })

    // Images upload
    if($('.upload-preview').length) {

        var button = $('#upload');
        var thumb = $('#thumbImg');
        var preview = $('.loader-preview');
        var id = $('#img-preview').attr('data-id');
        var url = $('#img-preview').attr('data-url');
        var tmp = $('#img-preview').attr('data-img');

        new AjaxUpload(button, {
            action: url,
            responseType: 'json',
            onSubmit: function(file, ext) {

                if(ext && /^(jpg|png|jpeg|gif)$/.test(ext)) {
                    this.setData({'key': id});
                    thumb.hide();
                    preview.show();
                } else {
                    $('#imageError').modal('show');
                    $('.modal-body p').html(imgType);
                    return false;
                }
               
            },
            onComplete: function(file, json) {
                    
                    if(json['error']) {
                        $('#imageError').modal('show');
                        $('.modal-body p').html(json['error']);
                        preview.hide();
                        thumb.show();
                        return false;
                    }

                    if(json['success']) {
                        var image = tmp + '/' + json['photo_file'];
                        var img_ghost = $('#img-ghost');
                        img_ghost.val(json['photo_file']);
                        thumb.attr('src', image);
                        preview.hide();
                        thumb.fadeIn(400);
                    }
                
            }
        })

    }
    
})(jQuery);