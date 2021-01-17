<?php
    include('dbconnection.php');
    $name = $_GET['name'];
    // echo $name;
    $id = $_GET['id'];
    $query = "SELECT hos_type, hos_address FROM `hospital` WHERE hos_name='$name' AND hos_id='$id'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_num_rows($run);
    $data = mysqli_fetch_assoc($run);
    $type = $data['hos_type'];
    $address = $data['hos_address'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap Core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- Custom CSS -->
        <!-- <link rel="stylesheet" href=""> -->
    </head>
    <style>
        body {
            /* background-image: linear-gradient(75deg, #dbf6e9, #bce6eb); */
            background-color: #f9f8fa;
            margin-top: 10%;
        }

        .hos-details {
            line-height: 1.8;
        }

        .row {
            line-height: 1.8;
        }
    </style>
    <body>

        <div class="container-fluid text-center">
            <div class="hos-details">
                <h3><?php echo $name ?></h3>
                <p>Hospital Id:   <strong><?php echo $id ?></strong><br>Hospital Type:   <?php echo $type ?><br>Hospital Address:   <?php echo $address ?></p>
            </div>
            <div>
                <div class="col-12">
                <div class="p-3"><a href="doc-details.php?id=<?php echo $id ?>&name=<?php echo $name ?>"><button class="btn btn-details btn-outline-primary">View Hospital Doctor Details</button></a></div>
                </div>
                <div class="col-12">
                <div class="p-3"><a href="patient-info.php?id=<?php echo $id ?>&name=<?php echo $name ?>"><button class="btn btn-details btn-outline-primary">View Hospital Patient Details</button></a></div>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-center">
            <div class="col-12">
              <div class="p-3"><a href="hospital.php"><button class="btn btn-details btn-primary">Back</button></a></div>
            </div>
        </footer>

        
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap Core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>