<?php
session_start();

unset($_SESSION['user']);

header("Location: login.php?message=You have been logged out");
exit();