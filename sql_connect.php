<?php

/**
 * Connection to DB
 * In a separated file for security
 */
DEFINE ('DB_USER','root');
DEFINE ('DB_PASSWORD','');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','shoppingcart');

$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
OR die('Could not connect to MySQL '.
mysqli_connect_error());







