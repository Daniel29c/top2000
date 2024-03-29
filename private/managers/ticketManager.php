<?php

class ticketManager
{

    //maak een nieuwe ticket aan
    public static function addTicket($email, $gender, $verify, $program_id)
    {
        global $con;

        $stmt = $con->prepare("INSERT INTO ticket (`email`,`gender`,`verify`,`program_id`) VALUES(?,?,?,?);");
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $gender);
        $stmt->bindValue(3, $verify);
        $stmt->bindValue(4, $program_id);
        $stmt->execute();
    }

    public static function getTicketById($id)
    {
        global $con;

        $stmt = $con->prepare("SELECT tickets.*, program.starttime, program.endtime FROM tickets LEFT JOIN program on tickets.program_id = program.id WHERE tickets.id=?");
        $stmt->bindValue(1, htmlspecialchars($id));
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public static function getAllTickets()
    {
        global $con;

        $stmt = $con->prepare("SELECT * FROM top2000_1.tickets JOIN program ON program.id = tickets.program_id");
        $stmt->execute();

        return $stmt->fetchObject();
    }
}
