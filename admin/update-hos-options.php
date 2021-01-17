<?php
    if(isset($_POST['submit'])) {
        include('../dbconnection.php');
        $hid = $_POST['hid'];
        $hname = $_POST['hname'];
        $htype = $_POST['htype'];
        $haddress = $_POST['haddress'];

        $query = "UPDATE `hospital`
                SET `hos_name`='$hname', `hos_type`='$htype', `hos_address`='$haddress'
                WHERE `hos_id` = '$hid'";
        $run = mysqli_query($conn,$query);

        if($run == true) {
            ?>
            <script type="text/javascript">
               alert("Information Updated!");
               window.open('hos-options.php','_self');
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
    <body>

        <h5 class="text-center" style="margin-top: 2.7%;">Enter details to be Updated</h5>

        <div class="container d-flex justify-content-center">
            <div class="row text-center">
                <div class="form">
                    <?php
                        $hid = $_GET['hid'];
                        include('../dbconnection.php');
                        $query = "SELECT * FROM `hospital` WHERE `hos_id`='$hid'";
                        $run = mysqli_query($conn,$query);
                        $data = mysqli_fetch_assoc($run)
                    ?>
                    <form class="login-form" method="post" action="update-hos-options.php">
                        <label class="begin" for="id">Hospital ID : <input class="first" id="id" type="text" placeholder="Hospital Id" name="hid" value="<?php echo $data['hos_id'] ?>" required></label><br>
                        <label class="begin" for="name">Hospital Name : <input class="second" id="name" type="text" placeholder="Name of Hospital" name="hname" value="<?php echo $data['hos_name'] ?>" required></label><br>
                        <label class="begin" for="type">Hospital Type : <input class="third" id="type" type="text" placeholder="Type of Hospital" name="htype" value="<?php echo $data['hos_type'] ?>" required></label><br>
                        <label for="description">Hospital Address : <textarea name="haddress" id="description" cols="30" rows="4" placeholder="Address" required><?php echo $data['hos_address'] ?></textarea></label><br>
                        <button type="submit" class="btn btn-details btn-primary" name="submit" value="Submit"> Update </button><br>
                        <a href="update-hos.php?hid=<?php echo $hid ?>"><button class="btn btn-details btn-primary" type="button">Back To Selection</button></a>
                    </form>
                </div>
            </div>
        </div>
        
        
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>