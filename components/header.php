<?php

$loggedin = true;
if (isset($_SESSION["loggedin"])) {
    $loggedin = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Isecure</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./#about">About</a>
                    </li>
                    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">';

$sql = "SELECT * FROM `categories` LIMIT 4";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo ' <li><a class="dropdown-item" href="categories_list.php?cid=' . $row["category_id"] . '">' . $row["category_name"] . '</a></li>';
};

echo ' <li><hr class="dropdown-divider"></li>
        </ul>
            </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contactus.php">Contact</a>
                    </li>
                    ';
if ($loggedin) {
    echo '<li class="nav-item">
                        <a class="nav-link" href="./login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./signup.php">Sign Up</a>
                    </li>
            </ul>';
} else {
    echo '<li class="nav-item">
                        <a class="nav-link" href="security/logout.php">Logout</a>
                    </li>
            </ul>

            <form class="d-flex me-4" role="search" action="search_result.php" method="get">
                <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required/>
                <button class="btn btn-outline-info" type="submit">Search</button>
            </form>
        ';
}
echo '

                <div class="d-flex">
                    <p class="welu wel me-2">Welcome</p>
                    <P  class="welu me-3">';
if (!$loggedin) {
    echo $_SESSION["username"];
}
echo '</P>
                </div>
            </div>
        </div>
    </nav>';
