<?php
    $insert = false;
    if(isset($_POST['name'])){
    //Set connection variables

    $server ="localhost";
    $username="root";
    $password ="";
    // $database ="us_trip"
    // Create a database connection

    
    $conn = mysqli_connect($server, $username, $password);
        
    if(!$conn){
        die("connection to this database failed due to" . mysqli_connect_error());
    
    }
    // Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `us_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($conn->query($sql) == true){
        // echo "Successfully inserted";
        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $conn->error";
        $not_insert = true;
    }
    // Close the database connection
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="IIT Peshawar">
    <div class="container">
        <h1>Welcome to iTech - Travel Form</h1>
        <p>Enter your Data and submit to confirm your form</p>
        <?php 
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for submitting your form and We are happy for your joining</p>";}
        ?>
        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name here">
        <input type="text" name="age" id="age" placeholder="Enter your age here">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender here">
        <input type="email" name="email" id="email" placeholder="Enter your email here">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone here">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other description here"></textarea>
        <!-- <button class="btn" type="submit" onclick="window.location.href='#'">Submit</button> -->
        <button class="btn" type="submit">Submit</button>
        </form>
    </div>

    <script src="index.js"></script>
 </body>

</html>