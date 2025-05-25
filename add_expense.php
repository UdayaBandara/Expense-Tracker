<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO expenses (expense_date, category, amount, payment_method, notes) VALUES (?,?,?,?,?)");

    $stmt->execute([
        $_POST['expense_date'],
        $_POST['category'],
        $_POST['amount'],
        $_POST['payment_method'],
        $_POST['notes']
    ]);
    header("Location: index.php?msg=Expense+add");
}
?>