<?php

session_start();
unset($_SESSION['connex']);
header('location: index.php');
