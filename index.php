<?php require_once "db.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daily Expense Tracker</h2>

    < action="add_expense.php" method="post">
        <label>Date: </label>
        <input type="date" name="expense_date" required>
        </br>

        <label>Category: </label>
        <input type="text" name="category" required>
        </br>

        <label>Amount: </label>
        <input type="number" name="amount" step="0.01" required>
        </br>

        <label>Payment Method: </label>
        <select name="payment_method">
            <option>Cash</option>
            <option>Card</option>
            <option>Online</option>
        </select>   
        </br>

        <label>Notes: </label>
        <textarea name="notes"></textarea>
        </br>

        <button type="submit">Add Expense</button>
    </form>

    <hr>

    <h3>Recent Expenses</h3>
    <table border="1">
        <tr>
            <th>Date</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Method</th>
            <th>Notes</th>
        </tr>

        <?php
            $stmt = $pdo->query("SELECT * FROM expenses ORDER BY expenses_date DESC LIMIT 10");

            while ($row = $stmt->fetch()):
        ?>

        <tr>
            <td><?= htmlspecialchars($row['expense_date']) ?></td>
            <td><?= htmlspecialchars($row['category']) ?></td>
            <td><?= htmlspecialchars($row['amount']) ?></td>
            <td><?= htmlspecialchars($row['payment_method']) ?></td>
            <td><?= htmlspecialchars($row['notes']) ?></td>
        </tr>

        <?php endwhile; ?>
    </table>
</body>
</html>