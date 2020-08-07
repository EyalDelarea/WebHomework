<?php
/**
 * All the backend process event handlers function in this page
 * CRUD operations with input validation
 * And session update message accordingly
 */
require_once  ('sql_connect.php');

session_start();
$DB_NAME = 'product';
//validate variable $dbc which is the database connection
assert($dbc);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

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

    $query="UPDATE `$DB_NAME` SET `name` = '$name', `description` = '$des',
 `price` = '$price', `picture` = '$photoURL' WHERE `product`.`id` = $id";

    $result = mysqli_query($dbc,$query);
    //check for a valid query , if not like SQL injection or some sort notify the user
    if(!$result){
        $_SESSION['message'] = "Trying to do some SQL injection?? item was not updated";
        $_SESSION['msg_type'] = "danger";
        header("location:index.php");
    }else{
        $_SESSION['message'] = "Item has been updated!!";
        $_SESSION['msg_type'] = "success";
        header("location:index.php");
    }

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
    $query="INSERT INTO `$DB_NAME` () VALUES (NULL, '$name', '$des', '$price', '$photoURL')";

        $result = mysqli_query($dbc,$query);
        //check for a valid query , if not like SQL injection or some sort notify the user
        if(!$result){
            $_SESSION['message'] = "Trying to do some SQL injection?? item was not created";
            $_SESSION['msg_type'] = "danger";
            header("location:index.php");
        }else{
            $_SESSION['message'] = "Item has been updated!!";
            $_SESSION['msg_type'] = "success";
            header("location:index.php");

        }
}

