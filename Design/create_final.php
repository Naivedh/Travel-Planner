<!DOCTYPE html>
<?php
        session_start();
        
        if(isset($_SESSION['user_name']))
        {
            $user_name = $_SESSION['user_name'];
            $aplace = $_SESSION['place'];

         if($_SERVER["REQUEST_METHOD"] == "POST") {

            include ("connect.php");

            $name = $_POST['name'];
            $number = $_POST['number'];
            $inputAddress = $_POST['inputAddress'];
            $inputAddress2 = $_POST['inputAddress2'];
            $inputCity = $_POST['inputCity'];
            $inputState = $_POST['inputState'];
            $inputZip = $_POST['inputZip'];
            
            $places = serialize($aplace);
            $address = $inputAddress." " . $inputAddress2;

            $reg = "insert into create_package (user_name, name, number, address, city, state, zip, places) values ('$user_name', '$name','$number','$address','$inputCity', '$inputState', '$inputZip', '$places')";
            mysqli_query($con, $reg);
            
            
        }


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .mains {
            text-align:center;
            margin-top:100px;
        }
        h4 {
            padding:20px;
        }
    </style>
</head>
<body>
       <?php include('nav.php');?>
        <div class="mains">
       <h4>Package Booked</h4>
       <a href="index.php"><button type="submit" class="btn btn-primary">Home</button></a>
       </div>
</body>

<?php
 }
else {
header('sign_in.php');
}
?>
</html>