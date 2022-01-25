<?php 
include('connection/databaseConnatcion.php');

if(isset($_GET)){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $sql =  "SELECT firstName,lastName,employId, id FROM employ_information WHERE employId= '$id' ";
    $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
    $employinfo = mysqli_fetch_assoc($result);


    $spl1= "SELECT * FROM employ_information WHERE category= 'admin' " ;
    $result1 = mysqli_query($conn,$spl1) or die( mysqli_error($conn));
    $employinfo1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);

    mysqli_free_result( $result);
    mysqli_free_result( $result1);
    mysqli_close($conn);
  
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <title>Document</title>
    
    <style>
     body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
    }
    .con1 {
        margin-top: 30px;
    }
    table>tbody>tr>td{
        font-size: 18px;
    }
   
    </style>
</head>
<body>

    <div class="container con1 z-depth-2"> 
            <nav  class="newheight">
                <div class="nav-wrapper">
                    <div class="details">
                        <i class="material-icons">person</i>
                        <p class="employname black-text "><span><?php echo $employinfo['firstName'];?></span> <span><?php echo $employinfo['lastName'];?></span></p>
                        <h5 class="employid  black-text">ID: <?php echo $employinfo['employId'];?></h5>
                    </div>
                    <ul id="nav-mobile" class="logout right hide-on-med-and-down">
                        <li><a href="login.php">LOGOUT</a></li>
                    </ul>
                </div>
            </nav>
            <section>
                    
                            <div class="row">
                                <div class="col s3 blue lighten-5   sidebar z-depth-2">
                                    <div class="center listitem " >
                                        <a href="adminMember.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Admin Employ </a>
                                    </div>
                                    <div class="center listitem " >
                                        <a href="agentMember.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Agent Employ </a>
                                    </div>
                                    <div class="center  listitem " >
                                        <a href="registration.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Registration</a>
                                    </div>

                                </div>


                                <div class="col s9 z-depth-2">

                                 <?php foreach ($employinfo1 as $item) : ?>
                                  <div class="row z-depth-1 workorderRow">
                                        <div class="col s8 ">

                                                <table >
                                                    <tbody>
                                        
                                                        <tr>
                                                            <td>Name :<?php echo " ". "<span>".$item['firstName']."</span> "." "."<span>".$item['lastName']."</span>" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Category : <?php echo " ". htmlspecialchars($item['category']) ; ?></td>
                                                            <td>Employ Id:<?php echo " ". htmlspecialchars($item['employId']) ; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Email : <?php echo " ". htmlspecialchars($item['email']) ; ?> </td>                                                                                  
                                                            <td>Phone: <?php echo " ". htmlspecialchars($item['phoneNumber']) ; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Bath of Date : <?php echo " ". htmlspecialchars($item['bathday']) ; ?> </td>                                                                                  
                                                           
                                                        </tr>
                                                    </tbody>
                                                </table>
                                        </div>
                                        <div class="col s2  center"> 
                                           
                                            <!-- <a class="btn pulse"><i class="material-icons foricon">menu</i></a> -->
                                         </div>
                                        <div class="col s2 center">
                                           
                                        </div>
                                   </div>
                                   
                                 <?php endforeach; ?>

                                </div>
                        </div>

                    
            </section>


            <footer class=" fott">
               <div class="container">
               <div class="row">
                   <div class="col s5">
                      <div>
                          <h5>Banking Agent Management System for Loan Approval</h5>
                          <p >Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium sint voluptate ex impedit accusamus rerum voluptatum esse, enim consectetur repellat.</p>
                      </div>
                   </div>
                   <div class="col s7">
                        <p style="text-align: right;">Copyright © 2022 - All Right Reserved - Tasmim </p>
                   </div>
                </div>
              
                   
               
               </div>
            </footer>
    </div>
    <script>
    </script>


    
    <script src="js/jqueryscript.js"></script>
    <!-- <script src="js/script.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/newScript.js"></script>
    
</body>
</html>