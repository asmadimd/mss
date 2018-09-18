<?php
session_start();
include 'db.php';
//Getting Input value
if(isset($_POST['login'])){
  $username=mysqli_real_escape_string($con,$_POST['username']);
  $password=mysqli_real_escape_string($con,$_POST['password']);
  if(empty($username)&&empty($password)){
  $error= 'Please enter username and password';
  }else{
 //Checking Login Detail
 $result=mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password'");
 $row=mysqli_fetch_assoc($result);
 $count=mysqli_num_rows($result);
 if($count==1){
      $_SESSION['users']=array(
   'username'=>$row['username'],
   'password'=>$row['password'],
   'role'=>$row['role']
   );
   $role=$_SESSION['users']['role'];
   //Redirecting User Based on Role
    switch($role){
  case 'user':
  header('location:user.php');
  break;
  case 'admin':
  header('location:admin.php');
  break;
  case 'pl':
  header('location:pl.php');
  break;
 }
 }else{
 $error='Please enter a valid username or password';
 }
}
}
?>
<html>
<head>
<title>Welcome to Meeting Scheduler System</title>
</head>
<div align="center">
<h3>Welcome to Meeting Scheduler System</h3>
<h4>Login</h4>
<form method="POST" action="">
<table>
   <tr>
     <td>Enter username:</td>
  <td><input type="text" name="username"/></td>
   </tr>
   <tr>
     <td>Enter password:</td>
  <td><input name="password" type="password"/></td>
   </tr>
   <tr>
     <td></td>
  <td><input type="submit" name="login" value="Login"/></td>
   </tr>
</table>
</form>
<?php if(isset($error)){ echo $error; }?>
</div>
</html>