<?php
include('session.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

  $fname = mysqli_real_escape_string($db,$_POST['fname']);
  $lname = mysqli_real_escape_string($db,$_POST['lname']);
  $nic = mysqli_real_escape_string($db,$_POST['nic']);
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $uname = mysqli_real_escape_string($db,$_POST['uname']);
  $pwd = mysqli_real_escape_string($db,$_POST['password']); 

  $sql = "INSERT INTO user(firstname, lastname, nic, email, username, password) VALUES('$fname', '$lname', '$nic', '$email', '$uname', '$pwd')";

  if($db->query($sql) == TRUE){
    echo "<script type='text/javascript'>alert('User registered successfully!');
    window.location='add.php';
    </script>";
  }else{
   $error =  "Error: " .$sql . "<br>".$db->error;
 }
}
?>
<html>
<head>
  <title>Add User</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/registration.css" rel="stylesheet" type="text/css">
</head>
<body>
  <header>

    <div class="logo">
     <img src="images/3.png">
     <ul class="nav">
      <li class="active"><a href="admin.php">Home</a></li>
      <li><a href="add.php">Add User</a></li>
      <li><a href="delete.php">Delete User</a></li>
      <li><a href="update.php">Update User</a></li>
      <li><a href="view.php">View all users</a></li>
      <li><a href="requests.php">Job Requests</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
  </div>
</header>



<div class="container">
  <!-- Error message -->
  <div ><label class="errorMsg"><?php if(!empty($error)){echo $error;} ?></label></div>


  <form action="" name="RegisterForm" onSubmit="return checkForm()" method="post">
    <label ><font align="center" >Registration Form</font></label><br/><br/>

    <label for="fname"> First Name</label>
    <input type="text" id="fname" name="fname" placeholder="Your First name.." maxlength="20" required>

    <label for="lname"> Last Name</label>
    <input type="text" id="lname" name="lname" placeholder="Your Last name.." maxlength="20" required>

    <label for="nic"> NIC</label>
    <input type="text" id="nic" name="nic" placeholder="Your NIC.." maxlength="10" required>

    <label for="email">Email Address</label>
    <input type="text" id="email" name="email" placeholder="Your email address.." maxlength="30" required>

    <label for="uname"> User Name</label>
    <input type="text" id="uname" name="uname" placeholder="Your User name.." maxlength="25" required>

    <label for="password"> Password</label>
    <input type="password" id="password" name="password" placeholder="Your First name.." maxlength="25" required>
    <br>
    <br>
    <input type="submit" value="Submit">

    <input type="reset" value="Reset">
  </form>
</div>
</div>
</body>
</html>