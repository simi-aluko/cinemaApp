<?php

require 'connect.php';


if(isset($_POST['signup'])){

    $fullname = htmlspecialchars($_POST['fullname']);
    $telNo = htmlspecialchars($_POST['telNo']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $cpassword = htmlspecialchars($_POST['cpassword']);
    $cvv = htmlspecialchars($_POST['cvv']);
    $cardNo = htmlspecialchars($_POST['cardNumber']);
    $pin = htmlspecialchars($_POST['pin']);

    

}

if(isset($_POST['signin'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    
}