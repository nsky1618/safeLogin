// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='login'], form[name='register']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            fname: "required",
            lname: "required",
            mail: {
                required: true,
            // Specify that email should be validated
            // by the built-in "email" rule
            email: true
            },
            username: "required",
            password: {
                required: true,
                minlength: 5
            },
            repeatPassword: {
                required: true,
                minlength: 5
            }
        },
        // Specify validation error messages
        messages: {
            fname: "Please Enter Your First Name...!",
            lname: "Please Enter Your Last Name...!",
            username: "Please Enter Your Username...!",
            password: {
                required: "Please Provide a Password...!",
                minlength: "Your password must be at least 5 characters long"
            },
            repeatPassword: {
                required:  "Please Provide a Confirmation Password...!",
                minlength: "Your Confirmation password must be at least 5 characters long",
            },
            mail: "Please Enter a Valid Email Address...!"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
