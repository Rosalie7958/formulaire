<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM info WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
}
?>