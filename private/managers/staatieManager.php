<?php

class StaatieManager
{
    public function getAll()
    {
        global $con;

        $stmt = $con->prepare("SELECT * FROM song");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function selectSongById($id)
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM song WHERE id=?");
        $stmt->bindValue(1, $id);
    }
    public static function searchSong($name, $artist)
    {
        global $con;

        $stmt = $con->prepare("SELECT song.*, artist_band.name AS artist_name
            FROM song 
            LEFT JOIN artist_band ON song.artist_band_id = artist_band.id 
            WHERE song.name LIKE ? OR artist_band.name LIKE ?;"
            );
        $stmt->bindValue(1, htmlspecialchars($name));
        $stmt->bindValue(2, htmlspecialchars($artist));
        $stmt->execute();

        $song = $stmt->fetch(PDO::FETCH_OBJ);

        if ($stmt->rowCount() > 0) {
            return $song->id;
        }
    }
}
