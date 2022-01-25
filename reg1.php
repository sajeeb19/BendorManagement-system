<?php
include('connection/databaseConnatcion.php');
$first_name= $last_name= $email=$number=$password=$employCategory=$employ_id=$birthday='';

$error = ['first_name'=>'','last_name'=>'',"email"=>'',"number" =>'',"password" =>'',"employCategory" => '',"employ_id" =>'',"birthday"=>''];

if(isset($_POST['submit'])){

    if(empty($_POST['first_name'])){
       
        $error['first_name'] = "First Name required";
        echo $error['first_name'];
      
    }else{
        $first_name = htmlspecialchars($_POST['first_name']);
    }
    if(empty($_POST['last_name'])){
        $error['last_name'] = "Last name required";
        echo $error['last_name'];
      
    }else{
        $last_name = htmlspecialchars($_POST['last_name']);
    }
    
    if(empty($_POST['email'])){
        $error['email'] = "A email required";
        echo $error['email'];
      
    }else{
        $email = htmlspecialchars($_POST['email']);
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $error['email'] =  "write a valid email";
           echo $error['email'];

       }
    }
      
    
    if(empty($_POST['number'])){
        $error['number'] = "Phone Number required";
        echo $error['number'];
      
    }else{
        $number = htmlspecialchars($_POST['number']);
    }

    if(empty($_POST['password'])){
        
        $error['password'] = "Password required";
        echo $error['password'];
      
    }else{
        $password = htmlspecialchars($_POST['password']);
    }
    if(empty($_POST['employCategory'])){
        
        $error['employCategory'] = "Select Employ category ";
        echo $error['employCategory'];
      
    }else{
        $employCategory = htmlspecialchars($_POST['employCategory']);
    }
    if(empty($_POST['employ_id'])){
        
        $error['employ_id'] = "Select Employ category ";
        echo $error['employ_id'];
      
    }else{
        $employ_id = htmlspecialchars($_POST['employ_id']);
    }

    if(empty($_POST['birthday'])){
       
        $error['birthday'] = "Select Employ category ";
        echo $error['birthday'];
      
    }else{
        $birthday = htmlspecialchars($_POST['birthday']);
    }
    if(empty($_POST['employid'])){
       
        $error['employid'] = "Select Employ category ";
        echo $error['employid'];
      
    }else{
        $employid = htmlspecialchars($_POST['employid']);
    }


    if (array_filter($error)) {
        echo "error occurd";
    }else{
    

        $first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $number = mysqli_real_escape_string($conn,$_POST['number']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $employCategory = mysqli_real_escape_string($conn,$_POST['employCategory']);
        $employ_id = mysqli_real_escape_string($conn,$_POST['employ_id']);
        $birthday = mysqli_real_escape_string($conn,$_POST['birthday']);
        $employid = mysqli_real_escape_string($conn,$_POST['employid']);


        $sql = "INSERT INTO `employ_information` (`firstName`, `lastName`, `email`, `phoneNumber`, `password`, `category`, `employId`, `bathday`) 
                VALUES ('$first_name', '$last_name', '$email', '$number', '$password', '$employCategory', '$employ_id', '$birthday')";




        if (mysqli_query($conn,$sql)) {
            header('Location:superAdmin.php?id='.$employid );
            
           
        }else{
            echo mysqli_errno($conn);
        }

        
        
    }


    

 }
 mysqli_close($conn);

 ?>