<?php 
include('connection/databaseConnatcion.php');

if(isset($_GET)){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $sql =  "SELECT firstName,lastName,employId, id,category FROM employ_information WHERE employId= $id " ;
    $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
    $employinfo = mysqli_fetch_assoc($result);
    
    $workordernumber =  mysqli_real_escape_string($conn,$_GET['wonumber']);

    $sql2 = "SELECT * FROM workorder_report WHERE workOrderId ='$workordernumber '  ";
    $result2 = mysqli_query($conn,$sql2) or die( mysqli_error($conn));
    $workOrder = mysqli_fetch_assoc($result2);
    
    $nameID= $workOrder['assigentById'];
    $nameID1= $workOrder['employId'];
    // print_r($workOrder);
    // print_r($nameID);

    $sql3 = "SELECT * FROM employ_information WHERE employId = $nameID" ;
    $result3 = mysqli_query($conn,$sql3) or die( mysqli_error($conn));
    $employinfo3 = mysqli_fetch_assoc($result3);

    $sql4 = "SELECT * FROM employ_information WHERE employId = $nameID1" ;
    $result4 = mysqli_query($conn,$sql4) or die( mysqli_error($conn));
    $employinfo4 = mysqli_fetch_assoc($result4);

    mysqli_free_result( $result);

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
    width: 700px;
    margin-left: 15px;
    }

    .forbutton{
        margin-top: 27px;
    }
    .fontsize{
    font-size: 20px;
    }
    .collection > .row{
        border-bottom: 1px solid #eceff1;
    }
    .col > li{
        font-size: 18px;
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
                                    <?php if($employinfo['category'] == 'admin') : ?>
                                        <div class="center listitem ">
                                            <a href="adminhome.php?id=<?php echo $employinfo['employId']?>"class="btn red waves-effect waves-light btnwidth " > Work Order list </a>
                                        </div>
                                        <div class="center listitem " >
                                            <a href="wo1.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Creat Work Order </a>
                                        </div>
                                        <div class="center  listitem " >
                                            <a href="adminReportList.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Report </a>
                                        </div>
                                    <?php else : ?>
                                        <div class="center listitem ">
                                            <a href="agentHome.php?id=<?php echo $employinfo['employId']?>"class="btn red waves-effect waves-light btnwidth " > Work Order list </a>
                                        </div>
                                        <div class="center  listitem " >
                                            <a href="reportList.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Report </a>
                                        </div>
                                    <?php endif; ?>

                                </div>


                                <div class="col s9 z-depth-2">
                                  <div class="row z-depth-1 workorderRow">
                                        <div class="col 12 formargin">


                                           <ul class="collection with-header">
                                                <div class="row">
                                                    <div class="col s12">
                                                        <li class="collection-header"><h5><span class="teal-text text-lighten-1">Work Order Number :</span> <?php echo $workOrder['workOrderId'] ; ?></h5></li>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <li class="collection-item"><span class="teal-text text-lighten-1">Customer Name :</span>  <?php echo $workOrder['customerName'] ; ?> </li>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                        <div class="col s6">
                                                            <li class="collection-item"><span class="teal-text text-lighten-1">Loan Amount :</span>  <?php echo $workOrder['loanAmount'] ; ?></li>
                                                        </div>
                                                        <div class="col s6">
                                                            <li class="collection-item"><span class="teal-text text-lighten-1">Loan Type :</span>  <?php echo $workOrder['loanType'] ; ?></li>
                                                        </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col s6">
                                                        <li class="collection-item"><span class="teal-text text-lighten-1"> Address Varified :</span>  <?php echo $workOrder['addressVarification'] ; ?></li>
                                                    </div>
                                                    <div class="col s6">
                                                        <li class="collection-item"><span class="teal-text text-lighten-1"> LOI Varified :</span>  <?php echo $workOrder['loiVarification'] ; ?></li>
                                                    </div>
                                                
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <li class="collection-item"><span class="teal-text text-lighten-1"> Yearly Sales Turn Over :</span>  <?php echo $workOrder['yearlySales'] ; ?></li>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <li class="collection-item"><span class="teal-text text-lighten-1"> Inventory Amount :</span>  <?php echo $workOrder['inventoryAmount'] ; ?></li>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <li class="collection-item"><span class="teal-text text-lighten-1"> File :</span>  <a download="<?php echo $workOrder['reportfile'] ; ?>" href="file/<?php echo $workOrder['reportfile'] ; ?>"> <span> <?php echo $workOrder['reportfile'] ; ?> </span> </a> </li>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <li class="collection-item"><span class="teal-text text-lighten-1"> Report Commnet :</span>  <?php echo $workOrder['reportComment'] ; ?></li>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col s6">
                                                        <li class="collection-item"><span class="teal-text text-lighten-1"> Created By :</span>  <span><?php echo $employinfo4['firstName']." " ; ?></span><span><?php echo $employinfo4['lastName'] ; ?></span></li>
                                                    </div>
                                                    <div class="col s6">
                                                        <li class="collection-item"><span class="teal-text text-lighten-1"> Assigned By :</span>  <span><?php echo $employinfo3['firstName']." " ; ?></span><span><?php echo $employinfo3['lastName'] ; ?></span></li>
                                                    </div>
                                                
                                                </div>
                                                
                                                
                                            </ul>
                                            

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