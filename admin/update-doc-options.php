<?php
    if(isset($_POST['submit'])) {
        include('../dbconnection.php');
        $did = $_POST['did'];
        $dname = $_POST['dname'];
        $dphone = $_POST['dphone'];
        $demail = $_POST['dmail'];
        $dhos = $_POST['dhos'];

        if($dphone >= 1000000000 && $dphone <= 9999999999) {
            $query = "UPDATE `doctor`
                SET `doc_name`='$dname', `doc_mobile`='$dphone', `doc_email`='$demail', `doc_hos`='$dhos'
                WHERE `doc_id` = '$did'";
            $run = mysqli_query($conn,$query);

            if($run == true) {
                ?>
                <script type="text/javascript">
                   alert("Information Updated!");
                   window.open('doc-options.php','_self');
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
                   alert("Wrong Info (phone Number) Entered!");
                   window.open('doc-options.php','_self');
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
            width: 300px;
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

        <h5 class="text-center" style="margin-top: 3.6%;">Enter details to be Updated</h5>

        <div class="container d-flex justify-content-center">
            <div class="row text-center">
                <div class="form">
                    <?php
                        $did = $_GET['did'];
                        include('../dbconnection.php');
                        $query = "SELECT * FROM `doctor` WHERE `doc_id`='$did'";
                        $run = mysqli_query($conn,$query);
                        $data = mysqli_fetch_assoc($run)
                    ?>
                    <form class="login-form" method="post" action="update-doc-options.php">
                        <label class="begin" for="id">Doctor ID : <input class="first" id="id" type="text" placeholder="Doctor Id" name="did" value="<?php echo $data['doc_id'] ?>" required></label><br>
                        <label class="begin" for="name">Doctor Name : <input class="second" id="name" type="text" placeholder="Name of Doctor" name="dname" value="<?php echo $data['doc_name'] ?>" required></label><br>
                        <label class="begin" for="phone">Doctor Mobile No. : <input class="third" id="phone" type="text" placeholder="Mobile No.of Doctor" name="dphone" value="<?php echo $data['doc_mobile'] ?>" required></label><br>
                        <label class="begin" for="email">Doctor E-mail : <input class="fourth" id="email" type="text" placeholder="Doctor e-mail" name="dmail" value="<?php echo $data['doc_email'] ?>" required></label><br>
                        <label class="begin" for="hos">Working Hospital : 
                            <select style="padding: 3px 120px;" name="dhos" id="dhos" required>
                                <option value="<?php echo $data['doc_hos'] ?>" selected hidden><?php echo $data['doc_hos'] ?></option>
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
                        <!-- <input class="fifth" id="hos" type="text" placeholder="Hospital ID doctor belongs to" name="dhos" required> -->
                        </label><br>
                        <!-- <label for="description">Hospital Address : <textarea name="haddress" id="description" cols="30" rows="4" placeholder="Address" required></textarea></label><br> -->
                        <button type="submit" class="btn btn-details btn-primary" name="submit" value="Submit"> Update </button><br>
                        <a href="update-doc.php?did=<?php echo $did ?>"><button class="btn btn-details btn-primary" type="button">Back To Selection</button></a>
                    </form>
                </div>
            </div>
        </div>
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!-- <script src="" async defer></script> -->
    </body>
</html>