<?php
    declare(strict_types = 1);
    $book = [
        'The Joy Luck Club'   => ['author' => 'Amy Tan', 'price' => 13.00, 'stock' => 1],
        'Pride and Predudice' => ['author' => 'Jane Austin', 'price' => 12.00, 'stock' => 6],
        'American Psycho'     => ['author' => 'Bret Easton Elis', 'price' => 20.00, 'stock' => 8],
        'The Federalist'      => ['author' => 'Alexander Hamilton', 'price' => 14.00, 'stock' => 2],
        'Scythe'              => ['author' => 'Neil Shusterman', 'price' => 16.00, 'stock' => 1],
        'Fahrenheit 451'      => ['author' => 'Ray Bradbury', 'price' => 10.00, 'stock' => 7],
    ];
    $tax = 5;

    function get_reorder_message(int $stock): string {
        return ($stock < 3) ? 'Yes' : 'No';
    }

    function get_total_value(float $price, int $quantity): float {
        return $price * $quantity;
    }

    function get_tax_due(float $price, int $quantity, int $tax = 0): float {
        return ($price * $quantity) * ($tax / 100);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Store</title>
    </head>
    <body>
        <h1>Book Store</h1>
        <h2>Stock Control</h2>
        <table>
            <tr>
                <th>Title</th><th>Author</th><th>Stock</th><th>Re-order</th><th>Total value</th><th>Tax due</th>
            </tr>
            <?php foreach ($book as $product_name => $data) { ?>
                <tr>
                    <td><?= $product_name ?></td>
                    <td><?= $data['author'] ?></td>
                    <td><?= $data['stock'] ?></td>
                    <td><?= get_reorder_message($data['stock']) ?></td>
                    <td>$<?= get_total_value($data['price'], $data['stock']) ?></td>
                    <td>$<?= get_tax_due($data['price'], $data['stock'], $tax) ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
