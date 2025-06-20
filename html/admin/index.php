<?php
if (!isset($_COOKIE['admin_authenticated']) || $_COOKIE['admin_authenticated'] !== 'true') {
    header('Location: login.php');
    exit;
}
if (isset($_COOKIE['admin_authenticated']) && $_COOKIE['admin_authenticated'] === 'true') {
    header('Location: panel.php');
    exit;
}
?>