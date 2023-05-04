<script>
    $('#generate-password-btn').click(function(){
        $.ajax({
            url: "{{ route('admin.generate.password') }}",
            success: function(response) {
                $('#password').val(response.password);
                $('#confirmation_password').val(response.password);
            }
        });
    });
    document.getElementById('show-password-btn').addEventListener("click", function() {
        var passwordField = document.getElementById('password');

        if(passwordField.type === 'password') {
            passwordField.type = 'text';
        }
        else {
            passwordField.type = 'password';
        }
        if(confirmPasswordField.type === 'password'){
            confirmPasswordField.type = 'text';
        }
        else {
            confirmPasswordField.type = 'password';
        }
    });
    document.getElementById('show-confirmationPassword-btn').addEventListener("click", function() {
        var confirmPasswordField = document.getElementById('confirmation_password');
        if(confirmPasswordField.type === 'password'){
            confirmPasswordField.type = 'text';
        }
        else {
            confirmPasswordField.type = 'password';
        }
    });
    document.getElementById('show-password-btn').addEventListener("click", function() {
        $(this).find('i').toggleClass('fa-eye fa-eye-slash')
    });
    document.getElementById('show-confirmationPassword-btn').addEventListener("click", function() {
        $(this).find('i').toggleClass('fa-eye fa-eye-slash')
    });
</script>
