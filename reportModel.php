<?php

    include('connection/databaseConnatcion.php');

   $workOrderId=$customerName=$loanAmount=$loanType=$addressVarification=$yearlySales=$inventoryAmount=$loiVarification=$reportfile=' ';
   $reportComment=$employId=$assigentById='';

   $error = ['workOrderId'=>'','customerName'=>'',"loanAmount" =>'',"loanType"=>'',
            "addressVarification"=>'',"yearlySales"=>'',"inventoryAmount"=>'',"loiVarification"=>'',"reportfile"=>'',"reportComment"=>'',"employId"=>'',"assigentById" =>''];

    if(isset($_POST['submit'])){

        if(empty($_POST['workOrderId'])){
       
            $error['workOrderId'] = "Workorder required";
          
        }else{
            $workOrderId = htmlspecialchars($_POST['workOrderId']);
        }




        if(empty($_POST['customerName'])){
       
            $error['customerName'] = "Customer Name required";
          
        }else{
            $customerName = htmlspecialchars($_POST['customerName']);
        }

        
        if(empty($_POST['loanAmount'])){
       
            $error['loanAmount'] = "Loan Amount required";
          
        }else{
            $loanAmount = htmlspecialchars($_POST['loanAmount']);
        }

        if(empty($_POST['loanType'])){
            $error['loanType'] = "Loan Type required";
          
        }else{
            $loanType = htmlspecialchars($_POST['loanType']);
            
        }

        if(empty($_POST['addressVarification'])){
       
            $error['addressVarification'] = "Address Varification required";
          
        }else{
            $addressVarification = htmlspecialchars($_POST['addressVarification']);
        }

        if(empty($_POST['yearlySales'])){
       
            $error['yearlySales'] = "Yearly Sales Amount required";
          
        }else{
            $yearlySales = htmlspecialchars($_POST['yearlySales']);
        }

        if(empty($_POST['inventoryAmount'])){
       
            $error['inventoryAmount'] = "Inventory Amount required";
          
        }else{
            $inventoryAmount = htmlspecialchars($_POST['inventoryAmount']);
        }

        if(empty($_POST['loiVarification'])){
       
            $error['loiVarification'] = "LOI Varification required";
          
        }else{
            $loiVarification = htmlspecialchars($_POST['loiVarification']);
        }
    
        if(empty($_FILES['reportfile']['name'])){
       
            $error['reportfile'] = "File required";
          
        }else{
            $reportfile = htmlspecialchars($_FILES['reportfile']['name']);
            $reportfile_type = $_FILES['reportfile']['type'];
            $reportfile_size = $_FILES['reportfile']['size'];
            $reportfile_temp_loc = $_FILES['reportfile']['tmp_name'];
            $reportfile_store = "file/".$reportfile;
            move_uploaded_file($reportfile_temp_loc,$reportfile_store);

        }

        if(empty($_POST['reportComment'])){
       
            $error['reportComment'] = "Report Comment required";
          
        }else{
            $reportComment = htmlspecialchars($_POST['reportComment']);
        }

        if(empty($_POST['employId'])){
       
            $error['employId'] = "Employ Id required";
          
        }else{
            $employId = htmlspecialchars($_POST['employId']);
        }
        if(empty($_POST['assigentById'])){
       
            $error['assigentById'] = "Assigent By Id required";
          
        }else{
            $assigentById = htmlspecialchars($_POST['assigentById']);
        }

        if(array_filter($error)){
            echo "error coourd";
        }

        else{

        

            $sql = " INSERT INTO `workorder_report` (`workOrderId`, `customerName`, `loanAmount`, `loanType`, `addressVarification`, `yearlySales`, 
            `inventoryAmount`, `loiVarification`, `reportfile`, `reportComment`, `employId`, `assigentById`)
                    VALUES ('$workOrderId', '$customerName', '$loanAmount', '$loanType', '$addressVarification', '$yearlySales',
                     '$inventoryAmount', '$loiVarification','$reportfile','$reportComment','$employId','$assigentById') ";

            if (mysqli_query($conn,$sql)) {
                header('Location:reportList.php?id='.$employId);
                // echo "submit sucefull";
            
            }else{
            echo mysqli_errno($conn);
            }

            //end
           
            
        }




    }
    else if(isset($_POST['update'])){

        if(empty($_POST['workOrderId'])){
       
            $error['workOrderId'] = "Workorder required";
          
        }else{
            $workOrderId = htmlspecialchars($_POST['workOrderId']);
        }




        if(empty($_POST['customerName'])){
       
            $error['customerName'] = "Customer Name required";
          
        }else{
            $customerName = htmlspecialchars($_POST['customerName']);
        }

        
        if(empty($_POST['loanAmount'])){
       
            $error['loanAmount'] = "Loan Amount required";
          
        }else{
            $loanAmount = htmlspecialchars($_POST['loanAmount']);
        }

        if(empty($_POST['loanType'])){
            $error['loanType'] = "Loan Type required";
          
        }else{
            $loanType = htmlspecialchars($_POST['loanType']);
            
        }

        if(empty($_POST['addressVarification'])){
       
            $error['addressVarification'] = "Address Varification required";
          
        }else{
            $addressVarification = htmlspecialchars($_POST['addressVarification']);
        }

        if(empty($_POST['yearlySales'])){
       
            $error['yearlySales'] = "Yearly Sales Amount required";
          
        }else{
            $yearlySales = htmlspecialchars($_POST['yearlySales']);
        }

        if(empty($_POST['inventoryAmount'])){
       
            $error['inventoryAmount'] = "Inventory Amount required";
          
        }else{
            $inventoryAmount = htmlspecialchars($_POST['inventoryAmount']);
        }

        if(empty($_POST['loiVarification'])){
       
            $error['loiVarification'] = "LOI Varification required";
          
        }else{
            $loiVarification = htmlspecialchars($_POST['loiVarification']);
        }
    
        if(empty($_FILES['reportfile']['name'])){
       
            $error['reportfile'] = "File required";
          
        }else{
            $reportfile = htmlspecialchars($_FILES['reportfile']['name']);
            $reportfile_type = $_FILES['reportfile']['type'];
            $reportfile_size = $_FILES['reportfile']['size'];
            $reportfile_temp_loc = $_FILES['reportfile']['tmp_name'];
            $reportfile_store = "file/".$reportfile;
            move_uploaded_file($reportfile_temp_loc,$reportfile_store);

        }

        if(empty($_POST['reportComment'])){
       
            $error['reportComment'] = "Report Comment required";
          
        }else{
            $reportComment = htmlspecialchars($_POST['reportComment']);
        }

        if(empty($_POST['employId'])){
       
            $error['employId'] = "Employ Id required";
          
        }else{
            $employId = htmlspecialchars($_POST['employId']);
        }
        if(empty($_POST['assigentById'])){
       
            $error['assigentById'] = "Assigent By Id required";
          
        }else{
            $assigentById = htmlspecialchars($_POST['assigentById']);
        }

        if(array_filter($error)){
            echo "error coourd";
        }

        else{

        

            $sqlUpdate = " UPDATE `workorder_report` SET `workOrderId`='$workOrderId', `customerName`='$customerName', `loanAmount`='$loanAmount', `loanType`='$loanType', `addressVarification`='$addressVarification',
             `yearlySales`= '$yearlySales', `inventoryAmount`='$inventoryAmount', `loiVarification`='$loiVarification', `reportfile`='$reportfile', `reportComment`='$reportComment', `employId`='$employId', `assigentById`='$assigentById' WHERE workOrderId= '$workOrderId' ";

            if (mysqli_query($conn,$sqlUpdate)) {
                header('Location:reportList.php?id='.$employId);
                // echo "submit sucefull";
            
            }else{
            echo mysqli_errno($conn);
            }

            //end
           
            
        }




    }



    mysqli_close($conn);
?>