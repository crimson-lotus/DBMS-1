<?php
    if(isset($_POST['submit'])) {
        include('../dbconnection.php');
        $preid = $_POST['preid'];
        $prename = $_POST['prename'];
        $precat = $_POST['precat'];
        $predoc = $_POST['predoc'];

        $query = "UPDATE `prescription`
                SET `medicine`='$prename', `pres_cat`='$precat', `pres_doc`='$predoc'
                WHERE `pres_id` = '$preid'";
        $run = mysqli_query($conn,$query);

        if($run == true) {
            ?>
            <script type="text/javascript">
               alert("Information Updated!");
               window.open('pres-options.php','_self');
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
    </head>
    <style> 

        .row-container div:first-child {
            border-radius: 9px 0 0 9px;
        }

        .row-container div:last-child {
            border-radius: 0 9px 9px 0;
        }

        .login-form {
            width: 600px;
            padding: 9% 0% 5% 0%;
        }

        .login-form label {
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .login-form label input {
            width: 315px;
        }

        /* .login-form label.begin {
            justify-content: flex-start;
        }

        .first {
            margin-left: 57px;
        }

        .second {
            margin-left: 30px;
        }

        .third {
            margin-left: 39px;
        } */

        .login-form button {
            margin: 1.5% 0 2.1%;
        }
    </style>
    <body>

        <h5 class="text-center" style="margin-top: 2.7%;">Enter details to be Updated</h5>

        <div class="container d-flex justify-content-center">
            <div class="row text-center">
                <div class="form">
                    <?php
                        $preid = $_GET['preid'];
                        include('../dbconnection.php');
                        $query = "SELECT * FROM `prescription` WHERE `pres_id`='$preid'";
                        $run = mysqli_query($conn,$query);
                        $data = mysqli_fetch_assoc($run);
                    ?>
                    <form class="login-form" method="post" action="update-pres-options.php">
                        <label class="begin" for="id">Prescription ID : <input class="first" id="id" type="text" placeholder="Prescription Id" name="preid" value="<?php echo $data['pres_id'] ?>" required></label><br>
                        <label class="begin" for="name">Prescribed Medicine : <input class="second" id="name" type="text" placeholder="Medicine Name for Prescription" name="prename" value="<?php echo $data['medicine'] ?>" required></label><br>
                        <label class="begin" for="med">Prescription Category : 
                            <select style="padding: 3px 117px;" name="precat" id="precat" required>
                                <option value="<?php echo $data['pres_cat'] ?>" selected hidden><?php echo $data['pres_cat'] ?></option>
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
                        <!-- <input class="third" id="med" type="text" placeholder="For which category prescription belongs to" name="precat" required> -->
                        </label><br>
                        <?php
                            $preid = $_GET['preid'];
                            include('../dbconnection.php');
                            $query = "SELECT * FROM `prescription` WHERE `pres_id`='$preid'";
                            $run = mysqli_query($conn,$query);
                            $data = mysqli_fetch_assoc($run);
                        ?>
                        <label class="begin" for="predoc">Prescribed by Doctor : 
                            <select style="padding: 3px 126px;" name="predoc" id="predoc" required>
                                <option value="<?php echo $data['pres_doc'] ?>" selected hidden><?php echo $data['pres_doc'] ?></option>
                                <?php
                                    include('../dbconnection.php');
                                    $query = "SELECT * FROM `doctor`";
                                    $run = mysqli_query($conn,$query);
                                    while($data = mysqli_fetch_assoc($run)) {
                                        ?>
                                        <option value="<?php echo $data['doc_id'] ?>"><?php echo $data['doc_id'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        <!-- <input class="fourth" id="predoc" type="text" placeholder="Doctor's ID who prescribed it" name="predoc" required> -->
                        </label><br>
                        <!-- <label class="begin" for="hos">Working Hospital : <input class="fifth" id="hos" type="text" placeholder="Hospital ID doctor belongs to" name="dhos" required></label><br> -->
                        <!-- <label for="description">Hospital Address : <textarea name="haddress" id="description" cols="30" rows="4" placeholder="Address" required></textarea></label><br> -->
                        <button type="submit" class="btn btn-details btn-primary" name="submit" value="Submit"> Update </button><br>
                        <a href="update-pres.php?preid='<?php echo $preid ?>'"><button class="btn btn-details btn-primary" type="button">Back To Selection</button></a>
                    </form>
                </div>
            </div>
        </div>
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>