<?php
// Example data (You can replace this with database fetch code)
$buyer = [
    'name' => 'John Doe',
    'address' => '123 Street, City, Country',
    'contact' => '9876543210',
    'email' => 'john@example.com'
];

$products = [
    ['name' => 'Laptop', 'quantity' => 1, 'unit_price' => 70000],
    ['name' => 'Mouse', 'quantity' => 2, 'unit_price' => 500],
    ['name' => 'Keyboard', 'quantity' => 1, 'unit_price' => 1200]
];

$transaction = [
    'id' => 'TXN123456',
    'date' => date('Y-m-d'),
    'payment_method' => 'UPI'
];

// Calculate totals
$subtotal = 0;
foreach ($products as $product) {
    $subtotal += $product['quantity'] * $product['unit_price'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .bill-header, .bill-footer { text-align: center; }
        .bill-header h1 { margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: center; }
        .summary { text-align: right; margin-top: 20px; }
        .buttons { margin-top: 30px; text-align: center; }
        button { padding: 10px 20px; margin: 5px; }
    </style>
</head>
<body>

<div class="bill-header">
    <h1>My Company</h1>
    <p>Address: 456 Business Park, City, Country</p>
    <p>Email: contact@company.com | Phone: 1234567890</p>
    <hr>
</div>

<!-- Buyer Details -->
<h2>Buyer Details:</h2>
<p><strong>Name:</strong> <?php echo $buyer['name']; ?></p>
<p><strong>Address:</strong> <?php echo $buyer['address']; ?></p>
<p><strong>Contact:</strong> <?php echo $buyer['contact']; ?></p>
<p><strong>Email:</strong> <?php echo $buyer['email']; ?></p>

<!-- Product Details -->
<h2>Product Details:</h2>
<table>
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Unit Price (₹)</th>
        <th>Total Price (₹)</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['quantity']; ?></td>
        <td><?php echo number_format($product['unit_price'], 2); ?></td>
        <td><?php echo number_format($product['quantity'] * $product['unit_price'], 2); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- Summary Section -->
<div class="summary">
    <h3>Subtotal: ₹<?php echo number_format($subtotal, 2); ?></h3>
    <h2>Total Amount Due: ₹<?php echo number_format($subtotal, 2); ?></h2>
</div>

<!-- Transaction Details -->
<h2>Transaction Details:</h2>
<p><strong>Transaction ID:</strong> <?php echo $transaction['id']; ?></p>
<p><strong>Purchase Date:</strong> <?php echo $transaction['date']; ?></p>
<p><strong>Payment Method:</strong> <?php echo $transaction['payment_method']; ?></p>

<div class="bill-footer">
    <hr>
    <p>Thank you for your purchase!</p>
</div>

<!-- Buttons for Print and Download -->
<div class="buttons">
    <button onclick="window.print()">Print Bill</button>
</div>

</body>
</html>
