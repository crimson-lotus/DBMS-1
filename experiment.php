<?php
    // include('dbconnection.php');
    // $name = $_GET['name'];
    // echo $name;
    // $id = $_GET['id'];
    // echo '<br>';
    // echo $id;
    // $query = "SELECT hos_type, hos_address FROM `hospital` WHERE hos_name='$name' AND hos_id='$id'";
    // $run = mysqli_query($conn, $query);
    // $row = mysqli_num_rows($run);
    // $data = mysqli_fetch_assoc($run);
    // echo "<br>";
    // echo $data['hos_type'];
    // echo "<br>";
    // echo $data['hos_address'];

    $conn = mysqli_connect('localhost', 'root', '', 'experiment');
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['submit'])) {
        $no = $_POST['phone'];
        if($no >= 1000000000 && $no <= 9999999999 ) {
            echo "Success";
            $query = "INSERT INTO `exp2` (`val`) VALUES ('$no')";
            $run = mysqli_query($conn,$query);
        } else {
            echo "Fail";
        }
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Experimet</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="experiment.php" method="post">
            <input type="text" name="phone" id="phone" placeholder="Phone Number">
            <button type="submit" name="submit">Submit</button>
        </form>
        
        <!-- <script src="" async defer></script> -->
    </body>
</html>