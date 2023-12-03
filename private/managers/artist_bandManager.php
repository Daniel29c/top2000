<?php

class artist_bandManager
{
    //Voeg een artiest of band toe
    public static function addArtist_band($name)
    {
        global $con;

        $stmt = $con->prepare("INSERT INTO `artist/band` (`name`) VALUES(?);");
        $stmt->bindValue(1, $name);
        $stmt->execute();
    }


    //bewerk artiest/band
    public static function editArtist_band($name, $id)
    {
        global $con;

        $stmt = $con->prepare("UPDATE `artist/band` SET `name`=? WHERE id=?");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $id);
        $stmt->execute();
    }
}
