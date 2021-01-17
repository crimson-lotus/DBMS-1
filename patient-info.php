<?php
    include('dbconnection.php');
    $hid = $_GET['id'];
    $name = $_GET['name'];
    // echo '<br>';
    // echo $id;
    // $query1 = "SELECT * FROM `doctor` WHERE doc_hos = '$hid'";
    // $run1 = mysqli_query($conn, $query1);
    // $row1 = mysqli_num_rows($run1);
    // while($data1 = mysqli_fetch_assoc($run1)) {
    //     $did = $data1['doc_id'];
    //     // echo $did;
    //     $query2 = "SELECT * FROM `patient` WHERE p_doc = '$did'";
    //     $run2 = mysqli_query($conn, $query2);
    //     $row2 = mysqli_num_rows($run2);
    //     $data2 = mysqli_fetch_assoc($run2);
    //     // echo $data2['p_id'];

    // }
    // // echo $data['doc_id'];
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
        .patient-h2 {
            margin: 4.5% 0 1.5%;
        }

        .details-container {
            max-width: 50vw;
        }

        .row {
            line-height: 1.8;
        }
    </style>
    <body>
        <h2 class="patient-h2 text-center">Patient Details</h2>

        <?php
             $query1 = "SELECT * FROM `doctor` WHERE doc_hos = '$hid'";
             $run1 = mysqli_query($conn, $query1);
             $row1 = mysqli_num_rows($run1);
             while($data1 = mysqli_fetch_assoc($run1)) {
                $did = $data1['doc_id'];
                $query2 = "SELECT * FROM `patient` WHERE p_doc = '$did'";
                $run2 = mysqli_query($conn, $query2);
                $row2 = mysqli_num_rows($run2);
                while($data2 = mysqli_fetch_assoc($run2)) {
                    ?>
                    <div class="container shadow p-4 mb-4 bg-white details-container">
                        <div class="row">
                            <div class="col-12"><h4> <?php echo $data2['p_name'] ?> </h4></div>   
                        </div>
                        <div class="row border border-light">
                            <div class="col-3">
                                Patient ID
                            </div>
                            <div class="col-1 text-center">
                                - 
                            </div>
                            <div class="col-3">
                                <?php echo $data2['p_id'] ?>
                            </div>
                        </div>
                        <div class="row border border-light">
                            <div class="col-3">
                                Patient Mobile No. 
                            </div>
                            <div class="col-1 text-center">
                                - 
                            </div>
                            <div class="col-3">
                                <?php echo $data2['p_mobile'] ?>
                            </div>
                        </div>
                        <div class="row border border-light">
                            <div class="col-3">
                                Patient E-mail. 
                            </div>
                            <div class="col-1 text-center">
                                - 
                            </div>
                            <div class="col-3">
                                <?php echo $data2['p_email'] ?>
                            </div>
                        </div>
                        <div class="row border border-light">
                            <div class="col-3">
                                Doctor Assigned 
                            </div>
                            <div class="col-1 text-center">
                                - 
                            </div>
                            <div class="col-3">
                                <?php 
                                    $doc_id = $data2['p_doc'];
                                    $query3 = "SELECT doc_name FROM `doctor` WHERE doc_id='$doc_id'";
                                    $run3 = mysqli_query($conn, $query3);
                                    $row3 = mysqli_num_rows($run3);
                                    $data3 = mysqli_fetch_assoc($run3);
                                    echo $data3['doc_name'];
                                ?>
                            </div>
                        </div>
                        <div class="row border border-light">
                            <div class="col-3">
                                Patient Category 
                            </div>
                            <div class="col-1 text-center">
                                - 
                            </div>
                            <div class="col-3">
                                <?php
                                    echo $data2['p_cat'];
                                ?>
                            </div>
                        </div>
                        <div class="row border border-light">
                            <div class="col-3">
                                Prescription ID
                            </div>
                            <div class="col-1 text-center">
                                - 
                            </div>
                            <div class="col-3">
                                <?php
                                    echo $data2['p_pres'];
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
             }
        ?>

        <footer class="container-fluid text-center">
            <div class="col-12">
              <div class="p-3"><a href="hospital-info.php?id=<?php echo $hid ?>&name=<?php echo $name ?>"><button class="btn btn-details btn-primary">Back</button></a></div>
            </div>
        </footer>

        
        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap Core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>