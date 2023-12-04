<?php

class artist_bandManager
{
    //Voeg een artiest of band toe
    public static function addArtist_band($name)
    {
        global $con;

        $stmt = $con->prepare("INSERT INTO `artist_band` (`name`) VALUES(?);");
        $stmt->bindValue(1, $name);
        $stmt->execute();
    }


    //bewerk artiest/band
    public static function editArtist_band($name, $id)
    {
        global $con;

        $stmt = $con->prepare("UPDATE `artist_band` SET `name`=? WHERE id=?");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $id);
        $stmt->execute();
    }

    //haal artiest op
    public static function getAllArtist(){
        global $con;

        $stmt = $con->prepare("SELECT * FROM `artist_band` ORDER BY `name`");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //haal artiest op door id
    public static function getArtistById($id){
        global $con;

        $stmt = $con->prepare("SELECT * FROM `artist_band` WHERE id=?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

}
