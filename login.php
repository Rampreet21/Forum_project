<?php include("security/signup_login_handler.php");

session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    header("location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <link rel="website icon" href="Flogo.png" type="png">
</head>

<body>
    <?php
    include("components/header.php");

    if ($success) {
        echo $showAlert;
    }
    if ($alert) {
        echo $showAlert;
    }
    ?>
    <div class="mt-5" style="width: 500px; margin: auto;">
        <form action="login.php" method="post">
            <h3 class="text-center" style="font-weight: bold;">Login</h3>
            <div class="mb-3">
                <label for="username" class="form-label"><i class="fa-solid fa-user"></i> Username</label>
                <input type="text" class="form-control" id="username" name="lusername" required maxlength="20">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><i class="fa-solid fa-key"></i> Password</label>
                <input type="password" class="form-control" id="password" name="lpassword" required maxlength="20">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="showPassword">
                <label class="form-check-label" for="exampleCheck1">Show Password</label>
            </div>
            <p><a href="signup.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Create New Account</a></p>
            <button type="submit" class="btn btn-primary mt-3">Login</button>

        </form>
    </div>
    <script>
        const passwordField = document.getElementById("password");
        const showPassword = document.getElementById("showPassword");

        showPassword.addEventListener("change", function() {
            if (this.checked) {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });
    </script>
</body>
</body>

</html>