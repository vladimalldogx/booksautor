<?php
require_once("../connection.php");
$id = $_GET['id'];
$result = mysqli_query($conn,"DELETE * FROM tbl_user WHERE id = '$id'");
if($result){
    
}

?>