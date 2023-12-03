<?php

class programManager
{

    public static function addProgram($djId, $starttime, $endtime)
    {
        global $con;

        $stmt = $con->prepare("INSERT INTO program(`dj_id`,`starttime`,`endtime`) VALUES(?,?,?);");
        $stmt->bindValue(1, $djId);
        $stmt->bindValue(2, $starttime);
        $stmt->bindValue(3, $endtime);
        $stmt->execute();
    }


    public static function editProgram($djId, $starttime, $endtime, $id)
    {
        global $con;

        $stmt = $con->prepare("UPDATE program SET `dj_id`=? ,`starttime`=? ,`endtime`=? WHERE id=?");
        $stmt->bindValue(1, $djId);
        $stmt->bindValue(2, $starttime);
        $stmt->bindValue(3, $endtime);
        $stmt->bindValue(5, $id);
        $stmt->execute();
    }

    public static function removeProgram($id)
    {
        global $con;

        $stmt = $con->prepare("DELETE FROM program WHERE id=?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
