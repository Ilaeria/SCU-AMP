<!--Session.php will verify the session, if there is no session it will redirect to login page.-->

<?php
   include('db_connect.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connection,"SELECT AuthorID from AUTHOR where email = '$email'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>