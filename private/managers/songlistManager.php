<?php

class songlistManager
{

    //voeg "stem" toe tot songlist
    public static function addSongToList($song_id, $user_id)
    {
        global $con;

        $stmt = $con->prepare("INSERT INTO songlist (`song_id`,`user_id`) VALUES(?,?);");
        $stmt->bindValue(1, $song_id);
        $stmt->bindValue(2, $user_id);
        $stmt->execute();
    }

    //selecteer alle stemmen van een gebruiker
    public static function selectAllSongsByUser($user_id)
    {
        global $con;

        $stmt = $con->prepare("SELECT * FROM songlist WHERE user_id=?;");
        $stmt->bindValue(1, $user_id);
        $stmt->execute();

        return $stmt;
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

        return $stmt;
    }
}
