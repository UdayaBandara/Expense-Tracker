<?php require_once "db.php" ?>

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
    <div class="container-md my-5">
        <h2 class="text-center mb-4">Daily Expense Tracker</h2>
        <div class="row">
            <!-- Left Column: Form -->
            <div class="col-md-5">
                <div class="card shadow p-4 rounded">
                    <form action="add_expense.php" method="post">
                        <label class="form-label">Date: </label>
                        <input type="date" class="form-control mb-3" name="expense_date" required>
                        </br>

                        <label class="form-label">Category: </label>
                        <select class="form-select mb-3" name="category">
                            <option value="1">Traveling</option>
                            <option value="2">Utility</option>
                            <option value="3">Vegetables</option>
                            <option value="4">Bike</option>
                            <option value="5">HouseHold</option>
                            <option value="6">Food</option>
                            <option value="7">Meat/Milk Items</option>
                        </select>
                        </br>

                        <label class="form-label">Sub Category: </label>
                        <select class="form-select mb-3" name="sub_category">
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

                        <label class="form-label">Amount: </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rs.</span>
                            <input type="number" class="form-control" name="amount" step="0.01" required>
                            <span class="input-group-text">.00</span>
                        </div>

                        <label class="form-label">Payment Method: </label>
                        <select class="form-select mb-3" name="payment_method">
                            <option>Cash</option>
                            <option>Card</option>
                            <option>Online</option>
                        </select>

                        <label class="form-label">Notes: </label>
                        <textarea class="form-control mb-3" name="notes"></textarea>
                        </br>
                        <button type="submit" class="btn btn-success w-100">Add Expense</button>
                    </form>
                </div>
            </div>

            <!-- Spacer -->
            <div class="col-md-1"></div>

            <!-- Right Column: Table -->
            <div class="col-md-6">
                <div class="card shadow p-3 rounded">
                    <h4 class="mb-3">Recent Expenses</h4>
                    <table class="table table-sm table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub Category</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Method</th>
                                <th scope="col">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>