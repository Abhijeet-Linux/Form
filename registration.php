<?php

require_once 'config.php';

$username = $password = $confirm_password = '';
$username_err = $password_err = $confirm_password_err = '';




// check for post method 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Checks for user
    if (empty(trim($_POST["username"]))) {  //--> userid blank execute 
        $username_err = "User cannot be blank";
    }
    else { // --> userid is not blank

        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // set the value of param username
            $param_username = trim($_POST['username']);

            // try to execute the statement 

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            }
        } else {
            echo "Something went wrong!";
        }
    }

    mysqli_stmt_close($stmt);



    // Checks for password

    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";

    } elseif (strlen(trim($_POST['password'])) < 5) {
        # code...
        $password_err = "The length of password should not be less than five";

    } else {
        # code...
        $password = trim($_POST['password']);
    }

    // confirm the password
   if (trim($_POST['password']) != trim($_POST['confirm_password'])) {
        # code...
        $confirm_password_err = "Password not matched!";
    } elseif (trim($_POST['password']) == trim($_POST['confirm_password'])) {
        # code...
        $confirm_password = trim($_POST['confirm_password']);
    }


    // if there were no any error then just goahead and insert into the table

    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql =  "INSERT INTO users (username, password) VALUES (?, ?);";
        $stmt =  mysqli_prepare($con, $sql);
        if ($stmt) {
            # code...
            mysqli_stmt_bind_param($stmt, 'ss', $param_username, $param_password);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            echo "you goes right";
        }

        // try to execute the querry
        if (mysqli_stmt_execute($stmt) ) {
            # code...
            header("location: login.php"); //header for redirecting to the given location
        } else {
            echo "Something went wrong. Not able to redirect ...";
            echo $stmt;
        }
        mysqli_stmt_close($stmt);
    }

    else {
        echo $username_err ;
        echo $password_err ;
        echo $confirm_password_err ;

    }

    mysqli_close($con);
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .containor-2 {
            margin-top: 2rem;
            margin-left: 21rem;
            margin-right: 20rem;
            /* justify-content: center;
            align-items: center;
            text-align: center;
            max-width: 80%;
            margin: auto; */
        }
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registration Form!</title>
</head>

<body>
    <!-- <h1>Hello, world!</h1>-->
    <nav class="containor-1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Registration</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">LogIn</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                More
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Reaction</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Newton</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </nav>

    <div class="containor-2">

        <h1>Register Yourself here !</h1> <br>
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div> <br>
            <div class="form-group">
                <label for="exampleInputPassword1">password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div> <br>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1"> <br>
            </div>
            <!-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>