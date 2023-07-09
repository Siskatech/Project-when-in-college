
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="user.png" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" name="email" id="email" class="form-control input_user" required>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control input_pass" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input  type="checkbox" name="rememberme"  class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">Remember Me</label> 
                        </div>
                    </div>
                    </div>
                     <div class="d-flex justify-content-center mt-3 login_container">
                        <input class="btn btn-primary" type="submit" id="login" name="create" value="Login">
                    </div>
                </form>
            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="reg.php" class="ml-2">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
function myFunction() {
    location.replace("index_tenant.php");
  }

    $(function(){
        $('#login').click(function(e){
            var valid = this.form.checkValidity();

            if(valid){
                var email = $('#email').val();
                var password = $('#password').val();
            

            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'jslogin.php',
                data:{email:email,password:password},
                success:function(data){
                    alert(data),myFunction();
                

                },
                error:function(data){
                    alert('There were errors while doing the operation');
                }
            });
        }else{
            alert('Sorry, There no data user');
        }
        });
    });
    
</script>
</body>
</html>
