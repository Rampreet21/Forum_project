<?php include("security/DB_connect.php"); ?>

<?php
$alert = false;
$success = false;
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (!isset($_SESSION["loggedin"])) {
    $alert = true;
} else {
        $user = $_SESSION["username"];
        $title = $_POST["title"];
        $title = str_replace("<", "&lt;", $title);
        $title = str_replace(">", "&gt;", $title);
        $desc = $_POST["desc"];
        $desc = str_replace("<", "&lt;", $desc);
        $desc = str_replace(">", "&gt;", $desc);

        $cid = $_GET["cid"];
        // echo"T ".$title."D ".$desc." ID".$cid."";

        $sql1 = "INSERT INTO `threads` (`thread_by`,`titles`, `descriptions`, `cat_id`, `dt`) VALUES ('$user','$title', '$desc', '$cid', current_timestamp());";
        mysqli_query($conn, $sql1);
        $success = true;
        
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
    <link rel="website icon" href="Flogo.png" type="png">
    <title>Categories</title>
    <style>

    </style>
</head>

<body>
    <?php include "components/header.php"; ?>
    <?php if ($alert) {
        echo ' <div class="alert alert-warning text-center alert-dismissible fade show mb-0" role="alert">
  <strong>ERROR !</strong> Please Login First.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}

        if ($success) {
            echo ' <div class="alert alert-success text-center alert-dismissible fade show mb-0" role="alert">
  <strong>Success !</strong> Your Question Submited.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
?>

    <div class="container-sm w-50 mt-3">
        <div class="bg-light p-5 rounded shadow-sm">
            <?php
            $cid = $_GET["cid"];
            // echo "id " . $cid;
            $sql = "SELECT * FROM `categories` WHERE `category_id` = '$cid';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            echo '<h1 class="display-5">Welcome to ' . $row["category_name"] . ' Forums!</h1>
    <p class="lead">' . $row["category_des"] . '</p>
    <hr class="my-4"> '; ?>

            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-info text-light btn-lg mt-2" href="#bq" role="button">Browse more</a>
        </div>
        <h3 class="mt-5">Aske Your Question</h3>
        <hr class="text-dark">
        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" class="form-control" id="text" name="title" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="4" name="desc" id="desc" required></textarea>
            </div>
            <button type="submit" class="btn btn-info text-light">Submit</button>
        </form>

        <h3 id="bq" class="my-4">Browse Qusetions</h3>
        <hr class="text-dark">
        <?php
        // $cid = $_GET["cid"];
        $sql = "SELECT * FROM `threads` WHERE `cat_id` = '$cid';";
        $result = mysqli_query($conn, $sql);

        $nodata = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $nodata = false;
            echo ' <div class="d-flex mb-4">
        <div class="flex-shrink-0">
        <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg?semt=ais_hybrid&w=740&q=80" width="50px" alt="...">
        </div>
        <a class="nav-link" href="comments.php?tid=' . $row["thread_id"] . '">
        <div class="flex-grow-1 ms-3 ">
           </a><a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-50-hover" href="comments.php?tid=' . $row["thread_id"] . '"><h5 class="mb-0 fw-bold">' . $row["titles"] . '</h5></a><a class="nav-link" href="comments.php?tid=' . $row["thread_id"] . '">
                ' . $row["descriptions"] . '
            </div></a> 
            <div class="fs-5"><span class="text-nowrap fs-6 fw-normal">' . $row["dt"] . '</span></div>
            
        </div> ';
        }


        if ($nodata) {
            echo '<div class="shadow-sm bg-light jumbotron p-4 rounded">
                    <h4 class="display-6">No questions found</h4>
                    <p class="lead">Be the first to ask a question in this category!</p>
                  </div>';
        }
        ?>
    </div>



    <?php include 'components/footer.php'; ?>

</body>

</html>