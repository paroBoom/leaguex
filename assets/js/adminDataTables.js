(function ($) {
    "use strict";

    /*----------------------------
      Datatables Custom Function 
    ------------------------------*/
    var tableCallback = function(){

        // Dropdown filter results
        var $lengthSelect = $('.card.material-table select.form-control.input-sm'); 
        var tableLength = $lengthSelect.detach();
        $('#dataTablesLength').append(tableLength);
        $('.card.material-table select.form-control.input-sm').dropdown({
            'optionClass': "ripple"
        });
        $('#dataTablesLength .dropdownjs .fakeinput').hide();
        $('#dataTablesLength .dropdownjs ul').addClass('dropdown-menu dropdown-menu-right');
        
        // Checkbox highlight
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
    
    /*----------------------------
      Datatables General Options 
    ------------------------------*/
    $.extend(true, $.fn.dataTable.defaults, {

        processing: true,
        pageLength: 25,
        language: {
        info: "_START_ - _END_ of _TOTAL_",
        paginate: {
            previous: "<i class='mdi mdi-chevron-left'></i>",
            next: "<i class='mdi mdi-chevron-right'></i>"
        },
        processing: '<div class="load-bar"><div class="bar"></div><div class="bar"></div><div class="bar"></div></div>',
        },
        responsive: {
            details: {display: $.fn.dataTable.Responsive.display.childRowImmediate, type: 'display'}
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
                {'data': 'user_name'},
                {'data': null,
                    'render': function(data){
                        if(data.user_permission === '1') {
                            return '<span class="badge badge-danger">Admin</span>';
                        } else if(data.user_permission === '2') {
                            return '<span class="badge badge-warning">Moderatore</span>'
                        } else if(data.user_permission === '3') {
                            return '<span class="badge badge-success">Utente</span>'
                        } else if(data.user_permission === '4') {
                            return '<span class="badge badge-dark">Ban</span>'
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
                }
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
            $('#addUserForm').formValidation('resetForm', true);
            $(this).find("input:first").focus();
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
                            emailAddress: {},
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

                e.preventDefault();

                var $form = $(e.target),
                fv = $form.data('formValidation');

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
                            $('#bkAddUser').modal('hide');
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

})(jQuery);