<?php
session_start();
$_SESSION['user'] = null;
unset($_SESSION['user']);
session_reset();
session_destroy();
header('Location: login.php');
