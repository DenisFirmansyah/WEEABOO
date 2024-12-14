<?php
require 'functions.php';
session_destroy();
header("Location: ../dashboard.php");
exit;
?>