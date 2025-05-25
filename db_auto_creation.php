<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO("mysql:host$host", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection Failed: " . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Creation</title>
</head>
<body>
    <h1>Creating &quot;expense-tracker&quot; database in MySQL</h1>

    <?php
        try {
            echo "Successfully connect to MyQSL. Host info: " . $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "</br>";

            // create database
            $pdo->exec("CREATE DATABASE IF NOT EXISTS expense_tracker");
            echo "Database created successfully</br>";

            // select the database
            $pdo->exec("USE expense_tracker");

            // create expenses table
            $sqlExpenses = "CREATE TABLE IF NOT EXISTS expenses (
                id INT AUTO_INCREMENT PRIMARY KEY,
                expense_date DATE NOT NULL,
                category VARCHAR(50),
                amount DECIMAL(10,2),
                payment_method VARCHAR(30),
                notes TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                user INT NOT NULL default -1
            )";

            $pdo->exec($sqlExpenses);
            echo "expenses table created successfully</br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "</br";
        }

        $pdo= null;
    ?>
</body>
</html>