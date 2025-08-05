<?php include("security/DB_connect.php"); ?>

<?php
$Error = false;
$Alert = false;
$useralert = false;
if(isset($_POST["username"])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $check = "SELECT * FROM `users` WHERE name = '$username';";
    $result = mysqli_query($conn, $check);
    $num = mysqli_num_rows($result);

    if ($num != 1) {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $insert = "INSERT INTO `users` (`name`, `email`, `password`, `dt`) VALUES ('$username', '$email', '$hash', current_timestamp());";
            $result = mysqli_query($conn, $insert);

            if ($result) {
                $Alert = true;
                $showalAlert = "<div class='mb-0 text-center alert alert-success alert-dismissible fade show' role='alert'><strong>Success! </strong>Your account is now created and you can login :) <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
                // header("location: login.php");
            }
        } else {
            $Error = true;
            $showError = "<span style='color:red;'>Passwords do Not Match !!</span>";
        }
    } else {
        $useralert = true;
        $showalAlert = "<span style='color:red;'>Username already Exist !!</span>";
    }
}
}

?>

<?php
$alert = false;
$success = false;
if(isset($_POST["lusername"])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["lusername"];
    $password = $_POST["lpassword"];
    
    $insert = "SELECT * FROM `users` WHERE name = '$username';";
    $result = mysqli_query($conn, $insert);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($num == 1) {
        if (password_verify($password, $row["password"])) {
        $success = true;
        $showAlert = "<div class='text-center mb-0 alert alert-success alert-dismissible fade show' role='alert'>
       <strong>Success! </strong>Logged in successfully :) <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;


        header("Location: ./index.php");
    }else {
        $alert = true;
        $showAlert = "<div class='text-center alert mb-0 alert-danger alert-dismissible fade show' role='alert'><strong>Error! </strong>Password is Wrong !! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    
}
} else {
        $alert = true;
        $showAlert = "<div class='text-center alert mb-0 alert-danger alert-dismissible fade show' role='alert'><strong>Error! </strong>Username not Found !! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    
}
}
}
?>