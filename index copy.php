<?php include("security/DB_connect.php"); ?>

<?php
session_start();
// if (!isset($_SESSION["loggedin"])) {
//     header("location: login.php");
//     exit();
// }
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
    <title>Forum</title>
    <style>
        body {
            background-image: url('https://picsum.photos/1920/1080');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 30vh;
            color: white;
        }
    </style>
</head>

<body>
    <?php include "components/header.php"; ?>

    <div class="container my-5" style="min-height: 60vh;">
        <div class="content text-light">
            <small class="s1">WELCOME<br></small>
            <h1>Creative Studio</h1>
            <small>MADE BY RK</small><br>
            <button class="btn btn-info btn2"><a class="nav-link" href="#tour">Take a tour</a></button>
        </div>
    </div>
    <div class="container">
        <h3 id="tour" class="text-center text-dark">Forum - Categories</h3>
        <hr class="text-dark">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-3 mb-3">
        <div class="card" style="width: 15rem;">
            <img src="https://picsum.photos/500/300" alt="Tech">
            <div class="card-body">
                <h5 class="card-title">' . $row["category_name"] . '</h5>
                <p class="card-text">' . $row["category_des"] . '</p>
                <a href="categories_list.php?cid=' . $row["category_id"] . '" class="btn btn2 btn-info">Learn more</a>
            </div>
        </div>
        </div>
    ';
            }
            ?></div>
    </div>

    <div class="mx-auto mt-5" style="width: 800px;">
        <h2 id="about" class="text-center text-dark fw-bold">About</h2>
        <hr class="text-dark">
        <p class="text-center text-dark fs-5">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe sit unde provident expedita et reiciendis aut quae, dolor quas dolores voluptatibus pariatur corrupti eos similique animi, necessitatibus deserunt quis at harum! Reprehenderit minus quibusdam accusantium aperiam. Aperiam nisi quos quibusdam sequi in ea earum, dolore saepe, ab odio tenetur enim.
        </p>
    </div>

    <?php include 'components/footer.php'; ?>

</body>

</html>