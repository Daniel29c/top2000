<?php

class songManager
{

    //voeg een lied toe tot de lijst met alle nummers (dus niet tot de top2000)
    public static function addSong($songname, $artist_band_id)
    {
        global $con;

        $stmt = $con->prepare("INSERT INTO song (`name`,`artist_band_id`) VALUES(?,?);");
        $stmt->bindValue(1, $songname);
        $stmt->bindValue(2, $artist_band_id);
        $stmt->execute();
    }


    //bewerk het geselecteerde liedje
    public static function editSong($songId, $songname, $artist_band_id)
    {
        global $con;

        $stmt = $con->prepare("UPDATE song SET `name`=?, `artist_band_id`=? WHERE id=?");
        $stmt->bindValue(1, $songname);
        $stmt->bindValue(2, $artist_band_id);
        $stmt->bindValue(3, $songId);
        $stmt->execute();
    }

    //haal nummer op en join de artiest naam 
    public static function getAllSongs()
    {
        global $con;

        $stmt = $con->prepare("SELECT song.*, artist_band.name AS artist_band_name
        FROM song
        JOIN artist_band ON song.artist_band_id = artist_band.id;");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //haal nummer op door id
    public static function getSongById($id)
    {
        global $con;

        $stmt = $con->prepare("SELECT * FROM `song` WHERE id=?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
