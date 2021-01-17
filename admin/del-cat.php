<?php
    if(isset($_POST['submit'])) {
        include('../dbconnection.php');
        // echo $_POST['cat'];
        $cat = $_POST['cat'];

        $query = "DELETE FROM `category` WHERE cat_type='$cat'";
        $run = mysqli_query($conn,$query);

        if($run == true) {
            ?>
            <script type="text/javascript">
               alert("Information Deleted!");
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
        <link rel="stylesheet" href="">
        <!-- <link rel="stylesheet" href="../css/back-img.css"> -->
    </head>
    <style>

        .del-head {
            margin-top: 6%;

        }

        .details-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .details-container div {
            border-radius: 12px;
        }

        .login-form {
            width: 500px;
            padding: 12% 0% 5% 0%;
        }

        .login-form label {
            width: 81%;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        .login-form label input {
            margin-left: 20px;
        }

        .login-form button {
            margin: 1.5% 0 2.1%;
        }
    </style>
    <body class="text-center">

        <h4 class="del-head">Category Types</h4>

        <?php
            include('../dbconnection.php');
            $query = "SELECT *FROM`category`";
            $run = mysqli_query($conn, $query);
            $row = mysqli_num_rows($run);
            while($data = mysqli_fetch_assoc($run)) {
                ?>
                <div class="container-fluid p-3 bg-white details-container">
                    <div class="row p-1 border border-primary">
                        <div class="col-12"><?php echo $data['cat_type'] ?></div>
                    </div>
                </div>
                <?php
            }
        ?>


        <div class="container d-flex justify-content-center">
            <div class="row text-center">
                <div class="form">
                    <form class="login-form" method="post" action="del-cat.php">
                        <label for="type">Category : 
                            <select style="padding: 3px 9px; margin-left: 21px;" name="cat" required>
                                <option value="" disabled selected hidden>Select Category to be deleted</option>
                                <?php
                                    include('../dbconnection.php');
                                    $query = "SELECT * FROM `category`";
                                    $run = mysqli_query($conn,$query);
                                    while($data = mysqli_fetch_assoc($run)) {
                                        ?>
                                        <option value="<?php echo $data['cat_type'] ?>"><?php echo $data['cat_type'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        <!-- <input id="type" type="text" placeholder="Enter Category Name to be deleted" name="cat" required> -->
                        </label><br>
                        <button type="submit" class="btn btn-details btn-primary" name="submit" value="delete"> Delete </button><br>
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