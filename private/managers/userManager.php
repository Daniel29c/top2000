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

        public static function addVotedUser($name ,$email, $gender){
            global $con;

            $stmt = $con->prepare("INSERT INTO user(`name`,`email`,`gender`) VALUES(?,?,?)");
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $gender);
            $stmt->execute();

            return $con	->lastInsertId();
        }


        //bewerk de gebruiker zonder het wachtwoord
        public static function editUser($name, $email, $verify, $isadmin, $id){
            global $con;

            $stmt = $con->prepare("UPDATE user SET`name`=? ,`email`=? ,`verify`=? ,`isadmin`=? WHERE id=?");
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
            
            return $stmt->fetch(PDO::FETCH_OBJ);
        } 

        //selecteer alle gebruikers 
        public static function getAllUsers(){
            global $con;

            $stmt = $con->prepare("SELECT * FROM user");
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
            
        } 




    }

?>