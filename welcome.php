<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == !true) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">

    <style>
        .containor-1{
            font-family: 'Montserrat', sans-serif;
            margin-top: 2px;
        }
    </style>


    <title>welcome</title>
</head>

<body>
    <nav class='containor'>
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
            <div class='container-fluid'>
                <a class='navbar-brand' href='#'>Navbar</a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='#'>Home</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='#'>SignIn</a>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='true'>
                                Dropdown
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                <li><a class='dropdown-item' href='#'>Action</a></li>
                                <li><a class='dropdown-item' href='#'>Another action</a></li>
                                <li>
                                    <hr class='dropdown-divider'>
                                </li>
                                <li><a class='dropdown-item' href='#'>Something else here</a></li>
                            </ul>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link disabled'>Contact Us</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='logout.php'>logout</a>
                        </li>

                    </ul>
                    <li class='nav-item d-flex'>
                        <a class='nav-link me-2' href='#'> <img src="download (1).jpeg" alt="" width="32px" height="32px" style="border-radius: 50%;">
                        </a>
                        <p style="color: white;">
                            <?php echo $_SESSION['username']; ?>
                        </p>
                    </li>

                </div>
            </div>
        </nav>
    </nav>

    <div class='containor-1'>
        <center>
            <h2><?php echo "Welcome! " . $_SESSION['username']; ?> </h2>
        </center>
    </div>

<div class="card">
  <img src="..." class="card-img-top" alt="...">

  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div class="card" aria-hidden="true">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title placeholder-glow">
      <span class="placeholder col-6"></span>
    </h5>
    <p class="card-text placeholder-glow">
      <span class="placeholder col-7"></span>
      <span class="placeholder col-4"></span>
      <span class="placeholder col-4"></span>
      <span class="placeholder col-6"></span>
      <span class="placeholder col-8"></span>
    </p>
    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
  </div>
</div>

</body>

</html>