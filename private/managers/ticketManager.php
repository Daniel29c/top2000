<?php

    class ticketManager{
        
        //maak een nieuwe ticket aan
        public static function addTicket($email, $gender, $verify, $program_id){
            global $con;

            $stmt = $con->prepare("INSERT INTO ticket (`email`,`gender`,`verify`,`program_id`) VALUES(?,?,?,?);");
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $gender);
            $stmt->bindValue(3, $verify);
            $stmt->bindValue(4, $program_id);
            $stmt->execute();
        }


    }

?>