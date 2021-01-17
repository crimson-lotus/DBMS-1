<?php
    if(isset($_POST['submit'])) {
        include('../dbconnection.php');
        // echo $_POST['cat'];
        // echo $_POST['des'];
        // echo $_POST['criteria'];
        $cat = $_POST['ctype'];
        // $des = $_POST['des'];
        // $crit = $_POST['criteria'];

        // $query = "UPDATE `category`
        //         SET `cat_description`='$des', `cat_criteria`='$crit'
        //         WHERE `cat_type` = '$cat'";
        $query = "SELECT * FROM `category` WHERE `cat_type`='$cat'";
        $run = mysqli_query($conn,$query);

        if(mysqli_num_rows($run) > 0) {
            header("location: update-cat-options.php?ctype=$cat");
        }
        else {
            ?>
            <script type="text/javascript">
               alert("No Such Information Exists!");
               window.open('cat-options.php','_self');
            </script>
            <?php
        }

        // if($run == true) {
            
            // <!-- <script type="text/javascript">
            //    alert("Information Updated!");
            //    window.open('cat-options.php','_self');
            // </script> -->
            
        // }
        // else {
        //     echo("error: ".mysqli_error($conn));
        // }
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

        .big-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            /* align-items: center; */
        }

        .details-container {
            margin: 0;
            width: 10%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .details-container div {
            border-radius: 12px;
        }

        .login-form {
            width: 500px;
            padding: 9% 0% 5% 0%;
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
        
        <h4 class="up-head text-center" style="margin-top: 3%;">Category Types</h4>

        <div class="big-container">

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
        </div>

        <h5 class="text-center" style="margin-top: 2.7%;">Select Category Type to be Updated</h5>

        <div class="container d-flex justify-content-center">
            <div class="row text-center">
                <div class="form">
                    <form class="login-form" method="post" action="update-cat.php">
                        <label class="first" for="type">Category : 
                            <select style="padding: 3px 9px; margin-left: 54px;" name="ctype" id="ctype" required>
                                <option value="" disabled selected hidden>Select Category Type to update</option>
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
                        <!-- <input id="type" type="text" placeholder="Enter Category" name="cat" required> -->
                        </label><br>
                        <!-- <label for="description">Description : <textarea name="des" id="description" cols="30" rows="5" placeholder="Description" required></textarea></label><br>
                        <label for="criteria">Criteria : <textarea name="criteria" id="criteria" cols="30" rows="5" placeholder="Criteria" required></textarea> </label><br> -->
                        <button type="submit" class="btn btn-details btn-primary" name="submit" value="select"> Select </button><br>
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