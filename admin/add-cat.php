<?php
    if(isset($_POST['submit'])) {
        include('../dbconnection.php');

        // echo $_POST['new-cat'];
        // echo $_POST['des'];
        // echo $_POST['criteria'];
        $cat = $_POST['new-cat'];
        $des = $_POST['des'];
        $crit = $_POST['criteria'];

        $query = "INSERT INTO `category`(`cat_type`, `cat_description`, `cat_criteria`) VALUES ('$cat', '$des', '$crit')";
        $run = mysqli_query($conn,$query);

        if($run == true) {
            ?>
            <script type="text/javascript">
               alert("Information Added!");
               window.open('cat-options.php','_self');
            </script>
            <?php
        }
        else {
            echo("error: ".mysqli_error($conn));
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Core Bootstrap Code -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- Custom Styles -->
        <!-- <link rel="stylesheet" href=""> -->
        <!-- <link rel="stylesheet" href="../css/back-img.css"> -->
    </head>
    <style>
        label textarea{
            vertical-align: text-top;
        }

        .login-form {
            width: 500px;
            padding: 20% 0% 5% 0%;
        }

        .login-form label {
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .login-form label:first-child {
            justify-content: flex-start;
        }

        .login-form label:first-child input {
            margin-left: 69px;
        }

        .login-form button {
            margin: 1.5% 0 2.1%;
        }
    </style>
    <body>
        
        <h4 class="text-center" style="margin-top: 3%;">Enter Information</h4>
        <div class="container d-flex justify-content-center">
            <div class="row text-center">
                <div class="form">
                    <form class="login-form" method="post" action="add-cat.php">
                        <label class="first" for="type">Category : <input id="type" type="text" placeholder="New Category" name="new-cat" required></label><br>
                        <label for="description">Description : <textarea name="des" id="description" cols="30" rows="5" placeholder="Description" required></textarea></label><br>
                        <label for="criteria">Criteria : <textarea name="criteria" id="criteria" cols="30" rows="5" placeholder="Criteria" required></textarea> </label><br>
                        <button type="submit" class="btn btn-details btn-primary" name="submit" value="Submit"> Add Details </button><br>
                        <a href="cat-options.php"><button class="btn btn-details btn-primary" type="button">Back To Options</button></a>
                    </form>
                </div>
            </div>
        </div>
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>