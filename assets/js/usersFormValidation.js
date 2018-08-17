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
                            url: 'user/check_username',
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
                            url: 'user/check_email',
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
                        window.location.href= "home";      
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
    
});
    
