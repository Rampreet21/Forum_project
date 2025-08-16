<?php include("security/DB_connect.php"); ?>

<?php
$alert = false;
$success = false;
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["loggedin"])) {
        $alert = true;
    } else {

        if (isset($_POST["email"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];
            $sql = "INSERT INTO `contact` (`name`, `email`, `message`, `dt`) VALUES ('$name', '$email', '$message', current_timestamp())";
            // $result = mysqli_query($conn, $sql);
            $success = true;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <title>contact us</title> 
    <link rel="website icon" href="Flogo.png" type="png">
</head>

<body>
    <?php include "components/header.php"; ?>
    <?php
    if ($alert) {
        echo ' <div class="alert alert-warning text-center alert-dismissible fade show mb-0" role="alert">
  <strong>ERROR !</strong> Please Login First.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($success) {
        echo ' <div class="alert alert-success text-center alert-dismissible fade show mb-0" role="alert">
  <strong>Success !</strong> Your message successfuly sent.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    } ?>

    <div class="my-5 mx-auto " style="width: 600px; height: 73vh;">
        <h3 class="text-center">Contact Us</h3>
        <hr class="bg-dark">
        <form action="contactus.php" method="post">
            <div class="mb-3">
                <label for="exampleInputname1" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" required maxlength="20">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Message</label>
                <textarea class="form-control" name="message" rows="4" maxlength="200" required> </textarea>
            </div>
            <button type="submit" class="mb-5 btn btn-primary">Submit</button>
        </form>
    </div>

    <?php include 'components/footer.php'; ?>

</body>

</html>