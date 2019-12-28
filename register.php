<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register | PHP</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main">
    <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="register.php" method="post" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="firstname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="firstname" id="name" placeholder="First  Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="lastname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lastname" id="lastname" placeholder="Lastname Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phonenumber"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="phonenumber" id="phonenumber" placeholder=" Phone Number" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="create" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="./login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
</div>
    
</body>
<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
$(document).ready(()=>{
    document.getElementById("register-form").reset();
    $('#signup').click(function (e) {
        const valid = this.form.checkValidity()
        if(valid){
            const firstname = $('#name').val();
            const lastname = $('#lastname').val();
            const email = $('#email').val();
            const phonenumber = $('#phonenumber').val();
            const password = $('#pass').val();
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'process.php',
                data:{
                    'firstname':firstname,
                    'lastname':lastname,
                    'email':email,
                    'phonenumber':phonenumber,
                    'password':password,
                },
                success:function(data){
                    Swal.fire(
                        'Successfully!',
                        data,
                        'success'
                    )
                },
                error: function(err){
                    Swal.fire(
                        'Error!',
                        err,
                        'error'
                    )
                }
            })
        }else{
            console.log(valid)
        }
    })
})
</script>
</html>