<?php include("security/DB_connect.php"); ?>

<?php
session_start();
// if (!isset($_SESSION["loggedin"])) {
//     header("location: login.php");
//     exit();
// }
$search = $_GET["search"];
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
    <title>Search Result</title>
</head>

<body>
    <?php include "components/header.php"; ?>

    <div class="my-5 mx-auto bg-light rounded shadow-sm p-4" style="width: 1000px; min-height: 73vh">
        <h2 class="text-dark mb-4">Result for <b><em>"<?php echo $search; ?>"</em></b></h2>
        <?php

        $sql = "SELECT * FROM threads WHERE MATCH (`titles`, `descriptions`) against ('$search');";
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
                  </div>

                    <p class="mt-2">Suggestions:</p>
                    <ul>
                        <li>Make sure all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords.</li>
                        <li>Try fewer keywords.</li>
                    </ul>
                ';
        }
        ?>
    </div>

    <?php include 'components/footer.php'; ?>

</body>

</html>