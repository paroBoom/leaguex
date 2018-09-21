(function ($) {
    "use strict";

    /*----------------------------
      Datatables Custom Function 
    ------------------------------*/
    var tableCallback = function(){

        // Dropdown filter table
        var $lengthSelect = $('.card.material-table select.form-control.input-sm'); 
        var tableLength = $lengthSelect.detach();
        $('#dataTablesLength').append(tableLength);
        $('.card.material-table select.form-control.input-sm').dropdown({'optionClass': "ripple"});
        $('#dataTablesLength .dropdownjs .fakeinput').hide();
        $('#dataTablesLength .dropdownjs ul').addClass('dropdown-menu dropdown-menu-right');
        
        // Checkbox highlight
        if ($('.check-cell input[id*=checkboxID][type=checkbox]:checked').length == 0) {
            $('.card-delete').hide();
        } else {
            $('.card-delete').show();
        }    
        $('.check-cell [id*=checkboxID]').on('change', function() {
            var $this = $(this);
            if($('.check-cell input[id*=checkboxID][type=checkbox]:checked').length == $('.check-cell input[id*=checkboxID][type=checkbox]').length){
                $('#dt-select-all').prop('checked', true);
            } else {
                $('#dt-select-all').prop('checked', false);
            }
            if($this.is(':checked')) {
                $this.closest('tr').addClass('highlight');
            } else {
                $this.closest('tr').removeClass('highlight');
            }
            if ($('.check-cell input[id*=checkboxID][type=checkbox]:checked').length == 0) {
                $('.card-delete').hide();
            } else {
                $('.card-delete').show();
            }
            var checkCount = $('.check-cell input[id*=checkboxID]:visible[type=checkbox]:checked').length;
            if (checkCount === 1) {
                var count = dtitem
                var selected = dtrow
            } else if (checkCount > 0) {
                var count = dtitems
                var selected = dtrows
            }
            $('.card-delete .text-delete').text(`${checkCount} ${count} ${selected}`);
        })

        $('#dt-select-all').change(function(){
            var $this = $(this);
            if($this.is(':checked')){
                $('.material-table table tbody .check-cell .checkbox input[type=checkbox]').each(function(){
                    $(this).closest('tr').addClass('highlight');
                })
            } else {
                $('.material-table table tbody .check-cell .checkbox input[type=checkbox]').each(function(){
                    $(this).closest('tr').removeClass('highlight');
                })
            }
            if($('.check-cell input[id*=checkboxID][type=checkbox]:checked').length == 0) {
                $('.card-delete').hide();
            } else {
                $('.card-delete').show();
            }
            var checkCount = $('.check-cell input[id*=checkboxID]:visible[type=checkbox]:checked').length;
            if (checkCount === 1) {
                var count = dtitem
                var selected = dtrow
            } else if (checkCount > 0) {
                var count = dtitems
                var selected = dtrows
            }
            $('.card-delete .text-delete').text(`${checkCount} ${count} ${selected}`);
        })

        var card = {
            cardClass: '.card',
            cardSearchOpen: 'a[data-card-search="open"]',
            cardSearchClose: 'a[data-card-search="close"]'
        };
    
        // Init search
        var oTable = $('.dataTable').DataTable();
        $('.filter-input').keyup(function() {
            oTable.search($(this).val()).draw();
        });
    
        // Card search
        $(document).on('click', card.cardSearchOpen, function(e) {
            e.preventDefault();
            var $this = $(this),
                $card = $this.closest(card.cardClass),
                $cardSearch = $card.find('.card-search');
            $cardSearch.addClass('open');
            $cardSearch.find('.form-control').focus();
        });
        $(document).on('click', card.cardSearchClose, function(e) {
            e.preventDefault();
            var $this = $(this),
            $card = $this.closest('.card'),
            $cardSearch = $card.find('.card-search');
            $cardSearch.removeClass('open');
            $cardSearch.find('.form-control').val('');
            if($card.hasClass('material-table')) {
                var oTable = $('.dataTable').DataTable();
                oTable.search($(this).val()).draw();
            }
        });

    }

    // Re-init on pagination
    $('.card.material-table').on('page.dt', function() {
        $('.card.material-table table tbody .check-cell .checkbox input[type=checkbox]').each(function(i) {
          $(this).prop('checked', false);
          $(this).closest("tr").removeClass("highlight");
        });
        setTimeout(function() {
          tableCallback();
        }, 600);
    });
    
    /*----------------------------
      Datatables General Options 
    ------------------------------*/
    $.extend(true, $.fn.dataTable.defaults, {

        processing: true,
        pageLength: 25,
        pagingType: "simple",
        language: {
            url: dtlang,
            info: "_START_ - _END_ of _TOTAL_",
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'></i>",
                next: "<i class='mdi mdi-chevron-right'></i>"
            },
            processing: '<div class="load-bar"><div class="bar"></div><div class="bar"></div><div class="bar"></div></div>',
            },
            responsive: {
                details: {display: $.fn.dataTable.Responsive.display.childRowImmediate, type: 'display'
            }
        },

        /* Init Functions */ 
        initComplete: tableCallback
         
    });

    /*----------------------------
        Users list table
    ------------------------------*/

    if($('#usersList').length && $.fn.DataTable) {

        $.fn.dataTable.moment('DD/MM/YYYY');

        // Show users
        var userstable = $('#usersList').DataTable({

            'ajax': site_url + 'admin/users/get_users',
            'responsive': true,
            'columns': [
                {   
                    'targets': 0,
                    'searchable':false,
                    'className': 'check-cell',
                    'data': 'ID',
                    'orderable':false,
                    'render': function(data){
                            return '<span class="checkbox">' +
                                '<label>' + 
                                '<input type="checkbox" id="checkboxID" name="id[]" value="' + $('<div/>').text(data).html() + '">' + 
                                '</label>' +
                                '</span>';
                    },
                },
                {'data': 'ID', 'visible': false, 'searchable':false},
                {'data': null,
                    'render': function(data){
                        if(data.user_permission === '4') {
                            return '<span class="text-lt">' + data.user_name + '</span>';
                        } else {
                            return data.user_name;
                        }
                    } 
                },
                {'data': null,
                    'render': function(data){
                        if(data.user_permission === '1') {
                            return '<span class="badge badge-danger">'+ selUG1 +'</span>';
                        } else if(data.user_permission === '2') {
                            return '<span class="badge badge-warning">'+ selUG2 +'</span>'
                        } else if(data.user_permission === '3') {
                            return '<span class="badge badge-success">'+ selUG3 +'</span>'
                        } else if(data.user_permission === '4') {
                            return '<span class="badge badge-dark">'+ selUG4 +'</span>'
                        }
                    }
                },
                {'data': 'user_email'},
                {'data': 'user_registered',
                    'render': function(data){
                        return (moment(data).format('DD/MM/YYYY'));
                    }
                },
                {'data': 'la_time',
                    'render': function(data){
                        return (moment(data).format(dtdatetime));
                    }
                },
                {'data': 'action', 'searchable': false, 'orderable': false}
            ],
            'order': [[1, 'desc']]
            
        });
        
        // Handle click on "Select all" control
        $('#dt-select-all').on('click', function(){
        
        // Get all rows with search applied
        var rows = userstable.rows({ 'search': 'applied' }).nodes();
        
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        // Add user
        $('#bkAddUser').on('shown.bs.modal', function(){
            $(this).find("input:first").focus();
        }).on('hide.bs.modal', function(e){
            $('#addUserForm').formValidation('resetForm', true);
        });

        if($('#addUserForm').length && $.fn.formValidation) {

            $('.format').focus(function() {
                $(this).attr('placeholder', '__/__/____')}).blur(function() {
                $(this).attr('placeholder', phbirthday)
            });

            $('#addUserForm').formValidation({            
                framework: 'bootstrap4',
                live: 'submitted',
                locale: fvlang,
                fields: {
                    username: {
                        validators: {
                            remote: {
                                message: fvrusername,
                                url: site_url+ 'user/check_username',
                                type: 'POST',
                                delay: 800
                            },
                            notEmpty: {},
                            stringLength: {min:4, max:30},
                            regexp: {regexp: /^[a-zA-Z0-9\s]+$/}           
                        }
                    },
                    email: {
                        validators: {
                            remote: {
                                message: fvremail,
                                url: site_url+ 'user/check_email',
                                type: 'POST',
                                delay: 800
                            },    
                            notEmpty: {},
                            regexp: {regexp:'^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$'}
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {},
                            stringLength: {min: 4, max:20}
                        }
                    },
                    birthDay: {
                        validators: {
                            notEmpty: {},
                            date: {format: 'DD/MM/YYYY'}               
                        }
                    }
                }
            })
            .find('[name="birthDay"]').mask('00/00/0000').end() 
            .on('err.validator.fv', function(e, data) {

            if((data.field === 'username')||(data.field === 'email')||(data.field === 'password')||(data.field === 'birthDay')) {
                data.element.data('fv.messages').find('.help-block[data-fv-for="' + data.field + '"]').hide().filter('[data-fv-validator="' + data.validator + '"]').show();
            }

            })
            .off('success.form.fv')
            .on('success.form.fv', function(e) {
                $('.modal-body .page-loader').show();
                e.preventDefault();

                var $form = $(e.target);
               
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function(response) {

                        if(response.error){
                            $.notify({message: response.message});
                        } else {
                            $form.formValidation('resetForm', true);
                            userstable.ajax.reload(tableCallback);
                            $('.modal-body .page-loader').fadeOut();
                            $('#bkAddUser').modal('hide');
                            $.notify({message: response.message});
                        }
                    
                    }
                })

            })
        
        }
        
        // Edit user
        $('#bkEditUser').on('show.bs.modal', function(e){
            $('.modal-body .page-loader').show();
            var id = $(e.relatedTarget).data('id'); 
            var selpermission = $(e.currentTarget).find('select[name=permission]');
            selpermission.html('');
            $.ajax({
                url: 'users/get_user',
                type: 'POST',
                dataType: 'json',
                data: 'userid=' + id,
                success: function(response) {
                    if(response.success) {
                        $('.modal-body .page-loader').fadeOut();
                        var datauser = response.datauser;
                        var selected = datauser.userpermission;
                        var birthDay = moment(datauser.userbirthday).format('DD/MM/YYYY')
                        var permission = '<option value="1">'+ selUG1 +'</option>\
                        <option value="2">'+ selUG2 +'</option>\
                        <option value="3">'+ selUG3 +'</option>\
                        <option value="4">'+ selUG4 +'</option>';
                        $(e.currentTarget).find('input[name=userid]').val(datauser.userid);
                        $(e.currentTarget).find('input[name=username]').val(datauser.username);
                        $(e.currentTarget).find('input[name=email]').val(datauser.useremail);
                        $(e.currentTarget).find('input[name=password]').val(datauser.userpassword);
                        $(e.currentTarget).find('input[name=birthDay]').val(birthDay);
                        selpermission.append(permission);
                    }
                    
                    $('.select option').each(function(){
                        if($(this).val()=== selected){
                            $(this).attr('selected', 'selected');
                        }
                    });

                    $('.select').dropdown('destroy')
                    $('.select').dropdown({ 'optionClass': 'ripple' });
                  
                }
            })           
        }).on('hide.bs.modal', function(e){
            $('#editUserForm').formValidation('resetForm', true);
        })

        if($('#editUserForm').length && $.fn.formValidation) {

            $('.format').focus(function() {
                $(this).attr('placeholder', '__/__/____')}).blur(function() {
                $(this).attr('placeholder', phbirthday)
            });

            $('#editUserForm').formValidation({            
                framework: 'bootstrap4',
                live: 'submitted',
                locale: fvlang,
                fields: {
                    username: {
                        validators: {
                            remote: {
                                message: fvrusername,
                                url: site_url+ 'admin/users/echeck_username',
                                type: 'POST',
                                delay: 800,
                                data: function(validator) {
                                    return {userid: validator.getFieldElements('userid').val()};
                                }
                            },
                            notEmpty: {},
                            stringLength: {min:4, max:30},
                            regexp: {regexp: /^[a-zA-Z0-9\s]+$/}           
                        }
                    },
                    email: {
                        validators: {
                            remote: {
                                message: fvremail,
                                url: site_url+ 'admin/users/echeck_email',
                                type: 'POST',
                                delay: 800,
                                data: function(validator) {
                                    return {userid: validator.getFieldElements('userid').val()};
                                }
                            },    
                            notEmpty: {},
                            regexp: {regexp:'^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$'}
                        }
                    },
                    newpassword: {
                        enabled: false,
                        validators: {
                            notEmpty: {},
                            stringLength: {min: 4, max:20}
                        }
                    },
                    birthDay: {
                        validators: {
                            notEmpty: {},
                            date: {format: 'DD/MM/YYYY'}               
                        }
                    }
                }
            })
            .find('input[name="birthDay"]').mask('00/00/0000').end() 
            .on('keyup', '[name=newpassword]', function(){
                var isEmpty = $(this).val() === '';
                $('#editUserForm').formValidation('enableFieldValidators', 'newpassword', !isEmpty);
                if($(this).val().length === 1) {
                    $('#editUserForm').formValidation('validateField', 'newpassword');    
                }
            })
            .on('err.validator.fv', function(e, data) {

            if((data.field === 'username')||(data.field === 'email')||(data.field === 'birthDay')) {
                data.element.data('fv.messages').find('.help-block[data-fv-for="' + data.field + '"]').hide().filter('[data-fv-validator="' + data.validator + '"]').show();
            }

            })
            .off('success.form.fv')
            .on('success.form.fv', function(e) {
                $('.modal-body .page-loader').show();
                e.preventDefault();

                var $form = $(e.target);
                
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function(response) {

                        if(response.error){
                            $.notify({message: response.message});
                        } else {
                            $form.formValidation('resetForm', true);
                            userstable.ajax.reload(tableCallback);
                            $('.modal-body .page-loader').fadeOut();
                            $('#bkEditUser').modal('hide');
                            $.notify({message: response.message});
                        }
                    
                    }
                })

            })
        
        }
   
        // Delete users
        var userDelete = function(callback){
            
            $('#btnDelete').on('click', function(){
                $('#confirmDelete').modal('show');
            });
            $("#btn-confirm").on("click", function(){
                callback(true);
                $("#confirmDelete").modal('hide');
              });
            $('#btn-delete').on('click', function(){
                callback(false);
                $('#confirmDelete').modal('hide');
            })
            
        };

        userDelete(function(confirm){
            if(confirm){
                success();
                setTimeout(function(){
                    $('.check-cell input[id*=checkboxID][type=checkbox]:checked').each(function(){
                        $(this).prop('checked', false);
                        $(this).closest('tr').fadeOut();
                        $('.card-delete').fadeOut();
                        userstable.ajax.reload(tableCallback);
                    })
                    if($('#dt-select-all').is(':checked')){
                        $('#dt-select-all').prop('checked', false);
                    };
                    $('.card-delete .text-delete').text('');
                }, 600)    
            }
        })
        
        function success(){
            $.ajax({
                url: 'users/delete_users',
                type: 'POST',
                dataType: 'json',
                data: $('.check-cell input[name="id[]"][type=checkbox]:checked').serialize(),
                success: function(response) {
                    if(response.error){
                        $.notify({message: response.message});
                    } else {
                        $.notify({
                            message: response.message,
                        },{
                            type: 'custom',
                            template: '<div data-notify="container" class="col-xl-4 col-lg-4 col-md-6 alert alert-{0}" role="alert">' +
                            '<span data-notify="message">{2}</span>' +   
                            '</div>'
                        });    
                    }
                }
            });
        }

    }

    /*----------------------------
        Clubs list table
    ------------------------------*/

    if($('#clubsList').length && $.fn.DataTable) {

        $.fn.dataTable.moment('DD/MM/YYYY');

        // Show clubs
        var clubstable = $('#clubsList').DataTable({

            'ajax': site_url + 'admin/clubs/get_clubs',
            'responsive': true,
            'columns': [
                {   
                    'targets': 0,
                    'searchable':false,
                    'className': 'check-cell',
                    'data': 'club_id',
                    'orderable':false,
                    'render': function(data){
                            return '<span class="checkbox">' +
                                '<label>' + 
                                '<input type="checkbox" id="checkboxID" name="id[]" value="' + $('<div/>').text(data).html() + '">' + 
                                '</label>' +
                                '</span>';
                    },
                },
                {'data': 'club_id', 'visible': false, 'searchable':false},
                {'data': 'clubinfo', 'className': 'all'},
                {'data': 'club_registered',
                    'render': function(data){
                        return (moment(data).format('DD/MM/YYYY'));
                    }
                },
                {'data': 'action', 'searchable': false, 'orderable': false}
            ],
            'order': [[1, 'desc']]
            
        });
        
        // Handle click on "Select all" control
        $('#dt-select-all').on('click', function(){
        
        // Get all rows with search applied
        var rows = clubstable.rows({ 'search': 'applied' }).nodes();
        
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        // Add club
        $('#bkAddClub').on('shown.bs.modal', function(){
            $('#addClubForm').formValidation('resetForm', true);
            $(this).find("input:first").focus();
        });

        if($('#addClubForm').length && $.fn.formValidation) {

            $('#addClubForm').formValidation({            
                framework: 'bootstrap4',
                live: 'submitted',
                locale: fvlang,
                fields: {
                    clubname: {
                        validators: {
                            notEmpty: {},
                            stringLength: {min:2, max:30}
                        }
                    }
                }
            })
            .on('err.validator.fv', function(e, data) {

            if((data.field === 'clubname')) {
                data.element.data('fv.messages').find('.help-block[data-fv-for="' + data.field + '"]').hide().filter('[data-fv-validator="' + data.validator + '"]').show();
            }

            })
            .off('success.form.fv')
            .on('success.form.fv', function(e) {
                $('.modal-body .page-loader').show();
                e.preventDefault();

                var $form = $(e.target);
               
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function(response) {

                        if(response.error){
                            $.notify({message: response.message});
                        } else {
                            $form.formValidation('resetForm', true);
                            clubstable.ajax.reload(tableCallback);
                            $('.modal-body .page-loader').fadeOut();
                            $('#bkAddClub').modal('hide');
                            $.notify({message: response.message});
                        }
                    
                    }
                })

            })
        
        }

        // Edit club
        $('#bkEditClub').on('show.bs.modal', function(e){
            $('.modal-body .page-loader').show();
            var id = $(e.relatedTarget).data('id'); 
            $.ajax({
                url: 'clubs/get_club',
                type: 'POST',
                dataType: 'json',
                data: 'clubid=' + id,
                success: function(response) {
                    if(response.success) {
                        $('.modal-body .page-loader').fadeOut();
                        var dataclub = response.dataclub;
                        $('#thumbImg').attr('src', site_url+'assets/img/club-logo/'+ dataclub.clublogo +'');
                        $('#img-preview').attr('data-id', dataclub.clubid);
                        $(e.currentTarget).find('input[name=img-ghost]').val(dataclub.clublogo);
                        $(e.currentTarget).find('input[name=clubid]').val(dataclub.clubid);
                        $(e.currentTarget).find('input[name=clubname]').val(dataclub.clubname);
                    }
                }
            })           
        }).on('hide.bs.modal', function(e){
            $('#editClubForm').formValidation('resetForm', true);
        })

        if($('#editClubForm').length && $.fn.formValidation) {

            $('#editClubForm').formValidation({            
                framework: 'bootstrap4',
                live: 'submitted',
                locale: fvlang,
                fields: {
                   clubname: {
                        validators: {
                            notEmpty: {},
                            stringLength: {min:4, max:30},
                        }
                    }
                }
            })
            .on('err.validator.fv', function(e, data) {

            if((data.field === 'clubname')) {
                data.element.data('fv.messages').find('.help-block[data-fv-for="' + data.field + '"]').hide().filter('[data-fv-validator="' + data.validator + '"]').show();
            }

            })
            .off('success.form.fv')
            .on('success.form.fv', function(e) {
                $('.modal-body .page-loader').show();
                e.preventDefault();

                var $form = $(e.target);
                
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function(response) {

                        if(response.error){
                            $.notify({message: response.message});
                        } else {
                            $form.formValidation('resetForm', true);
                            clubstable.ajax.reload(tableCallback);
                            $('.modal-body .page-loader').fadeOut();
                            $('#bkEditClub').modal('hide');
                            $.notify({message: response.message});
                        }
                    
                    }
                })

            })
        
        }

        // Delete clubs
        var clubDelete = function(callback){
            
            $('#btnDelete').on('click', function(){
                $('#confirmDelete').modal('show');
            });
            $("#btn-confirm").on("click", function(){
                callback(true);
                $("#confirmDelete").modal('hide');
              });
            $('#btn-delete').on('click', function(){
                callback(false);
                $('#confirmDelete').modal('hide');
            })
            
        };

        clubDelete(function(confirm){
            if(confirm){
                success();
                setTimeout(function(){
                    $('.check-cell input[id*=checkboxID][type=checkbox]:checked').each(function(){
                        $(this).prop('checked', false);
                        $(this).closest('tr').fadeOut();
                        $('.card-delete').fadeOut();
                        clubstable.ajax.reload(tableCallback);
                    })
                    if($('#dt-select-all').is(':checked')){
                        $('#dt-select-all').prop('checked', false);
                    };
                    $('.card-delete .text-delete').text('');
                }, 600)    
            }
        })
        
        function success(){
            $.ajax({
                url: 'clubs/delete_clubs',
                type: 'POST',
                dataType: 'json',
                data: $('.check-cell input[name="id[]"][type=checkbox]:checked').serialize(),
                success: function(response) {
                    if(response.error){
                        $.notify({message: response.message});
                    } else {
                        $.notify({
                            message: response.message,
                        },{
                            type: 'custom',
                            template: '<div data-notify="container" class="col-xl-4 col-lg-4 col-md-6 alert alert-{0}" role="alert">' +
                            '<span data-notify="message">{2}</span>' +   
                            '</div>'
                        });    
                    }
                }
            });
        }

    }

})(jQuery);