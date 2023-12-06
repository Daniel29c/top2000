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
        public function searchSong(){
            global $con;

            $stmt = $con->prepare("SELECT * FROM song WHERE name LIKE %SearchTerm% OR artist_band_id LIKE %SearchTerm%");
            $stmt->execute();

            

        }
    }

?>