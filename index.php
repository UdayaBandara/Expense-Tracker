<?php require_once "db.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-md">
        <h2>Daily Expense Tracker</h2>
        <div class="row">
            <div class="col col-md-5">
                

                <form action="add_expense.php" method="post">
        <label class="form-label mt-4">Date: </label>
        <input type="date" class="form-control" name="expense_date" required>
        </br>

        <label>Category: </label>
        <!-- <input type="text" name="category" required> -->
        <select class="form-select" name="category">
            <option value="1">Traveling</option>
            <option value="2">Utility</option>
            <option value="3">Vegetables</option>
            <option value="4">Bike</option>
            <option value="5">HouseHold</option>
            <option value="6">Food</option>
            <option value="7">Meat/Milk Items</option>

        </select>
        </br>

        <label>Sub Category: </label>
        <!-- <input type="text" name="sub_category" required> -->
        <select class="form-select" name="sub_category">
            <optgroup label="Traveling">
                <option value="">Bus</option>
                <option value="">Taxi</option>
            </optgroup>
            <optgroup label="Utility">
               <option value="101">Parent - SLT Mega</option>
               <option value="102">Parent - CEB</option>
               <option value="103">Parent - NWSDB</option>
               <option value="104">Parent - Mobile Reload</option>
               <option value="105">Family - SLT 4G</option>
               <option value="106">Family - Mobile Reload</option>
            </optgroup>
            <optgroup label="Vegetables">
                <option value="151">Other Vegetables</option>
                <option value="152">Garlic</option>
                <option value="153">Red Onion</option>
                <option value="154">Potato</option>
                <option value="155">Big Onion</option>
            </optgroup>
            <optgroup label="Bike">
                <option value="">Service</option>
                <option value="">Fuel</option>
                <option value="">Air</option>
            </optgroup>
            <optgroup label="Food">
                <option value="">Bread</option>
                <option value="">Bakery Items</option>
                <option value="">Coconut</option>
                <option value="">Biscuit</option>
            </optgroup>
            <optgroup label="Meat/Milk Items">
                <option value="">Milk/Milk Powder</option>
                <option value="">Egg</option>
                <option value="">Fish/Meat</option>
            </optgroup>
        </select>

        <label class="form-label mt-4">Amount: </label>
        <div>
        <div class="input-group mb-3">
            <span class="input-group-text">Rs.</span>
                <input type="number" name="amount" step="0.01" required>
            <span class="input-group-text">.00</span>
        </div>

        <label class="form-label mt-4">Payment Method: </label>
        <select class="form-select"  name="payment_method">
            <option>Cash</option>
            <option>Card</option>
            <option>Online</option>
        </select>   

        <label class="form-label mt-4">Notes: </label>
        <textarea class="form-control" name="notes"></textarea>
        </br>

        <button type="submit" class="btn btn-lg btn-success">Add Expense</button>
                </form>

            </div>
        

            <div class="col col-md-1"></div>

            <div class="col col-md-6">
                <h3>Recent Expenses</h3>
                <table class="table table-hover">
                    <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Method</th>
                    <th scope="col">Notes</th>
                </tr>

                <?php
                    $stmt = $pdo->query("SELECT * FROM expenses ORDER BY expense_date DESC LIMIT 10");

                    if ($stmt->rowCount() == 0) {
                        echo "There are no records to display";
                    } else {
                        while ($row = $stmt->fetch()):
                ?>

                <tr>
                    <td><?= htmlspecialchars($row['expense_date']) ?></td>
                    <td><?= htmlspecialchars($row['category']) ?></td>
                    <td><?= htmlspecialchars($row['sub_category']) ?></td>
                    <td><?= htmlspecialchars($row['amount']) ?></td>
                    <td><?= htmlspecialchars($row['payment_method']) ?></td>
                    <td><?= htmlspecialchars($row['notes']) ?></td>
                </tr>

                <?php endwhile; ?>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>