<?php
session_start();
if(isset($_SESSION['Admin'])){
session_destroy();
}
header("location: admin.login.php");



?>