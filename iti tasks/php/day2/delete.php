<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null && isset($_SESSION['users'][$id])) {
    $deletedName = $_SESSION['users'][$id]['name'];
///
    unset($_SESSION['users'][$id]);

    $_SESSION['users'] = array_values($_SESSION['users']);

    header("Location: index.php?message=" . urlencode("Deleted $deletedName successfully"));
    exit();
} else {
    header("Location: index.php?message=" . urlencode("User not found"));
    exit();
}