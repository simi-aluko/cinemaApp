<?php

require 'connect.php';
session_start();

if(isset($_POST['purchaseMovie'])){
    $movieTitle = $_POST['movieTitle'];
    $moviePrice = $_POST['price'];
    $bookerEmail = $_SESSION['cinemaUser'];
    $dateBooked = date("l jS \of F Y h:i:s A");
    $purchaseId = bin2hex(random_bytes(5));
    $ticketNumber = $_POST['ticketnumber'];
    $seeingDay = $_POST['seeingDay'];
    $timeOfDay = $_POST['timeOfDay'];
    $cinemaLocation = $_POST['cinemaLocation'];

    $sqlToBookMovie = 
    "INSERT INTO bookedMovieDetails (`movieTitle`,`dateBooked`,`price`,`purchaseId`,
    `ticketNumber`,`seeingDay`,`timeOfDay`,`cinemaLocation`,`userEmail`) 
    VALUES ('$movieTitle','$dateBooked','$moviePrice','$purchaseId','$ticketNumber','$seeingDay','$timeOfDay','$cinemaLocation','$bookerEmail')";

    $BookMovieResult = $conn->query($sqlToBookMovie);

    if($BookMovieResult){
        echo "You have successfully booked ".$movieTitle.", move down the webpage to see your purchase Id which is mapped to your username.";
    }
}


