<?php

class programManager
{

    public static function addProgram($djId, $starttime, $endtime)
    {
        global $con;

        $stmt = $con->prepare("INSERT INTO program(`djs_id`,`starttime`,`endtime`) VALUES(?,?,?);");
        $stmt->bindValue(1, $djId);
        $stmt->bindValue(2, $starttime);
        $stmt->bindValue(3, $endtime);
        $stmt->execute();
    }


    public static function editProgram($djId, $starttime, $endtime, $id)
    {
        global $con;

        $stmt = $con->prepare("UPDATE program SET `djs_id`=? ,`starttime`=? ,`endtime`=? WHERE id=?");
        $stmt->bindValue(1, $djId);
        $stmt->bindValue(2, $starttime);
        $stmt->bindValue(3, $endtime);
        $stmt->bindValue(4, $id);
        $stmt->execute();
    }

    public static function removeProgram($id)
    {
        global $con;

        $stmt = $con->prepare("DELETE FROM program WHERE id=?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public static function getProgram()
    {
        global $con;

        $stmt = $con->prepare("SELECT program.*, djs.name
        FROM program
        JOIN djs ON program.djs_id = djs.id;");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getProgramById($id)
    {
        global $con;

        $stmt = $con->prepare("SELECT program.*, djs.name
        FROM program
        JOIN djs ON program.djs_id = djs.id WHERE program.id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function getProgramByDate($startcheck, $endcheck)
    {
        global $con;

        $stmt = $con->prepare("SELECT program.*, djs.name AS dj_name, djs.imgpath AS dj_imgpath
        FROM program
        JOIN djs ON program.djs_id = djs.id
        WHERE program.starttime >= ? AND program.endtime < ?
        ORDER BY program.starttime;");
        $stmt->bindValue(1, $startcheck . ' 00:00:00');
        $stmt->bindValue(2, $endcheck . ' 00:00:00');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getTimeSlots()
    {
        global $con;

        $stmt = $con->prepare("SELECT program.starttime, program.endtime FROM program");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
