<?php 
include('connection/databaseConnatcion.php');

if(isset($_GET)){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $sql =  "SELECT firstName,lastName,employId, id FROM employ_information WHERE employId= '$id' " ;
    $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
    $employinfo = mysqli_fetch_assoc($result);
    
    $workordernumber =  mysqli_real_escape_string($conn,$_GET['wonumber']);

    $sql3 = "SELECT * FROM work_order WHERE workOrderId ='$workordernumber '  ";
    $result3 = mysqli_query($conn,$sql3) or die( mysqli_error($conn));
    $workOrder1 = mysqli_fetch_assoc($result3);

    $agent=$workOrder1['agentId'];
    // echo $agent;

     
    // for agent name
    $sql4 =  "SELECT firstName,lastName,employId, id FROM employ_information WHERE employId= $agent " ;
    $result4 = mysqli_query($conn,$sql4) or die( mysqli_error($conn));
    $employinfo4 = mysqli_fetch_assoc($result4);
   
   //end agent name
    // print_r($workOrder1);

    
    mysqli_free_result( $result);
    
  //   print_r($pizza);
}

    $sql1 = "SELECT * FROM employ_information WHERE category = 'agent'" ;
    $result1 = mysqli_query($conn,$sql1) or die( mysqli_error($conn));
    $employinfo1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
    
    $sql2 = "SELECT * FROM work_order ORDER BY workOrderId DESC LIMIT 1  ";
    $result2 = mysqli_query($conn,$sql2) or die( mysqli_error($conn));
    $workOrder = mysqli_fetch_assoc($result2);

    $workOrderId = $workOrder['workOrderId'];

    if($workOrderId == ''){
        $workId = "WO1" ;
    }else{
        $workId = substr($workOrderId,2);
        $workId = intval($workId);
        $workId = "WO" . ($workId + 1);
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
                                        <a href="adminhome.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Work Order list </a>
                                    </div>
                                    <div class="center listitem " >
                                        <a href="wo1.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Creat Work Order </a>
                                    </div>
                                    <div class="center  listitem " >
                                        <a href="adminReportList.php?id=<?php echo $employinfo['employId']?>" class="btn red waves-effect waves-light btnwidth ">Report </a>
                                    </div>

                                </div>


                                <div class="col s9 z-depth-2">
                                  <div class="row z-depth-1 workorderRow">
                                        <div class="col 12 formargin">
                                            <h5>Create Work Order</h5>
                                            <form action="updateCondition.php" method="POST" enctype="multipart/form-data">
                                                <label for="workOrderId">Work Order Number</label>
                                                <input type="text" name="workOrderId" id="workOrderId" value="<?php echo $workOrder1['workOrderId'] ?>" readonly>

                                                <label for="customerName">Customer Name</label>
                                                <input type="text" name="customerName" id="customerName" value="<?php echo $workOrder1['customerName'] ?>"  placeholder="Customer Name" required>

                                                <label for="customerNumber">Phone Number</label>
                                                <input type="number" name="customerNumber" id="customerNumber" value="<?php echo $workOrder1['phoneNumber'] ?>"  placeholder="Customer Phone Number" required>
                                                
                                                <label for="customerEmail">Email</label>
                                                <input type="email" name="customerEmail" id="customerEmail" value="<?php echo $workOrder1['email'] ?>"  placeholder="Customer Email" required>

                                                <label for="workAddress">Address</label>
                                                <textarea name="workAddress" id="workAddress" class="materialize-textarea"   data-length="120"  placeholder="Office/Factory/Business" required><?php echo $workOrder1['jobAddress'] ?></textarea>

                                                <label for="residentialAddress">Address</label>
                                                <textarea name="residentialAddress" id="residentialAddress" class="materialize-textarea" data-length="120" placeholder="Residential Addresss" required><?php echo $workOrder1['residentialAddress'] ?></textarea>

                                                <label for="loanAmount">Amount Of Loan</label>
                                                <input type="number" name="loanAmount" id="loanAmount" value="<?php echo $workOrder1['loanAmount'] ?>"  placeholder="Loan Amount" required>

                                                <label for="loanTime">Tenure</label>
                                                <input type="text" name="loanTime" id="loanTime" value="<?php echo $workOrder1['loanTime'] ?>"  placeholder="Loan Time" required>

                                                <label for="loanType">Loan Type</label>
                                                <select name="loanType" id="loanType" >
                                                    <option value="" disabled selected>Choose Loan Type</option>
                                                    <option value="homeLoan">Home loan</option>
                                                    <option value="autoLoan">Auto loan</option>
                                                    <option value="personalLoan">Personal loan</option>
                                                    <option value="creditCardLoan">Credit card loan</option>

                                                </select>


                                                
                                                <div>
                                                <label for="appliedDate">Applied date</label>
                                                <input type="date" class="datepicker" name="appliedDate"  value="<?php echo $workOrder1['appliedDate'] ?>"  id="appliedDate" placeholder="Applied date" required>
                                                </div>

                                                <label for="customerContactPersonName">Contact person's name</label>
                                                <input type="text" name="customerContactPersonName" id="customerContactPersonName" value="<?php echo $workOrder1['contactPersonName'] ?>" placeholder="Contact person's name" required>

                                                <label for="customerContactPersonNumber">Contact person's Number</label>
                                                <input type="number" name="customerContactPersonNumber" id="customerContactPersonNumber" value="<?php echo $workOrder1['contactPersonNumber']; ?>"  placeholder="Contact person's Number" required>

                                                <div class="file-field input-field">
                                                    <div class="btn">
                                                        <span>File</span>
                                                        <input type="file" id="" name="file" value="<?php echo $workOrder1['file'] ; ?>"  required>
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" value="<?php echo $workOrder1['file'] ; ?>" type="text">
                                                    </div>
                                                </div>

                                                
                                                <label for="agentAssign">Assign Agent</label>
                                                <select name="agentAssign" id="agentAssign"  >
                                                    <option value="" disabled selected> <span><?php echo htmlspecialchars($employinfo4['firstName']) ; ?> </span><span><?php echo htmlspecialchars($employinfo4['lastName']) ; ?> </span>  </option>  
                                                                                        
                                                    <?php foreach($employinfo1 as $itam) : ?>
                                                        <option value=" <?php echo htmlspecialchars($itam['employId']) ; ?> "> <span><?php echo htmlspecialchars($itam['firstName']) ; ?> </span>  <span><?php echo htmlspecialchars($itam['lastName']) ; ?> </span>   </option>
                                        
                                                    <?php endforeach; ?>                                                

                                                </select>
                                                                    
                                                <div class="forbutton">
                                                    <!-- <input type="submit" value="SUBMIT" > -->

                                                    <input type="hidden" name="employid" value="<?php echo $employinfo['employId'];?>">
                                                    <button type="submit" name="submit" class="btn-large ight-blue darken-4 right ">SUBMIT</button>
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