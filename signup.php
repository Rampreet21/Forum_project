
<?php include("security/signup_login_handler.php"); ?>

<?php
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
    <title>Sign Up</title> 
    <link rel="website icon" href="Flogo.png" type="png">

</head>
    
<body>
    <?php
    include("components/header.php");
    if ($Alert) {
        echo  $showalAlert;
    }

    ?>
    <div class="mt-5" style="width: 500px; margin: auto;">
        <form action="signup.php" method="post">
            <h3 class="text-center" style="font-weight: bold;">Sign Up</h3>
            <div class="mb-3">
                <label for="username" class="form-label"><i class="fa-solid fa-user"></i> Username</label>
                <input type="text" class="form-control" id="username" name="username" required maxlength="20">
                <?php
                if ($useralert) {
                    echo $showalAlert;
                } ?>
                </div>

            <div class="mb-3">
                <label for="email" class="form-label"><i class="fa-solid fa-envelope"></i> Email</label>
                <input type="email" class="form-control" id="email" name="email" required maxlength="50">
                <?php
                if ($emailalert) {
                    echo $showalAlert;
                } ?>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label"><i class="fa-solid fa-key"></i> Password</label>
                <input type="text" class="form-control" id="password" name="password" required maxlength="20">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label"><i class="fa-solid fa-lock"></i> Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required maxlength="20">
                <?php
                if ($Error) {
                    echo $showError;
                }
                ?>
            </div>
            <p><a href="login.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> I already have an Account</a></p>
            <button type="submit" class="btn btn-primary mt-3">Sign Up</button>
        </form>
    </div>
</body>

</html>