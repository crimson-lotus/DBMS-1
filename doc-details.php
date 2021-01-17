<?php
    include('dbconnection.php');
    $id = $_GET['id'];
    $name = $_GET['name'];
    // echo $id;
    // $query = "SELECT * FROM `doctor` WHERE doc_hos='$id'";
    // $run = mysqli_query($conn, $query);
    // $row = mysqli_num_rows($run);
    // while ($data = mysqli_fetch_assoc($run)) {
    //     echo $data['doc_name'];
    //     echo "<br>";
    //     echo $data['doc_mobile'];
    //     echo "<br>";
    //     echo $data['doc_email'];
    //     echo "<br>";
    // }
    
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
        <!-- <link rel="stylesheet" href="css/back-img.css"> -->
    </head>
    <style>
        .details-container {
            max-width: 50vw;
            /* line-height: 1.5; */
        }

        .doc-h2 {
            margin: 4.5% 0 1.5%;
        }
    </style>
    <body>
        <h2 class="doc-h2 text-center">Doctor Details</h2>
        <?php 
            $query = "SELECT * FROM `doctor` WHERE doc_hos='$id'";
            $run = mysqli_query($conn, $query);
            $row = mysqli_num_rows($run);
            if (mysqli_num_rows($run)<1) echo "<h3> NO DATA EXISTS </h3>";
            while ($data = mysqli_fetch_assoc($run)) {
                ?>
                <div class="container shadow p-4 mb-4 bg-white details-container">
                    <div class="row">
                        <div class="col-12"><h4> <?php echo $data['doc_name'] ?> </h4></div>   
                    </div>
                    <div class="row border border-light">
                        <div class="col-3">
                            Doctor ID 
                        </div>
                        <div class="col-1 text-center">
                            - 
                        </div>
                        <div class="col-3">
                            <?php echo $data['doc_id'] ?>
                        </div>
                    </div>
                    <div class="row border border-light">
                        <div class="col-3">
                            Doctor Mobile No. 
                        </div>
                        <div class="col-1 text-center">
                            - 
                        </div>
                        <div class="col-3">
                            <?php echo $data['doc_mobile'] ?>
                        </div>
                    </div>
                    <div class="row border border-light">
                        <div class="col-3">
                            Doctor E-mail. 
                        </div>
                        <div class="col-1 text-center">
                            - 
                        </div>
                        <div class="col-3">
                            <?php echo $data['doc_email'] ?>
                        </div>
                    </div>
                </div>
                <?php 
            }
        ?>

        <footer class="container-fluid text-center">
            <div class="col-12">
              <div class="p-3"><a href="hospital-info.php?id=<?php echo $id ?>&name=<?php echo $name ?>"><button class="btn btn-details btn-primary">Back</button></a></div>
            </div>
        </footer>
        
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap Core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>