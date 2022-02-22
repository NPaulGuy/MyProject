<!DOCTYPE html>
<html>
<head>
    <title>HELLO</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="#" />
</head>
<body>
<div style="margin: auto; width: 60%;">
    <label for="pwd" id="welcomeText" style="color: green">Hello, <?= $_SESSION['login']?>!</label>
    <button type="button" class="btn btn-success btn-sm" id="logout">Logout</button>
</div>

<script>
    $(document).ready(function() {
        $('#logout').on('click', function() {
            $.ajax({
                url: "src/Logout/execute.php",
                type: "POST",
                data: {
                    type: 1
                },
                success: function(dataResult) {
                    console.log(dataResult);
                    var data = JSON.parse(dataResult);
                    // если регистрация успешна, то...
                    if(data.statusCode==200) {
                        alert("Logout successful!");
                        location.href = "";
                    }
                }
            });
        });
    });
</script>
</body>
</html>
