<?php 
include('connection/databaseConnatcion.php');

if(isset($_GET)){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $sql =  "SELECT firstName,lastName,employId, id FROM employ_information WHERE employId= '$id' " ;
    $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
    $employinfo = mysqli_fetch_assoc($result);
    
    $workordernumber =  mysqli_real_escape_string($conn,$_GET['wonumber']);

    $sql3 = "SELECT * FROM workorder_report WHERE workOrderId ='$workordernumber '  ";
    $result3 = mysqli_query($conn,$sql3) or die( mysqli_error($conn));
    $workOrder1 = mysqli_fetch_assoc($result3);
    
    $assigentAdminName=$workOrder1['employId'];
    // echo $agent;

     
    // for agent name
    $sql4 =  "SELECT firstName,lastName,employId, id FROM employ_information WHERE employId= $assigentAdminName " ;
    $result4 = mysqli_query($conn,$sql4) or die( mysqli_error($conn));
    $employinfo4 = mysqli_fetch_assoc($result4);
   
   //end agent name
    // print_r($workOrder1);

    
    mysqli_free_result( $result);
    
  //   print_r($pizza);
}


    
    

   

  

    mysqli_close($conn);
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
    .formargin{
    margin-bottom: 25px;
    }

    .forbutton{
        margin-top: 27px;
    }
    .worept{
    width: 600px;
    margin-left: 75px;
    
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
                                <div class="col s3  blue lighten-5  sidebar z-depth-2">
                                    <div class="center listitem " >
                                        <a href="agentHome.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Work Order list </a>
                                    </div>
                                    <!-- <div class="center listitem " >
                                        <a href="wo1.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Creat Work Order </a>
                                    </div> -->
                                    <div class="center  listitem " >
                                        <a href="reportList.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Report </a>
                                    </div>

                                </div>


                                <div class="col s9 z-depth-2">
                                  <div class="row z-depth-1 workorderRow">
                                        <div class="col 12 formargin worept z-depth-0">
                                            <h5>Update Work Order Report</h5>
                                            <form action="reportModel.php" method="POST" enctype="multipart/form-data">
                                                
                                                <div class="row formRow">
                                                    <div class="input-field col s12">
                                                        <label for="workOrderId">Work Order Number</label>
                                                        <input type="text" name="workOrderId" id="workOrderId" value="<?php echo $workOrder1['workOrderId'] ?>" readonly>
                                                    </div>
                
                                                </div>
                                                <div class="row formRow">
                                                    <div class="input-field col s12">
                                                        <label for="customerName">Customer Name  </label>
                                                        <input type="text" name="customerName" id="customerName" value="<?php echo $workOrder1['customerName'] ?>" readonly>
                                                    </div>
                
                                                </div>
                                                <div class="row formRow">
                                                    <div class="input-field col s6">
                                                        <label for="loanAmount">Loan Amount  </label>
                                                        <input type="text" name="loanAmount" id="loanAmount" value="<?php echo $workOrder1['loanAmount'] ?>" readonly>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <label for="loanType">Loan Type  </label>
                                                        <input type="text" name="loanType" id="loanType" value="<?php echo $workOrder1['loanType'] ?>" readonly>
                                                    </div>
                
                                                </div>

                                                <div class="row formRow">
                                                    <div class="input-field col s12">
                                                        <h5>Address Varified</h5>
                                                        <p>
                                                            <label>
                                                                <input type="radio" id="" name="addressVarification" value="YES" <?php if ($workOrder1['addressVarification'] == 'YES'){ echo 'checked'  ;} ?> />
                                                                <span>YES</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" id="" name="addressVarification" value="NO" <?php if ($workOrder1['addressVarification'] == 'NO'){ echo 'checked'  ;} ?> />
                                                                <span>NO</span>
                                                            </label>
                                                        </p>
                                                    </div>
                
                                                </div>
                                                <div class="row formRow">
                                                    <div class="input-field col s12">
                                                        <label for="yearlySales"> Yearly Sales Turn Over </label>
                                                        <input type="text" name="yearlySales" id="yearlySales" class="validate" value="<?php echo $workOrder1['yearlySales']; ?>"   required>
                                                    </div>
                
                                                </div>
                                                <div class="row formRow">
                                                    <div class="input-field col s12">
                                                        <label for="inventoryAmount"> Inventory Amount </label>
                                                        <input type="text" name="inventoryAmount" id="inventoryAmount" class="validate" value="<?php echo $workOrder1['inventoryAmount']; ?>"  required>
                                                    </div>
                
                                                </div>
                                                <div class="row formRow">
                                                    <div class="input-field col s12">
                                                        <h5>LOI Varified (Self Empolyed or Salaried Person)</h5>
                                                            <p>
                                                                <label>
                                                                    <input type="radio" id="" name="loiVarification" value="YES" <?php if ($workOrder1['loiVarification'] == 'YES'){ echo 'checked'  ;} ?> />
                                                                    <span>YES</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" id="" name="loiVarification" value="NO" <?php if ($workOrder1['loiVarification'] == 'NO'){ echo 'checked'  ;} ?> />
                                                                    <span>NO</span>
                                                                </label>
                                                            </p>
                                                    </div>
                
                                                </div>
                                                <div class="row formRow">
                                                    <div class="file-field input-field col s12">
                                                        <div class="btn">
                                                            <span>File</span>
                                                            <input type="file" id="" name="reportfile" value="<?php echo $workOrder1['reportfile']; ?>">
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate" type="text" value="<?php echo $workOrder1['reportfile']; ?>" placeholder="Attatched Importent Document">
                                                        </div>   
                                                    </div>
                
                                                </div>

                                                <div class="row formRow">
                                                    <div class="file-field input-field col s12">
                                                        <i class="material-icons prefix">mode_edit</i>
                                                        <label for="icon_prefix2">Report Comment</label>
                                                        <textarea id="icon_prefix2" class="materialize-textarea" name="reportComment" value><?php echo $workOrder1['reportComment']; ?></textarea>
                                                    </div>
                
                                                </div>
                                                <div class="row formRow">
                                                    <div class="col s12">
                                                        <input type="hidden" name="employId" value="<?php echo $employinfo['employId'];?>">
                                                        <input type="hidden" name="assigentById" value="<?php echo $assigentAdminName;?>">
                                                        <button type="submit" name="update" class="btn-large ight-blue darken-4 right ">SUBMIT</button>
                                                    </div>
                
                                                </div>
                                  
                                            </form>

                                        </div>
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

    <script src="js/jqueryscript.js"></script>
    <script src="js/script.js"></script>
    <script src="js/newScript.js"></script>
</body>
</html>