<?php

    class songManager{

        //voeg een lied toe tot de lijst met alle nummers (dus niet tot de top2000)
        public static function addSong($songname, $artist_band_id){
            global $con;

            $stmt = $con->prepare("INSERT INTO song (`name`,`artist/band_id`) VALUES(?,?);");
            $stmt->bindValue(1, $songname);
            $stmt->bindValue(2, $artist_band_id);
            $stmt->execute();
        }


        //bewerk het geselecteerde liedje
        public static function editSong($songId, $songname, $artist_band_id){
            global $con;

            $stmt = $con->prepare("UPDATE song SET `name`=?, `artist/band_id`=? WHERE id=?");
            $stmt->bindValue(1, $songname);
            $stmt->bindValue(2, $artist_band_id);
            $stmt->bindValue(3, $songId);
            $stmt->execute();
        }
    }

?>