<?php

require_once  ('sql_connect.php');

session_start();
//$query = "SELECT * FROM `product` WHERE 1";
//$result = @mysqli_query($dbc, $query);
$DB_NAME = 'product';


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    assert($dbc);
    $dbc->query("DELETE FROM `$DB_NAME` WHERE `$DB_NAME`.`id` = $id") or die($dbc->error);

    $_SESSION['message'] = "Item has been Deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location:index.php");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $des = $_POST['description'];
    $price = $_POST['price'];
    $photoURL = $_POST['photoURL'];

    $dbc->query("UPDATE `$DB_NAME` SET `name` = '$name', `description` = '$des',
 `price` = '$price', `picture` = '$photoURL' WHERE `product`.`id` = $id")
    or die($dbc->error);

    $_SESSION['message'] = "Item has been updated!!";
    $_SESSION['msg_type'] = "success";
    header("location:index.php");
}

/**
 * creating a new item in the database
 */
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $des = $_POST['description'];
    $price = $_POST['price'];
    $photoURL = $_POST['photoURL'];

    //set the query and validate it
    $dbc->query("INSERT INTO `$DB_NAME` ()
 VALUES (NULL, '$name', '$des', '$price', '$photoURL')")
        or die($dbc->error);

    $_SESSION['message'] = "Item has been created!";
    $_SESSION['msg_type'] = "success";

    header("location:index.php");
}

