<?php
    if(isset($_POST['submit'])) {
        include('../dbconnection.php');

        // echo $_POST['new-cat'];
        // echo $_POST['des'];
        // echo $_POST['criteria'];
        $preid = $_POST['preid'];
        $prename = $_POST['prename'];
        $precat = $_POST['precat'];
        $predoc = $_POST['predoc'];

        $query = "INSERT INTO `prescription`(`pres_id`, `medicine`, `pres_cat`, `pres_doc`) VALUES ('$preid', '$prename', '$precat', '$predoc')";
        $run = mysqli_query($conn,$query);

        if($run == true) {
            ?>
            <script type="text/javascript">
               alert("Information Added!");
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
        
        <h4 class="text-center" style="margin-top: 4.5%;">Enter Information</h4>
        <div class="container d-flex justify-content-center">
            <div class="row text-center">
                <div class="form">
                    <form class="login-form" method="post" action="add-pres.php">
                        <label class="begin" for="id">Prescription ID : <input class="first" id="id" type="text" placeholder="Prescription Id" name="preid" required></label><br>
                        <label class="begin" for="name">Prescribed Medicine : <input class="second" id="name" type="text" placeholder="Medicine Name for Prescription" name="prename" required></label><br>
                        <label class="begin" for="med">Prescription Category : 
                            <select style="padding: 3px 1px" name="precat" id="med" required>
                                <option value="" disabled selected hidden>Select the category prescription belongs to</option>
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
                        <!-- <input class="third" id="med" type="text" placeholder="For which category prescription belongs to" name="precat" required>-->
                        </label><br> 
                        <label class="begin" for="predoc">Prescribed by Doctor : 
                            <select style="padding: 3px 9px" name="predoc" id="predoc" required>
                                <option value="" disabled selected hidden>Select Doctor's ID who prescribed it</option>
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
                        <button type="submit" class="btn btn-details btn-primary" name="submit" value="Submit"> Add Details </button><br>
                        <a href="pres-options.php"><button class="btn btn-details btn-primary" type="button">Back To Options</button></a>
                    </form>
                </div>
            </div>
        </div>
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>