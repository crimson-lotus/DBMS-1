<?php
    if(isset($_POST['submit'])) {
        include('../dbconnection.php');
        // echo $_POST['cat'];
        // echo $_POST['des'];
        // echo $_POST['criteria'];
        $hid = $_POST['hid'];
        // $hname = $_POST['hname'];
        // $htype = $_POST['htype'];
        // $haddress = $_POST['haddress'];

        $query = "SELECT * FROM `hospital` WHERE `hos_id`='$hid'";
        $run = mysqli_query($conn,$query);

        if(mysqli_num_rows($run) > 0) {
            header("location: update-hos-options.php?hid=$hid");
        }
        else {
            ?>
            <script type="text/javascript">
               alert("No Such Hospital ID Exists!");
               window.open('hos-options.php','_self');
            </script>
            <?php
        }

        // $query = "UPDATE `hospital`
        //         SET `hos_name`='$hname', `hos_type`='$htype', `hos_address`='$haddress'
        //         WHERE `hos_id` = '$hid'";
        // $run = mysqli_query($conn,$query);

        // if($run == true) {
            
        //     <script type="text/javascript">
        //        alert("Information Updated!");
        //        window.open('hos-options.php','_self');
        //     </script>
            
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

        /* .big-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            /* align-items: center; */
        /* } */

        /* .details-container {
            margin: 0;
            width: 10%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        } */

        /* .details-container div {
            border-radius: 12px;
        } */ 

        .row-container div:first-child {
            border-radius: 9px 0 0 9px;
        }

        .row-container div:last-child {
            border-radius: 0 9px 9px 0;
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

        .login-form label.begin {
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
        }

        .login-form button {
            margin: 1.5% 0 2.1%;
        }
    </style>
    <body class="text-center">
        
        <h4 class="up-head text-center" style="margin-top: 3%;">Hospital IDs with Their corresponding names</h4>

        <?php
            include('../dbconnection.php');
            $query = "SELECT *FROM`hospital`";
            $run = mysqli_query($conn, $query);
            $row = mysqli_num_rows($run);
            while($data = mysqli_fetch_assoc($run)) {
                ?>
                <div class="container-fluid p-3 bg-white details-container">
                    <div class="row p-1 justify-content-center row-container">
                        <div class="col-2 p-1 border border-primary"><?php echo $data['hos_id'] ?></div>
                        <!-- <div class="col-1">-</div> -->
                        <div class="col-2 p-1 border border-primary"><?php echo $data['hos_name'] ?></div>
                    </div>
                </div>
                <?php
            }
        ?>

        <h5 class="text-center" style="margin-top: 2.7%;">Select Hospital ID For Updation</h5>

        <div class="container d-flex justify-content-center">
            <div class="row text-center">
                <div class="form">
                    <form class="login-form" method="post" action="update-hos.php">
                        <label class="begin" for="id">Hospital ID : 
                            <select style="padding: 3px 9px; margin-left: 60px;" name="hid" id="hid" required>
                                <option value="" disabled selected hidden>Select Hospital to be updated</option>
                                <?php
                                    include('../dbconnection.php');
                                    $query = "SELECT * FROM `hospital`";
                                    $run = mysqli_query($conn,$query);
                                    while($data = mysqli_fetch_assoc($run)) {
                                        ?>
                                        <option value="<?php echo $data['hos_id'] ?>"><?php echo $data['hos_id'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        <!-- <input class="first" id="id" type="text" placeholder="Hospital Id" name="hid" required> -->
                        </label><br>
                        <button type="submit" class="btn btn-details btn-primary" name="submit" value="Submit"> Select </button><br>
                        <a href="hos-options.php"><button class="btn btn-details btn-primary" type="button">Back To Options</button></a>
                    </form>
                </div>
            </div>
        </div>
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>