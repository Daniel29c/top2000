<?php
    class CafeManager{

        public static function createTicket($firstname, $lastname, $email, $gender, $time){
            global $con;

            $stmt = $con->prepare("INSERT INTO tickets (firstname, lastname, email, gender, time_slot) VALUES (?,?,?,?,?)");
            $stmt->bindValue(1, htmlspecialchars($firstname));
            $stmt->bindValue(2, htmlspecialchars($lastname));
            $stmt->bindValue(3, htmlspecialchars($email));
            $stmt->bindValue(4, htmlspecialchars($gender));
            $stmt->bindValue(5, htmlspecialchars($time));
            $stmt->execute();

            header("location: cafe.php");
        }
        public static function getTicketById($id){
            global $con;

            $stmt = $con->prepare("SELECT * FROM");
        }
    }
?>