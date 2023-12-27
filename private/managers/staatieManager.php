<?php

    class StaatieManager{
        public function getAll(){
            global $con;

            $stmt = $con->prepare("SELECT * FROM song");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function selectSongById($id){
            global $con;
            $stmt = $con->prepare("SELECT * FROM song WHERE id=?");
            $stmt->bindValue(1 ,$id);
            
        }
        public static function searchSong($name, $artist){
            global $con;

            $stmt = $con->prepare("SELECT * FROM song WHERE name = ? OR artist_band_id = ?");
            $stmt->bindValue(1, htmlspecialchars($name));
            $stmt->bindValue(2, htmlspecialchars($artist));
            $stmt->execute();
            
            $song = $stmt->fetch(PDO::FETCH_OBJ);

            if ($song->num_rows > 0) {
                $result = "ja";
            } else {
                $result = "nee";
            }
            // return $stmt->fetch(PDO::FETCH_OBJ);
            var_dump("test");
            header("location: staatie_uitslag.php?result=$result");  


        }
    }

?>