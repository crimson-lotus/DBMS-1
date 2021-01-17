<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Hospital</title>
        <meta name="description" content="List of hospitals in site">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap Core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/hospital.css">
        <!-- <link rel="stylesheet" href="css/back-img.css"> -->
    </head>
    <body class="text-center">
        
        <h3>Hospital Info</h3>
        
        <?php
            include('dbconnection.php');
            $qry = 'SELECT * FROM `hospital`;';
            $run = mysqli_query($conn,$qry);
            while($data = mysqli_fetch_assoc($run)) {
                ?>

                <div class="container d-grid col-4 mx-auto">
                    <?php 
                        $name = $data['hos_name'];
                        $id = $data['hos_id'];
                    ?>
                    <a href="hospital-info.php?name=<?php echo $name ?>&id=<?php echo $id ?>"><button type="button" class="btn btn-outline-primary"><?php echo $data['hos_name'] ?></button></a>
                </div>
                <?php
            }
        ?>

        <footer class="container-fluid text-center">
            <div class="col-12">
              <div class="p-3"><a href="front-page.html"><button class="btn btn-details btn-primary">Back</button></a></div>
            </div>
        </footer>

        <!-- <script src="" async defer></script> -->
        <!-- Bootstrap Core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>