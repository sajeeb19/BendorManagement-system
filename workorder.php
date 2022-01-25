<?php

    include('connection/databaseConnatcion.php');

   $workOrderId=$customerName=$customerNumber=$customerEmail=$workAddress=$residentialAddress=' ';
   $loanAmount=$loanTime=$loanType=$appliedDate=$customerContactPersonName=$customerContactPersonNumber=$file=$agentAssignid=$employid=$agemtName='';

   $error = ['workOrderId'=>'','customerName'=>'',"customerNumber"=>'',"customerEmail" =>'',"workAddress" =>'',"residentialAddress" => '',"loanAmount" =>'',"loanTime"=>'',"loanType"=>'',
            "appliedDate"=>'',"customerContactPersonName"=>'',"customerContactPersonNumber"=>'',"file"=>'',"agentAssignid"=>'',"employid"=>'',"agemtName" =>''];

    if(isset($_POST['submit'])){

        if(empty($_POST['workOrderId'])){
       
            $error['workOrderId'] = "Workorder required";
          
        }else{
            $workOrderId = htmlspecialchars($_POST['workOrderId']);
        }




        if(empty($_POST['customerName'])){
       
            $error['customerName'] = "customerName required";
          
        }else{
            $customerName = htmlspecialchars($_POST['customerName']);
        }

        
        if(empty($_POST['customerNumber'])){
       
            $error['customerNumber'] = "customerNumber required";
          
        }else{
            $customerNumber = htmlspecialchars($_POST['customerNumber']);
        }

        if(empty($_POST['customerEmail'])){
            $error['customerEmail'] = "customerEmail required";
          
        }else{
            $customerEmail = htmlspecialchars($_POST['customerEmail']);
            if(!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)){
                //    echo "write a valid email";
                   $error['customerEmail'] =  "write a valid email";
        
            }
        }

        if(empty($_POST['workAddress'])){
       
            $error['workAddress'] = "workAddress required";
          
        }else{
            $workAddress = htmlspecialchars($_POST['workAddress']);
        }

        if(empty($_POST['residentialAddress'])){
       
            $error['residentialAddress'] = "residentialAddress required";
          
        }else{
            $residentialAddress = htmlspecialchars($_POST['residentialAddress']);
        }

        if(empty($_POST['loanAmount'])){
       
            $error['loanAmount'] = "loanAmount required";
          
        }else{
            $loanAmount = htmlspecialchars($_POST['loanAmount']);
        }

        if(empty($_POST['loanTime'])){
       
            $error['loanTime'] = "loanTimee required";
          
        }else{
            $loanTime = htmlspecialchars($_POST['loanTime']);
        }
        if(empty($_POST['loanType'])){
       
            $error['loanType'] = "loanType required";
          
        }else{
            $loanType = htmlspecialchars($_POST['loanType']);
        }

        if(empty($_POST['appliedDate'])){
       
            $error['appliedDate'] = "appliedDate required";
          
        }else{
            $appliedDate = htmlspecialchars($_POST['appliedDate']);
        }

        if(empty($_POST['customerContactPersonName'])){
       
            $error['customerContactPersonName'] = "customerContactPersonName required";
          
        }else{
            $customerContactPersonName = htmlspecialchars($_POST['customerContactPersonName']);
        }

        if(empty($_POST['customerContactPersonNumber'])){
       
            $error['customerContactPersonNumber'] = "customerContactPersonNumber required";
          
        }else{
            $customerContactPersonNumber = htmlspecialchars($_POST['customerContactPersonNumber']);
        }

        if(empty($_FILES['file']['name'])){
       
            $error['file'] = "File required";
          
        }else{
            $file = htmlspecialchars($_FILES['file']['name']);
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];
            $file_temp_loc = $_FILES['file']['tmp_name'];
            $file_store = "file/".$file;
            move_uploaded_file($file_temp_loc,$file_store);

        }

        if(empty($_POST['agentAssign'])){
       
            $error['agentAssignid'] = "agentAssign required";
          
        }else{
            $agentAssignid = htmlspecialchars($_POST['agentAssign']);
        }

        if(empty($_POST['employid'])){
       
            $error['employid'] = "First Name required";
          
        }else{
            $employid = htmlspecialchars($_POST['employid']);
        }

        if(array_filter($error)){
            echo "error coourd";
        }

        else{

      


            
            //update or insert


            $sql = "INSERT INTO `work_order` (`workOrderId`, `customerName`, `phoneNumber`, `email`, `jobAddress`, `residentialAddress`, 
            `loanAmount`, `loanTime`, `loanType`, `appliedDate`, `contactPersonName`, `contactPersonNumber`, `file`, `agentId`, `employId`)
                    VALUES ('$workOrderId', '$customerName', '$customerNumber', '$customerEmail', '$workAddress', '$residentialAddress',
                     '$loanAmount', '$loanTime','$loanType','$appliedDate','$customerContactPersonName','$customerContactPersonNumber','$file',
                     '$agentAssignid','$employid ') ";

            if (mysqli_query($conn,$sql)) {
                header('Location:adminhome.php?id='. $employid);
            
            }else{
            echo mysqli_errno($conn);
            }

            //end
           
            
        }




    }



    mysqli_close($conn);
?>