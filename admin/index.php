<?php
/*---To Hidden Navbar ---*/
$noNavbar="";
$pageTitle ="Login";
include "init.php";
if(isset($_SESSION['username'])){
  header('Location:dashboard/dashboard.php');
}
?>
<?php
/*---Check If User Comming From HTTP Post Request ---*/
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username=$_POST['user'];
  $userpass=$_POST['pass'];
  $hashepass=sha1($userpass);

  $check_user = "SELECT id,username,password FROM users WHERE username = :username AND password =:password And activity = 1 LIMIT 1 ";
  $stmt = $con->prepare($check_user);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $hashepass);
  $stmt->execute();
  $count = $stmt->rowCount();
  $data = $stmt->fetch();

/*---Check If The User Comming Is Exist In Database ---*/
if ($count == 1){
$_SESSION['username'] = $username;
$_SESSION['id'] = $check_user['id'];
header('Location:dashboard/dashboard.php');
exit();
}
}
?>
<div class="login-page">
<form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<h3 class="text-center">تسجيل الدخول </h3>
<input class="form-control input-lg" name="user" type="text" placeholder="اسم المستخدم " autocomplete="off"  />
<input class="form-control input-lg" name="pass" type="password" placeholder="كلمة المرور " autocomplete="off"  />
<input class="start-btn orangered" type="submit" value="<?php echo lang('LOGON') ?>" name="submit" />
</form>
</div>
