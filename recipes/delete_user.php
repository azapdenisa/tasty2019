<?php
include('../login/functions.php');

//Define the query


$query = "DELETE FROM users WHERE id={$_POST['id']} LIMIT 1";
//sends the query to delete the entry
mysqli_query($db, $query);
header('location: view_users.php');
?>