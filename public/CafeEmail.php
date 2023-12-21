<?php

// $customer_games = games::get($_GET['id']);
// $customer = customers::get($_GET['id']);

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ratjetoe - Customers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        h3 {
            font-size: 18px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Beste ' . ucfirst($customer['firstname']) . ' ' . $customer['lastname'] . '</h1>
    <h3>Dit is een test!</h3>
    <table>
        <thead>
            <tr>
                <th>Test</th>
                <th>Test</th>
            </tr>
        </thead>
        <tbody>';

        //<td>" . $customer_game['name'] . "</td> 
        // <td>" . $customer_game['platform'] . "</td>
// Add game data to HTML content
foreach ($customer_games as $customer_game) {
    $htmlContent .= "
    <tr>
    <td>test</td>
    <td>testssssssssssssssss</td>
    </tr>
    ";
}

$htmlContent .= '
        </tbody>
    </table>
</div>
</body>
</html>';

//email::send($_GET['id'], $htmlContent);

header('location: customer');