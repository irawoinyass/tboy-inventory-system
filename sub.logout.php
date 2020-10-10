<?php
session_start();
if(isset($_SESSION['Sub_Admin'])){
session_destroy();
}
header("location: sub.login.php");



?>