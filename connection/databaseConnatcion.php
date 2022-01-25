<?php 

$conn = mysqli_connect('localhost','admin1','admin123','final_project');

if(!$conn){
    echo "connection error :".mysqli_connect_error();
}

?>