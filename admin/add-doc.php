<?php
    if(isset($_POST['submit'])) {
        include('../dbconnection.php');

        // echo $_POST['new-cat'];
        // echo $_POST['des'];
        // echo $_POST['criteria'];
        $did = $_POST['did'];
        $dname = $_POST['dname'];
        $dphone = $_POST['dphone'];
        $demail = $_POST['dmail'];
        $dhos = $_POST['dhos'];

        if($dphone >= 1000000000 && $dphone <= 9999999999) {
            $query = "INSERT INTO `doctor`(`doc_id`, `doc_name`, `doc_mobile`, `doc_email`, `doc_hos`) VALUES ('$did', '$dname', '$dphone', '$demail', '$dhos')";
            $run = mysqli_query($conn,$query);

            if($run == true) {
                ?>
                <script type="text/javascript">
                   alert("Information Added!");
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
               alert("Invalid Input for Mobile No. Entered");
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
        <!-- <link rel="stylesheet" href="../css/back-img.css"> -->
    </head>
    <style>
        label textarea{
            vertical-align: text-top;
        }

        .login-form {
            width: 600px;
            padding: 12% 0% 5% 0%;
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
        
        <h4 class="text-center" style="margin-top: 4.5%;">Enter Information</h4>
        <div class="container d-flex justify-content-center">
            <div class="row text-center">
                <div class="form">
                    <form class="login-form" method="post" action="add-doc.php">
                        <label class="begin" for="id">Doctor ID : <input class="first" id="id" type="text" placeholder="Doctor Id" name="did" required></label><br>
                        <label class="begin" for="name">Doctor Name : <input class="second" id="name" type="text" placeholder="Name of Doctor" name="dname" required></label><br>
                        <label class="begin" for="phone">Doctor Mobile No. : <input class="third" id="phone" type="text" placeholder="Mobile No.of Doctor" name="dphone" required></label><br>
                        <label class="begin" for="email">Doctor E-mail : <input class="fourth" id="email" type="email" placeholder="Doctor e-mail" name="dmail" required></label><br>
                        <label class="begin" for="hos">Working Hospital : 
                            <select style="padding: 3px 9px" name="dhos" id="dhos" required>
                                <option value="" disabled selected hidden>Select Hospital ID Doctor belongs to</option>
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
                        </label><br>
                        <!-- <label for="description">Hospital Address : <textarea name="haddress" id="description" cols="30" rows="4" placeholder="Address" required></textarea></label><br> -->
                        <button type="submit" class="btn btn-details btn-primary" name="submit" value="Submit"> Add Details </button><br>
                        <a href="doc-options.php"><button class="btn btn-details btn-primary" type="button">Back To Options</button></a>
                    </form>
                </div>
            </div>
        </div>
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
