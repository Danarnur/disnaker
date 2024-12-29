<?php
session_start();
unset($_SESSION['nama']);
unset($_SESSION['role']);
header("location: index.php");
