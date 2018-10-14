/*----------------------------
	 Sign Up
------------------------------ */

function signUp() {

    if ($('#signUp').length && $.fn.formValidation) {
        
        $('.format').focus(function() {
            $(this).attr('placeholder', '__/__/____')}).blur(function() {
            $(this).attr('placeholder', '')
        });

        $('#signUp').formValidation({            
            framework: 'bootstrap4',
            live: 'submitted',
            locale: fvlang,
            fields: {
                username: {
                    validators: {
                        remote: {
                            message: fvrusername,
                            url: 'auth/check_username',
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
                            url: 'auth/check_email',
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
                confirmPassword: {
                    validators: {            
                        identical: {field: 'password'},
                        notEmpty: {}
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

            if((data.field === 'username')||(data.field === 'email')||(data.field === 'password')||(data.field === 'confirmPassword')||(data.field === 'birthDay')) {
                data.element.data('fv.messages').find('.help-block[data-fv-for="' + data.field + '"]').hide().filter('[data-fv-validator="' + data.validator + '"]').show();
            }

        })
        .off('success.form.fv')
        .on('success.form.fv', function(e) {

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
                        $.notify({
                            message: response.message,
                            url: 'signin'
                        },{
                            type: 'custom',
                            template: '<div data-notify="container" class="col-xl-4 col-lg-4 col-md-6 alert alert-{0}" role="alert">' +
                            '<a href="{3}" data-notify="url"><span data-notify="message">{2}</span></a>' +   
                            '</div>'
                        });
                    }
                
                }
            })

        })
    }

}

/*----------------------------
	 Sign In
------------------------------ */

function signIn() {

    if ($('#signIn').length && $.fn.formValidation) {
              
        $('#signIn').formValidation({

            framework: 'bootstrap4',
            live: 'submitted',
            locale: fvlang,
            fields: {
                email: {
                    validators: {
                        notEmpty: {}
                    }
                },
                password: {
                    validators: {
                        notEmpty: {}
                    }
                }
            }
        })
        .on('success.form.fv', function(e) {

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
                        window.location.href= "home";      
                    }

                }
            })

        })
    }

}

/*----------------------------
	Account Recovery
------------------------------ */
function recovery() {

    if ($('#accountRecovery').length && $.fn.formValidation) {
              
        $('#accountRecovery').formValidation({

            framework: 'bootstrap4',
            live: 'submitted',
            locale: fvlang,
            fields: {
                email: {
                    validators: {
                        notEmpty: {}
                    }
                }
            }
        })
        .on('success.form.fv', function(e) {

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
                        $.notify({message: response.message});      
                    }

                }
            })

        })
    }}

/*----------------------------
	Edit account
------------------------------ */
function editAccount() {

    if ($('#editAccount').length && $.fn.formValidation) {
        
        $('.format').focus(function() {
            $(this).attr('placeholder', '__/__/____')}).blur(function() {
            $(this).attr('placeholder', '')
        });

        $('#editAccount').formValidation({            
            framework: 'bootstrap4',
            live: 'submitted',
            locale: fvlang,
            fields: {
                email: {
                    validators: {
                        remote: {
                            message: fvremail,
                            url: 'user/check_email',
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
                confirmpassword: {
                    enabled: false,
                    validators: {            
                        identical: {field: 'newpassword'},
                        notEmpty: {}
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
        .on('keyup', '[name="newpassword"]', function(){

            var isEmpty = $(this).val() === '';

            $('#editAccount').formValidation('enableFieldValidators', 'newpassword', !isEmpty);
            $('#editAccount').formValidation('enableFieldValidators', 'confirmpassword', !isEmpty);
            
            if($(this).val().length === 1){
                $('#editAccount').formValidation('validateField', 'newpassword');
                $('#editAccountForm').formValidation('validateField', 'confirmpassword');
            }
                
        }) 
        .on('err.validator.fv', function(e, data) {

            if((data.field === 'email')||(data.field === 'newpassword')||(data.field === 'confirmpassword')||(data.field === 'birthDay')) {
                data.element.data('fv.messages').find('.help-block[data-fv-for="' + data.field + '"]').hide().filter('[data-fv-validator="' + data.validator + '"]').show();
            }

        })
        .off('success.form.fv')
        .on('success.form.fv', function(e) {

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
                        $form.formValidation('resetField', 'newpassword', true);
                        $form.formValidation('resetField', 'confirmpassword', true);
                        $form.formValidation('enableFieldValidators', 'newpassword', false);
                        $form.formValidation('enableFieldValidators', 'confirmpassword', false);
                        $.notify({message: response.message});
                    }
                
                }
            })

        })

    }

}

/* Init functions */
$(document).ready(function () { 

    signUp();
    signIn();
    recovery();    
    editAccount();

});
    
