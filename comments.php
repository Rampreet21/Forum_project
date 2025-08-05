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
        $comment = $_POST["comment"];
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);
        $tid = $_GET["tid"];
        // echo"T ".$title."D ".$desc." ID".$tid."";
        $sql1 = "INSERT INTO `comments` ( `comment_by`,`comment`, `thread_id`, `dt`) VALUES ('$user','$comment', '$tid', current_timestamp());";
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
    <title>coments</title>
    <style>

    </style>
</head>

<body>
    <?php include "components/header.php"; ?>
    <?php if ($alert) {
        echo ' <div class="alert alert-warning text-center alert-dismissible fade show mb-0" role="alert">
  <strong>ERROR !</strong> Please Login First.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

    if ($success) {
        echo ' <div class="alert alert-success text-center alert-dismissible fade show mb-0" role="alert">
  <strong>Success !</strong> Your Comment Submited.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

    <div class="container-sm w-50 mt-3">
        <div class="bg-light p-5 rounded shadow-sm">
            <?php
            $tid = $_GET["tid"];
            // echo "id " . $cid;
            $show = "SELECT * FROM `threads` WHERE `thread_id` = '$tid';";
            $result = mysqli_query($conn, $show);
            $row = mysqli_fetch_assoc($result);

            echo '<h1 class="display-8">Q. ' . $row["titles"] . '</h1>
    <p class="lead">' . $row["descriptions"] . '</p>
    <hr class="my-4"> '; ?>

            <p>Would you like this formatted as a blog post, or carousel graphic? I can help with any.</p>
            Post By:<b> <?php echo $row["thread_by"]; ?></b>
        </div>

        <h3 class="mt-5">Post a Comment</h3>
        <hr class="text-dark">
        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Type Your Comment</label>
                <textarea class="form-control" rows="4" name="comment" id="desc" required></textarea>
            </div>
            <button type="submit" class="btn btn-info text-light">Post Comment</button>
        </form>

        <h3 class="my-4">Discussions</h3>
        <hr class="text-dark">
        <?php
        // $cid = $_GET["cid"];
        $sql = "SELECT * FROM `comments` WHERE `thread_id` = '$tid';";
        $result = mysqli_query($conn, $sql);

        $nodata = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $nodata = false;
            echo ' <div class="d-flex mb-4">
        <div class="flex-shrink-0">
        <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg?semt=ais_hybrid&w=740&q=80" width="50px" alt="...">
        </div>
        <div class="flex-grow-1 ms-3 ">
       <h5 class="mb-0 fw-bold">' . $row["comment_by"] . ' at <span class="fs-6 fw-normal">' . $row["dt"] . '</span></h5>
                ' . $row["comment"] . '
            </div>
        </div>';
        }
        if ($nodata) {
            echo '<div class="shadow-sm bg-light jumbotron p-4 rounded">
                    <h4 class="display-6">No Comment found</h4>
                    <p class="lead">Give your Honest Comment!</p>
                  </div>';
        }
        ?>
    </div>



    <?php include 'components/footer.php'; ?>

</body>

</html>