function loginValidation(form) {

    form.on('init.field.bv', function(e, data) {
            var field = data.field, // Get the field name
                $field = data.element, // Get the field element
                bv = data.bv; // BootstrapValidator instance

            // Create a span element to show valid message
            // and place it right before the field
            var $span = $('<small/>')
                .addClass('help-block validMessage')
                .attr('data-field', field)
                .insertAfter($field)
                .hide();

            // Retrieve the valid message via getOptions()
            var message = bv.getOptions(field).validMessage;
            if (message) {
                $span.html(message);
            }
        })
        .bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                password: {
                    validators: {
                        stringLength: {
                            min: 6,
                        },
                        notEmpty: {
                            message: 'Please enter your Password.'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your Email Address. '
                        },
                        regexp: {
                            regexp: "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$",
                            message: 'The value is not a valid email address.'
                        }
                    }
                },
            }
        }).on('success.form.bv', function(e) {

            $('#success_message').slideDown({
                        opacity: "show"
                    },
                    "slow"
                ) // Do something ...
                // $('#contact_form').data('bootstrapValidator').resetForm();
                // Prevent form submission
                // e.preventDefault();
                // Get the form instance
                // var $form = $(e.target);
                // // Get the BootstrapValidator instance
                // var bv = $form.data('bootstrapValidator');
                // //  console.log($form);
                // // Use Ajax to submit form data
                //  $.ajax({
                //      method:"POST",
                //      data:
                //  })
                // $.post($form.attr('action'), $form.serialize(), function(result) {
                //     console.log(result);
                // }, 'json');
        });


}

// register

function registerValidation(form) {

    form.on('init.field.bv', function(e, data) {
            var field = data.field, // Get the field name
                $field = data.element, // Get the field element
                bv = data.bv; // BootstrapValidator instance

            // Create a span element to show valid message
            // and place it right before the field
            var $span = $('<small/>')
                .addClass('help-block validMessage')
                .attr('data-field', field)
                .insertAfter($field)
                .hide();

            // Retrieve the valid message via getOptions()
            var message = bv.getOptions(field).validMessage;
            if (message) {
                $span.html(message);
            }
        })
        .bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please supply your first name.'
                        }
                    }
                },
                surname: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please supply your surname.'
                        }
                    }
                },
                password: {
                    validators: {
                        stringLength: {
                            min: 6,
                        },
                        notEmpty: {
                            message: 'Please enter your Password.'
                        }
                    }
                },
                password_confirmation: {
                    validators: {
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same. '
                        },
                        stringLength: {
                            min: 6,
                        },
                        notEmpty: {
                            message: 'Please enter your Retype Password. '
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your Email Address.'
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'Please enter your Email Address.'
                                },
                                regexp: {
                                    regexp: "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$",
                                    message: 'The value is not a valid email address.'
                                }
                            }
                        },
                    }
                },
            }
        }).on('success.form.bv', function(e) {

            $('#success_message').slideDown({
                        opacity: "show"
                    },
                    "slow"
                ) // Do something ...
                // $('#contact_form').data('bootstrapValidator').resetForm();
                // Prevent form submission
                // e.preventDefault();
                // Get the form instance
                // var $form = $(e.target);
                // // Get the BootstrapValidator instance
                // var bv = $form.data('bootstrapValidator');
                // //  console.log($form);
                // // Use Ajax to submit form data
                //  $.ajax({
                //      method:"POST",
                //      data:
                //  })
                // $.post($form.attr('action'), $form.serialize(), function(result) {
                //     console.log(result);
                // }, 'json');
        });


}
//profile

function profileValidation(form) {

    form.on('init.field.bv', function(e, data) {
            var field = data.field, // Get the field name
                $field = data.element, // Get the field element
                bv = data.bv; // BootstrapValidator instance

            // Create a span element to show valid message
            // and place it right before the field
            var $span = $('<small/>')
                .addClass('help-block validMessage')
                .attr('data-field', field)
                .insertAfter($field)
                .hide();

            // Retrieve the valid message via getOptions()
            var message = bv.getOptions(field).validMessage;
            if (message) {
                $span.html(message);
            }
        })
        .bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please supply your name'
                        }
                    }
                },
                surname: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please supply your surname'
                        }
                    }
                },
                password: {
                    validators: {
                        stringLength: {
                            min: 6,
                        },
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your Email Address'
                        },
                        regexp: {
                            regexp: "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$",
                            message: 'The value is not a valid email address'
                        }
                    }
                },
                img: {
                    validators: {
                        file: {
                            extension: 'jpg,jpeg,png',
                            type: 'image/jpeg,image/png',
                            message: 'The selected file is not valid and img must be a file of type: jpg, jpeg, png.'
                        }
                    }
                }
            }
        }).on('success.form.bv', function(e) {

            $('#success_message').slideDown({
                        opacity: "show"
                    },
                    "slow"
                ) // Do something ...
                // $('#contact_form').data('bootstrapValidator').resetForm();
                // Prevent form submission
                // e.preventDefault();
                // Get the form instance
                // var $form = $(e.target);
                // // Get the BootstrapValidator instance
                // var bv = $form.data('bootstrapValidator');
                // //  console.log($form);
                // // Use Ajax to submit form data
                //  $.ajax({
                //      method:"POST",
                //      data:
                //  })
                // $.post($form.attr('action'), $form.serialize(), function(result) {
                //     console.log(result);
                // }, 'json');
        });




}
