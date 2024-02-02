<?php

class songlistManager
{

    //voeg "stem" toe tot songlist
    public static function addSongToList($song_id, $user_id, $position, $motivatie)
    {
        global $con;

        $stmt = $con->prepare("INSERT INTO songlist (`song_id`,`user_id` ,`positie`,`keuzen_motivatie`) VALUES(?,?,?,?);");
        $stmt->bindValue(1, $song_id);
        $stmt->bindValue(2, $user_id);
        $stmt->bindValue(3, $position);
        $stmt->bindValue(4, $motivatie);
        $stmt->execute();
    }

    //selecteer alle stemmen van een gebruiker
    public static function selectAllSongsByUser($user_id)
    {
        global $con;

        $stmt = $con->prepare("SELECT * FROM songlist WHERE user_id=?;");
        $stmt->bindValue(1, $user_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //tel de stemmen bij elkaar
    public static function countVotes()
    {
        global $con;

        $stmt = $con->prepare("SELECT song_id, COUNT(*) AS song_count
            FROM songlist
            GROUP BY song_id
            ORDER BY song_count DESC;");
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    //selecteer stemmers en join user.name op de songlist tabel
    public static function getUsers()
    {
        global $con;

        $stmt = $con->prepare("SELECT DISTINCT songlist.user_id, user.username AS songlist_user
        FROM songlist
        JOIN user ON songlist.user_id = user.id;");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    //haal user op met zijn stemlijst
    public static function getUserById($id)
    {
        global $con;

        $stmt = $con->prepare("SELECT songlist.*, song.name AS song_name
        FROM songlist
        JOIN song ON songlist.song_id = song.id
        WHERE songlist.user_id = ?
        ORDER BY songlist.positie;");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
