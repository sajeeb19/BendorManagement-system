
<?php 
   include('connection/databaseConnatcion.php');
   if(isset($_GET)){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $sql =  "SELECT firstName,lastName,employId, id FROM employ_information WHERE employId= '$id' ";
    $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
    $employinfo = mysqli_fetch_assoc($result);


    $spl1= "SELECT * FROM work_order WHERE employId= '$id' " ;
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
                                    <!-- <h2 class="center">Registration</h2> -->
                                    <div class="row grey lighten-3 z-depth-3 regParentRow">
                                        <form class="col s12" action="reg1.php" method="POST">
                                            <div class="row formRow">
                                                <div class="input-field col s6">
                                                    <input placeholder="Placeholder" id="first_name" type="text"  name="first_name" class="validate" value="">
                                                    <label for="first_name">First Name</label>
                                                </div>
                                                <div class="input-field col s6">
                                                        <input id="last_name" type="text" name="last_name" class="validate" value="">
                                                        <label for="last_name">Last Name</label>
                                                </div>
                                            </div>
                                        
                                            <div class="row formRow">
                                                <div class="input-field col s12">
                                                    <input required id="email" type="email" name="email" class="validate" value="">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="row formRow">
                                                <div class="input-field col s12">
                                                    <input id="number" type="text" name="number" class="validate" value="">
                                                    <label for="number">Phone Number</label>
                                                </div>
                                            </div>
                                            <div class="row formRow">
                                                <div class="input-field col s12">
                                                    <input id="password" type="password" name="password" class="validate" value="">
                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="row formRow">
                                                <div class="input-field col s12">
                                                    <select name="employCategory" id="employCategory" >
                                                        <option value="" disabled selected>Choose Category</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="agent">Agent</option>
                                                    </select>
                                                    <label for="employCategory"> Select Employ Category</label>
                                                </div>                      
                                            </div>

                                            <div class="row formRow">
                                                <div class="input-field col s12">
                                                        <input id="employ_id" type="text" name="employ_id" class="validate" value="" placeholder="Admin Start 01 and Agent Start 02">
                                                        <label for="employ_id">Employ Id</label>
                                                </div>
                                            </div>

                                            <div class="row formRow">
                                                <div class="input-field col s12">
                                                    <input type="date" id="birthday" name="birthday" class="datepicker" value="">
                                                    <label for="birthday">Birthday:</label>
                                                </div>
                                            </div>
                                            <div class="row formRow">
                                                <div class="input-field col s12">
                                                        <input type="hidden" name="employid" value="<?php echo $employinfo['employId'];?>">
                                                        <input type="submit" value="submit" name="submit" class="btn-large brand z-depth-0 right">
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
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