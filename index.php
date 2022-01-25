
<?php 
include('connection/databaseConnatcion.php');
$error =['id' => ''];

    // $sql1 = "SELECT firstName,lastName,employId FROM employ_information " ;
    $sql1 = "SELECT * FROM employ_information WHERE category = 'agent'" ;
    $result1 = mysqli_query($conn,$sql1) or die( mysqli_error($conn));
    $employinfo1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
    // $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // print_r($employinfo1['firstName']);
    foreach($employinfo1 as $itam){
        print_r($itam['firstName'] );
    }

    if(isset($_POST['submit'])){
        if(empty($_POST['id'])){
           
            $error['id'] = "Invalid emply ID required";
          
        }else{
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            // echo  $employId ;
            // print_r($employId );
        }

        if (array_filter($error)) {
            echo "error occurd";
        }else{

            $sql2 = "INSERT INTO `fortest` (`empid`) VALUES ('$id')";
            $result2 = mysqli_query($conn,$sql2) or die( mysqli_error($conn));
            

        }
    }

  

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<?php include('template/header.php') ?>

  
<h4  class="  blue lighten-2 white-text center new"> hello</h4>
        <?php foreach($employinfo1 as $itam){ ?>
                <h1><?php echo $itam['firstName']; ?></h1>
                <h2><?php echo $itam['employId']; ?></h2>
        <?php } ?>


        <form action="index.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $employinfo1['employId']; ?>">
                <input type="submit" value="submit" name="submit">
        </form>
     
        <?php
        if(isset($_POST['submit'])){
           
            $name = $_POST['Name'];
            $email = $_POST['Email'];
            $password = $_POST['Password'];
            $number = $_POST['contactNumber'];
            $gender = $_POST['Gender'];

        }

        ?>

          <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title></title>
          </head>
          <body>
          <h1>Stamford University Bangladesh</h1>
                <h3>Student sign up form</h3>
                    <form action="index.php" method="POST">
                        <label for="Name">Name</label>
                        <input type="text" name="Name" id="Name" required>
                        <label for="Email">Email</label>
                        <input type="email" name="Email" id="Email" required>
                        <label for="confirmEmai">Confirm Email</label>
                        <input type="email" name="confirmEmai" id="confirmEmai" required>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword" id="confirmPassword" required>
                        <label for="contactNumber">Contact Number</label>
                        <input type="number" name="contactNumber" id="contactNumber" required> <br>


                        
                         <span> Gender : </span> 
                         <input type="radio" id="female" name="Gender" value="female">
                         <label for="female">Female</label><br>
                         <input type="radio" id="male" name="Gender" value="male">
                         <label for="male">Male</label><br>
                         <input type="radio" id="other" name="Gender" value="other">
                         <label for="other">Other</label>

                         <div>
                             <input type="submit" value="Submit">
                         </div>
                    

                    </form>
    

                  <p>Name is: <?php echo $name ; ?></p> <br>
                  <p>Email is: <?php echo  $email ; ?></p> <br>
                  <p>Password is: <?php echo  $password ; ?></p> <br>
                  <p>Contact Number is: <?php echo  $number ; ?></p> <br>
                  <p>Gender is: <?php echo  $gender ; ?></p> <br>

          </body>
          </html>

     
<?php include('template/fotter.php') ?>
</html>