<?php
    if(isset($_POST['submit'])) {
        include('../dbconnection.php');
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pmobile = $_POST['pmobile'];
        $pemail = $_POST['pmail'];
        $pdoc = $_POST['pdoc'];
        $pcat = $_POST['pcat'];
        $ppres = $_POST['ppres'];

        if($pmobile >= 1000000000 && $pmobile <= 9999999999) {
            $query = "UPDATE `patient`
                SET `p_name`='$pname', `p_mobile`='$pmobile', `p_email`='$pemail', `p_cat`='$pcat', `p_doc`='$pdoc', `p_pres`='$ppres'
                WHERE `p_id` = '$pid'";
            $run = mysqli_query($conn,$query);

            if($run == true) {
                ?>
                <script type="text/javascript">
                alert("Information Updated!");
                window.open('patient-options.php','_self');
                </script>
                <?php
            }
            else {
                echo("error: ".mysqli_error($conn));
            }
        }

        else {
            ?>
                <script type="text/javascript">
                alert("Wrong Info(Mobile No.) Entered!");
                window.open('patient-options.php','_self');
                </script>
            <?php
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
                        $pid = $_GET['pid'];
                        include('../dbconnection.php');
                        $query = "SELECT * FROM `patient` WHERE `p_id`='$pid'";
                        $run = mysqli_query($conn,$query);
                        $data = mysqli_fetch_assoc($run);
                    ?>
                    <form class="login-form" method="post" action="update-pat-options.php">
                        <label class="begin" for="id">Patient ID : <input class="first" id="id" type="text" placeholder="Patient Id" name="pid" value="<?php echo $data['p_id'] ?>" required></label><br>
                        <label class="begin" for="name">Patient Name : <input class="second" id="name" type="text" placeholder="Name of Patient" name="pname" value="<?php echo $data['p_name'] ?>" required></label><br>
                        <label class="begin" for="phone">Patient Mobile No. : <input class="third" id="phone" type="text" placeholder="Mobile No. of Patient" name="pmobile" value="<?php echo $data['p_mobile'] ?>" required></label><br>
                        <label class="begin" for="mail">Patient E-mail : <input class="fourth" id="mail" type="text" placeholder="Patient's email address" name="pmail" value="<?php echo $data['p_email'] ?>" required></label><br>
                        <label class="begin" for="pdoc">Patient's Doctor : 
                            <select style="padding: 3px 124px;" name="pdoc" id="pdoc" required>
                                <option value="<?php echo $data['p_doc'] ?>" selected hidden><?php echo $data['p_doc'] ?></option>
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
                        <!-- <input class="fifth" id="pdoc" type="text" placeholder="ID of Doctor assigned to patient" name="pdoc" required> -->
                        </label><br>
                        <?php
                            $pid = $_GET['pid'];
                            include('../dbconnection.php');
                            $query = "SELECT * FROM `patient` WHERE `p_id`='$pid'";
                            $run = mysqli_query($conn,$query);
                            $data = mysqli_fetch_assoc($run);
                        ?>
                        <label class="begin" for="pcat">Patient's Category : 
                            <select style="padding: 3px 114px;" name="pcat" id="pcat" required>
                                <option value="<?php echo $data['p_cat'] ?>" selected hidden><?php echo $data['p_cat'] ?></option>
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
                        <!-- <input class="sixth" id="pcat" type="text" placeholder="Category to which the patient belongs" name="pcat" required> -->
                        </label><br>
                        <?php
                            $pid = $_GET['pid'];
                            include('../dbconnection.php');
                            $query = "SELECT * FROM `patient` WHERE `p_id`='$pid'";
                            $run = mysqli_query($conn,$query);
                            $data = mysqli_fetch_assoc($run);
                        ?>
                        <label class="begin" for="ppres">Patient's Prescription : 
                            <select style="padding: 3px 120px;" name="ppres" id="ppres" required>
                                <option value="<?php echo $data['p_pres'] ?>" selected hidden><?php echo $data['p_pres'] ?></option>
                                <?php
                                    include('../dbconnection.php');
                                    $query = "SELECT * FROM `prescription`";
                                    $run = mysqli_query($conn,$query);
                                    while($data = mysqli_fetch_assoc($run)) {
                                        ?>
                                        <option value="<?php echo $data['pres_id'] ?>"><?php echo $data['pres_id'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        <!-- <input class="seventh" id="ppres" type="text" placeholder="Prescription taken by the patient" name="ppres" required> -->
                        </label><br>
                        <!-- <label class="begin" for="hos">Working Hospital : <input class="fifth" id="hos" type="text" placeholder="Hospital ID doctor belongs to" name="dhos" required></label><br> -->
                        <!-- <label for="description">Hospital Address : <textarea name="haddress" id="description" cols="30" rows="4" placeholder="Address" required></textarea></label><br> -->
                        <button type="submit" class="btn btn-details btn-primary" name="submit" value="Submit"> Update </button><br>
                        <a href="update-pat.php?pid=<?php echo $pid ?>.php"><button class="btn btn-details btn-primary" type="button">Back To Selection</button></a>
                    </form>
                </div>
            </div>
        </div>
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>