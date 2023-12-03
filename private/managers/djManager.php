<?php

    class djManager{

        //voeg een nieuwe dj toe
        public static function addDj($djname, $imgpath){
            global $con;

            $stmt = $con->prepare("INSERT INTO djs (`name`,`imgpath`) VALUES(?,?);");
            $stmt->bindValue(1, $djname);
            $stmt->bindValue(2, $imgpath);
            $stmt->execute();
        }


        //bewerk de geselecteerde dj
        public static function editDj($djId, $djname, $imgpath){
            global $con;

            $stmt = $con->prepare("UPDATE djs SET `name`=?, `imgpath`=? WHERE id=?");
            $stmt->bindValue(1, $djname);
            $stmt->bindValue(2, $imgpath);
            $stmt->bindValue(3, $djId);
            $stmt->execute();
        }
    }

?>