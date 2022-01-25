<?php 
include('connection/databaseConnatcion.php');

if(isset($_GET)){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $sql =  "SELECT firstName,lastName,employId, id,category FROM employ_information WHERE employId= $id " ;
    $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
    $employinfo = mysqli_fetch_assoc($result);
    
    $workordernumber =  mysqli_real_escape_string($conn,$_GET['wonumber']);

    $sql2 = "SELECT * FROM work_order WHERE workOrderId ='$workordernumber '  ";
    $result2 = mysqli_query($conn,$sql2) or die( mysqli_error($conn));
    $workOrder = mysqli_fetch_assoc($result2);
    $nameID= $workOrder['agentId'];
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
    }

    .forbutton{
        margin-top: 27px;
    }
    .fontsize{
    font-size: 20px;
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
                                           <table>
                                              <tr>
                                                  <th>Work Order Number : <?php echo $workOrder['workOrderId'] ; ?> </th>
                                              </tr>
                                              <tr>
                                                  <td class="fontsize"> <span class="blue-text">Customer Name :</span> <?php echo $workOrder['customerName'] ; ?> </td>
    
                                                  <td class="fontsize"> <span class="blue-text "> Customer Number : </span> <?php echo $workOrder['phoneNumber'] ; ?> </td>
                                                  
                                              </tr>
                                              <tr>
                                                    <td class="fontsize"><span class="blue-text ">   Customer Email : </span> <?php echo $workOrder['email'] ; ?> </td>
                                              </tr>
                                              <tr>
                                                <td class="fontsize"><span class="blue-text ">   Customer Work Address : </span> <?php echo $workOrder['jobAddress'] ; ?> </td>
                                              </tr>
                                              <tr>
                                                <td class="fontsize"><span class="blue-text ">   Customer Residential Address : </span> <?php echo $workOrder['residentialAddress'] ; ?> </td>
                                              </tr>
                                              <tr>
                                                <td class="fontsize"><span class="blue-text ">  Loan Amount  : </span> <?php echo $workOrder['loanAmount'] ; ?> </td>
                                                <td class="fontsize"><span class="blue-text ">  Loan Time  : </span> <?php echo $workOrder['loanTime'] ; ?> </td>
                            
                                              </tr>
                                              <tr>
                                                
                                                <td class="fontsize"><span class="blue-text ">  Loan Type  : </span> <?php echo $workOrder['loanType'] ; ?> </td>
                                                <td class="fontsize"><span class="blue-text ">  Loan Applied Date  : </span> <?php echo $workOrder['appliedDate'] ; ?> </td>
                                              </tr>
                                              <tr>
                                                
                                                <td class="fontsize"><span class="blue-text ">  Contact Person Name : </span> <?php echo $workOrder['contactPersonName'] ; ?> </td>
                                                <td class="fontsize"><span class="blue-text ">  Contact Person Number  : </span> <?php echo $workOrder['contactPersonNumber'] ; ?> </td>
                                              </tr>
                                              <tr>
                                                
                                                <td class="fontsize"> <span class="blue-text ">File :</span> <a download="<?php echo $workOrder['file'] ; ?>" href="file/<?php echo $workOrder['file'] ; ?>"> <span> <?php echo $workOrder['file'] ; ?> </span> </a>  </td>
                                                
                                              </tr>
                                              <tr>
                                                <td class="fontsize"><span class="blue-text ">   Agent name : </span> <span><?php echo $employinfo3['firstName']." " ; ?></span><span><?php echo $employinfo3['lastName'] ; ?></span>
                                                </td>
                                                <td class="fontsize"><span class="blue-text ">   Assigent By : </span> <span><?php echo $employinfo4['firstName']." " ; ?></span><span><?php echo $employinfo4['lastName'] ; ?></span>
                                                </td>
                                              </tr>
                                              
                                           </table>
                                            

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