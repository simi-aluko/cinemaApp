<?php

require 'connect.php';
require '../home.php';

function moviePrice($rating){
    $price;
    if(rating < 5){
        $price = "Two Thousand Naira(N2,000)";
    }else if(rating < 7){
        $price = "Two Thousand and Five Hundred Naira(N2,500)";
    }else{
        $price = "Three thousand Naira(N3,000)";
    }
    return price;
}