<?php
require_once "../private/autoloader.php";
//$customer_games = games::get($_GET['id']);
//$customer = customers::get($_GET['id']);

$tickets = ticketManager::getTicketById($_GET["id"]);
$ti = ticketManager::getAllTickets();
// var_dump($tickets);
// var_dump($ti);
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket top2000</title>
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
    <h1>Beste ' . ucfirst($tickets->firstname) . ' ' . $tickets->lastname .  '</h1>
    <h3>Dit is de tijd wanneer je wordt verwacht in het cafe. Laat deze email zien aan het personeel bij de ingang.</h3>
    <table>
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Tijdslot</th>
            </tr>
        </thead>
        <tbody>';

//<td>" . $customer_game['name'] . "</td> 
// <td>" . $customer_game['platform'] . "</td>
// Add game data to HTML content

$html .= "
    <tr>
    <td>$tickets->firstname</td>
    <td>$tickets->lastname</td>
    <td>$tickets->starttime, $tickets->endtime</td>
    </tr>
    ";

$html .= "
        </tbody>
    </table>
</div>
<img src='https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=$tickets->id .'>
</body>
</html>";

// var_dump($html);
EmailManager::send($_GET['id'], $html);

header('location: index.php');
