<?php
declare(strict_types=1);

/* 
   Ang ProbinSiomai
   Name: Clark Lawrence N. Manguera
   Section: WD - 203
*/

// ARRAY PRODUCTS
$probinSiomai = [
    "Beef Siomai" => ["price" => 25.00, "stock" => 8],
    "Pork Siomai" => ["price" => 25.00, "stock" => 15],
    "Chicken Siomai" => ["price" => 30.00, "stock" => 5],
    "Japanese Siomai" => ["price" => 35.00, "stock" => 20],
    "Shanghai Siomai" => ["price" => 28.00, "stock" => 3],
];

// GLOBAL TAX RATE
$tax_rate = 12;

// REORDER MESSAGE
function get_reorder_message(int $stock): string {
    return ($stock < 10) ? "Yes" : "No";
}

// TOTAL VALUE
function get_total_value(float $price, int $qty): float {
    return $price * $qty;
}

// TAX DUE
function get_tax_due(float $price, int $qty, int $tax_rate = 0): float {
    $total = $price * $qty;
    return $total * ($tax_rate / 100);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Stock Monitoring | Ang ProbinSiomai</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php include 'includes/header.php'; ?>

<h2>Stock Monitoring Table</h2>

<table>
    <tr>
        <th>Product</th>
        <th>Price (₱)</th>
        <th>Stock</th>
        <th>Reorder?</th>
        <th>Total Value (₱)</th>
        <th>Tax Due (₱)</th>
    </tr>

    <?php foreach ($probinSiomai as $prod_name => $data) { ?>
        <tr>
            <td><?= $prod_name ?></td>
            <td><?= number_format($data["price"], 2) ?></td>
            <td><?= $data["stock"] ?></td>

            <td><?= get_reorder_message($data["stock"]) ?></td>

            <td><?= number_format(get_total_value($data["price"], $data["stock"]), 2) ?></td>

            <td><?= number_format(
                    get_tax_due($data["price"], $data["stock"], $tax_rate),
                    2
                ) 
            ?></td>
        </tr>
    <?php } ?>
</table>

<?php include 'includes/footer.php'; ?>

</body>
</html>
