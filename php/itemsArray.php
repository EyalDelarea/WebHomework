<?php

$sampleDescription = "Lorem ipsum dolor sit amet,
 id omnis laudem abhorreant vim, vim an
   autem mazim";


$itemPhotos = array(

    0 => "https://img.fruugo.com/product/6/70/117163706_0340_0340.jpg",
    1 => "https://img.fruugo.com/product/0/87/38517870_0340_0340.jpg",
    2 => "https://img.fruugo.com/product/8/24/39971248_0340_0340.jpg",
    3 => "https://img.fruugo.com/product/6/70/117163706_0340_0340.jpg",
    4 => "https://img.fruugo.com/product/0/87/38517870_0340_0340.jpg",
    5 => "https://img.fruugo.com/product/8/24/39971248_0340_0340.jpg",

);


$shopItems = array(

    0 => array(
        "id" => "0",
        "picture" => "{$itemPhotos[0]}",
        "name" => "ItemOne",
        "price" => "11.11",
        "description" => $sampleDescription
    ),
    1 => array(
        "id" => "1",
        "picture" => "{$itemPhotos[1]}",
        "name" => "ItemTwo",
        "price" => "22.22",
        "description" => $sampleDescription

    ),
    2 => array(
        "id" => "0",
        "picture" => "{$itemPhotos[2]}",
        "name" => "ItemThree",
        "price" => "33.33",
        "description" => $sampleDescription


    ),
    3 => array(
        "id" => "0",
        "picture" => "{$itemPhotos[3]}",
        "name" => "ItemFour",
        "price" => "44.44",
        "description" => $sampleDescription

    ),
    4 => array(
        "id" => "0",
        "picture" => "{$itemPhotos[4]}",
        "name" => "ItemFive",
        "price" => "55.55",
        "description" => $sampleDescription

    ),
    5 => array(
        "id" => "0",
        "picture" => "{$itemPhotos[5]}",
        "name" => "ItemSix",
        "price" => "66.66",
        "description" => $sampleDescription

    ),


);

function addToCart(){
    echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';
}


?>
