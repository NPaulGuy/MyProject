<!DOCTYPE html>
<html>
<head>
    <title>Main</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="#" />
</head>
<body>
<div style="margin: auto;width: 60%;">
    <button type="button" class="btn btn-success btn-sm" id="register">Register page</button>
    <button type="button" class="btn btn-success btn-sm" id="login">Login page</button>
    <form id="register_form" name="form1" method="post">
        <div class="form-group">
            <label for="pwd" class="error-label" id="loginError" style="color: red" ></label><br>
            <label for="pwd">Login:</label><br>
            <input type="text" class="form-control" id="loginName" placeholder="LoginName" name="loginName">
        </div>
        <div class="form-group">
            <label for="pwd" class="error-label" id="passwordError" style="color: red" ></label><br>
            <label for="pwd">Password:</label><br>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <br>
            <label for="pwd">Confirm password:</label><br>
            <input type="password" class="form-control" id="confirmPassword" placeholder="ConfirmPassword" name="confirmPassword">
        </div>
        <div class="form-group">
            <label for="pwd" class="error-label" id="emailError" style="color: red" ></label><br>
            <label for="pwd">E-mail:</label><br>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="pwd" class="error-label" id="nameError" style="color: red" ></label><br>
            <label for="pwd">Name:</label><br>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
        <input type="button" name="save" class="btn btn-primary" value="Register" id="btnregister">
    </form>
    <form id="login_form" name="form1" method="post" style="display:none;">
        <div class="form-group">
            <label for="pwd" class="error-label" id="loginError_log" style="color: red" ></label><br>
            <label for="pwd">Login:</label><br>
            <input type="text" class="form-control" id="login_log" placeholder="Login" name="login">
        </div>
        <div class="form-group">
            <label for="pwd" class="error-label" id="passwordError_log" style="color: red" ></label><br>
            <label for="pwd">Password:</label><br>
            <input type="password" class="form-control" id="password_log" placeholder="Password" name="password">
        </div>
        <input type="button" name="save" class="btn btn-primary" value="Login" id="btnlogin">
    </form>
</div>

<script>
    $(document).ready(function() {
            $('#login').on('click', function() {
            $("#login_form").show();
            $("#register_form").hide();
        });
        $('#register').on('click', function() {
            $("#login_form").hide();
            $("#register_form").show();
        });
        $('#btnregister').on('click', function() {
            var login = $('#loginName').val();
            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();
            var email = $('#email').val();
            var name = $('#name').val();
            if(login!="" && password!="" && confirmPassword!="" && email!="" && name!="") {
                $.ajax({
                    url: "src/Register/execute.php",
                    type: "POST",
                    data: {
                        type:1,
                        login: login,
                        password: password,
                        confirmPassword: confirmPassword,
                        email: email,
                        name: name
                     },
                    cache: false,
                    success: function(dataResult) {
                        $('.error-label').text("");
                        var data = JSON.parse(dataResult);
                        // если регистрация успешна, то...
                        if(data.statusCode==200) {
                            alert("Registration successful!");
                        }
                        // если регистрация провалена, то...
                        else if(data.statusCode==201) {
                            
                            switch(data.errorField) {
                                case "login": 
                                {
                                    $('#loginError').text(data.text);
                                    break;
                                }
                                case "password":
                                {
                                    $('#passwordError').text(data.text);
                                    break;
                                }
                                case "email":
                                {
                                    $('#emailError').text(data.text);
                                    break;
                                }
                                case "name":
                                {
                                    $('#nameError').text(data.text);
                                    break;
                                }
                                default: 
                                {
                                    alert("User already exists!")
                                    break;
                                }
                            }
                        }
                    } 
                });
            }
            else {
                alert('Please fill all the fields!');
            }
        });
        $('#btnlogin').on('click', function() {
            var login = $('#login_log').val();
            var password =$('#password_log').val();
            if(login!="" && password!="") {
                $.ajax({
                    url: "src/Login/execute.php",
                    type: "POST",
                    data: {
                        type: 1,
                        login: login,
                        password:password
                    },
                    success: function(dataResult) {
                        $('.error-label').text("");
                        var data = JSON.parse(dataResult);
                        if(data.statusCode == 200) {
                            location.href = "";
                        }
                        else if(data.statusCode == 201) {
                            switch(data.errorField) {
                                case "login": 
                                {
                                    $('#loginError_log').text(data.text);
                                    break;
                                }
                                case "password":
                                {
                                    $('#passwordError_log').text(data.text);
                                    break;
                                }
                            }
                        }
                    }
                });
            }
            else {
                alert('Please fill all the fields!');
            }
        });
    });
</script>
</body>
</html>
