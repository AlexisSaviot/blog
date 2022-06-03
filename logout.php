<?php
session_start();
unset($_SESSION['userlogged']);

header('location:index.php');