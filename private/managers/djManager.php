<?php

class djManager
{

    //voeg een nieuwe dj toe
    public static function addDj($djname, $imgpath)
    {
        global $con;

        $stmt = $con->prepare("INSERT INTO djs (`name`,`imgpath`) VALUES(?,?);");
        $stmt->bindValue(1, $djname);
        $stmt->bindValue(2, $imgpath);
        $stmt->execute();
    }


    //bewerk de geselecteerde dj
    public static function editDj($id, $name, $imgpath)
    {
        global $con;

        $stmt = $con->prepare("UPDATE djs SET `name`=?, `imgpath`=? WHERE id=?");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $imgpath);
        $stmt->bindValue(3, $id);
        $stmt->execute();
    }


    //verwijder een dj
    public static function removeDj($id){
        global $con;

            $stmt = $con->prepare("DELETE FROM djs WHERE id=?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
    }

    public static function getAllDjs()
    {
        global $con;

        $stmt = $con->prepare("SELECT * FROM `djs`");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getDjById($id)
    {
        global $con;

        $stmt = $con->prepare("SELECT * FROM `djs` WHERE id=?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
