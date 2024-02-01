<?php

require_once("../private/config.php");

//uncomment om heel 2024 te vullen met djs
// djInsert();


function djInsert() {
    global $con;

    $currentYear = date('Y');
    $startTime = "2024-01-01 00:00:00";
    $endTime = date('Y-m-d H:i:s', strtotime($startTime . ' + 2 hours'));

    while (date('Y', strtotime($endTime)) <= 2024) {
        $djId = rand(1, 18);

        $stmt = $con->prepare("INSERT INTO program (djs_id, starttime, endtime) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $djId);
        $stmt->bindValue(2, $startTime);
        $stmt->bindValue(3, $endTime);
        $stmt->execute();

        // Update start time and end time for the next iteration
        $startTime = $endTime;
        $endTime = date('Y-m-d H:i:s', strtotime($endTime . ' + 2 hours'));
    }

    echo "done";
}


?>