<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['users'])){
 header('location:index.php');
}
//Restrict other user to access pl page
if($_SESSION['users']['role']=='admin'){
 header('location:admin.php');
}
if($_SESSION['users']['role']=='user'){
 header('location:user.php');
}
?>
<h1>Wellcome to <?php echo $_SESSION['users']['username'];?> Page</h1>
 
 
<link rel="stylesheet" href="style.css" type="text/css"/>
<div id="profile">
<h2>User name is: <?php echo $_SESSION['users']['username'];?> and Your Role is :<?php echo $_SESSION['users']['role'];?></h2>
<div id="logout"><a href="logout.php">Logout</a></div>
</div>