
<?php
 include('connection/databaseConnatcion.php');

  $employId= $password ='';
  $error = ['employId'=>'','password'=>''];
 if(isset($_POST['submit'])){
    if(empty($_POST['employId'])){
       
        $error['employId'] = "Invalid emply ID required";
      
    }else{
        $employId = mysqli_real_escape_string($conn,$_POST['employId']);
        // echo  $employId ;
        // print_r($employId );
    }
    if(empty($_POST['password'])){
       
        $error['password'] = "Invalid Password";
      
    }else{
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        // echo $password;
    }


    if (array_filter($error)) {
        echo "error occurd";
    }else{
        
        // $employId = mysqli_real_escape_string($conn,$_POST['employId']);
      
        // $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql =  "SELECT firstName,lastName,employId, id,category FROM employ_information WHERE employId  = '$employId' AND  password = '$password' " ;


        $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
        $information = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0){
            // header('Location:adminhome.php?id='. $information['employId']);
            if($information['category'] == 'admin'){
                if($information['employId'] == '001'){
                    header('Location:superAdmin.php?id='. $information['employId']);
                }
                else{
                    header('Location:adminhome.php?id='. $information['employId']);
                }
                
            }
            else{
                header('Location:agentHome.php?id='. $information['employId']);
            }
        }
        else{
            echo mysqli_errno($conn);
            
        }
       
    }


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
       /* .logform{
         margin-top: 250px;
        }
        .btnClass{
            margin-bottom: 26px;
        } */
       .taitle-Pera{
           font-size: 50px;
           color: rgb(238, 110, 115);
       }
       .peraMarg{
           margin-top: -50px;
       }
       
    </style>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col s6 logform">
                    <div class="row">
                        <div class="col s12  ">
                           <!-- <p class="taitle-Pera"><span> Banking</span>  <span> Agent Management System</span> <span> For Loan Approval </span> </p> -->
                           <p class="taitle-Pera"> Banking </p>
                           <p class="taitle-Pera peraMarg"> Agent Management System </p>
                           <p class="taitle-Pera peraMarg"> For Loan Approval   </p>
                        </div>

                    </div>
                </div>
                <div class="col s6">
                    <div class="row">
                        <div class="col s12 grey lighten-3 z-depth-2 logform " style="margin-left: 80px;">
                            <h3 class="center">Log In</h3>
                            <form action="login.php" method="POST" class="col s12 btnClass">
                                
                                  <label for="employId">Employ Id</label>
                                  <input type="text" name="employId" id="employId" placeholder="Employ ID" required>
                                  <label for="password">Password</label>
                                  <input type="password" name="password" id="password"  placeholder="Password" required>
                                  
                                 <div class="">
                                      <!-- <input type="submit" value="SUBMIT" > -->
                                      <input type="hidden" name="employid" value="<?php echo $information['employId'];?>">
                                      <button type="submit" name="submit" class="btn-large ight-blue darken-4 right ">SUBMIT</button>
                                 </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    <script src="js/jqueryscript.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>