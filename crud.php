<?php
require 'db.php';

if (isset($_POST['add'])) {
    $stmt = $db->prepare("INSERT INTO debts (name, amount, status) VALUES (?, ?, 'Belum Lunas')");
    $stmt->execute([$_POST['name'], $_POST['amount']]);
    header('Location: index.php');
    exit();
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $stmt = $db->prepare("UPDATE debts SET name = ?, amount = ?, status = ? WHERE id = ?");
    $stmt->execute([$name, $amount, $status, $id]);
    header("Location: index.php");
    exit();
}


if (isset($_POST['delete'])) {
    $stmt = $db->prepare("DELETE FROM debts WHERE id = ?");
    $stmt->execute([$_POST['id']]);
    header('Location: index.php');
    exit();
}
