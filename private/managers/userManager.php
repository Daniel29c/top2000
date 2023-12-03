<?php

    class userManager{
        

        //voeg een nieuwe user toe
        public static function addUser($name, $email, $passwordhash, $verify, $isadmin){
            global $con;

            $stmt = $con->prepare("INSERT INTO user(`name`,`email`,`passwordhash`,`verify`,`isadmin`) VALUES(?,?,?,?,?);");
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $passwordhash);
            $stmt->bindValue(4, $verify);
            $stmt->bindValue(5, $isadmin);
            $stmt->execute();
        }


        //bewerk de gebruiker zonder het wachtwoord
        public static function editUser($name, $email, $verify, $isadmin, $id){
            global $con;

            $stmt = $con->prepare("UPDATE user SET`name`=? ,`email`=? ,`passwordhash`=? ,`verify`=? ,`isadmin`=? WHERE id=?");
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $verify);
            $stmt->bindValue(4, $isadmin);
            $stmt->bindValue(5, $id);
            $stmt->execute();
        }

        //verwijder een gebruiker
        public static function removeUser($id){
            global $con;

            $stmt = $con->prepare("DELETE FROM user WHERE id=?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
        }


        //selecteer enkele gebruiker door id 
        public static function getUserById($id){
            global $con;

            $stmt = $con->prepare("SELECT * FROM user WHERE id=?");
            $stmt->bindValue(1, $id);

            $stmt->execute();
            
            return $stmt;
        } 






    }

?>