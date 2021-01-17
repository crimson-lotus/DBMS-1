<?php

session_start();
if(isset($_SESSION['uid'])) header('location: admin/admin-page.html');

include('dbconnection.php');
if(isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Admin WHERE username='$username' AND password='$password'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_num_rows($run);

    if($row < 1) {
        ?>

        <script type="text/javascript">
            alert("Invalid Details");
            window.open('login.php', '_self');
        </script>
        <?php

    } else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['uid'];
        $_SESSION['uid'] = $id;
        header('location: admin/admin-page.html');
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="Login page specifying the different login routes for Admin and Doctor">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/signin.css">
        <!-- <link rel="stylesheet" href="css/back-img.css"> -->
    </head>
    <body>
        <div class="flex-container">
            <div class="form-signin">
                <form action="login.php" method="post">
                    <h1 class="h3 mb-3 fw-normal">Sign in for Administrator</h1>
                    <label for="adminId" class="visually-hidden">Unique Id</label>
                    <input type="text" id="adminId" name="user" class="form-control" placeholder="Username" required autofocus>
                    <label for="password" class="visually-hidden">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <button class="w-100 btn btn-lg btn-primary admin-btn" name="login" type="submit">Sign in</button>
                </form>
            </div>
            <!-- <div class="vertical-hr"></div>
            <div class="form-signin">
                <form>
                    <h1 class="h3 mb-3 fw-normal">Sign in for Doctor</h1>
                    <label for="docId" class="visually-hidden">Unique Id</label>
                    <input type="text" id="docId" class="form-control" placeholder="Unique ID" required autofocus>
                    <label for="password" class="visually-hidden">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Password" required>
                    <button class="w-100 btn btn-lg btn-primary doc-btn" type="submit">Sign in</button>
                </form>
            </div> -->
        </div>
        <footer class="login-footer">
            <button class="btn btn-lg btn-primary footer-btn" type="button"><a href="front-page.html">Back To Home Page </a></button>
        </footer>
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>