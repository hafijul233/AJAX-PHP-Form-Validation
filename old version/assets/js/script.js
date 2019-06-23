$(document).ready(function () {
    $('form').submit(function (event) {
        event.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        if (email.isEmpty()) {
            $('#msg').append("Email Address is Required.");
            $('#msg').show();
        } else if (password.isEmpty()) {
            $('#msg').append("Password is Required.");
            $('#msg').show();
        } else {
            event.preventDefault();
            var data = $('form').serialize();
            $.ajax({
                type: 'POST',
                url: 'validator.php',
                data: data,
                dataType: 'json', //return type
                success: function (returnMsg) {//return get function *** function is Annoymas function
                    if (returnMsg.errors == null) {
                        $('#msg').append(returnMsg.msg); // used for update content of <p> tag
                        $('#msg').show(); // display that tag paragraph of msg id  <p>
                    } else {
                        $('#msg').append(returnMsg.errors);
                        $('#msg').show();
                    }
                }
            })
        }
    })
});