<?php

    class newsarticleManager{
                //voeg een nieuw nieuws atriekel toe
                public static function addArticle($tekst, $imgpath, $author){
                    global $con;
        
                    $stmt = $con->prepare("INSERT INTO newsarticle(`tekst`,`imgpath`,`author`) VALUES(?,?,?);");
                    $stmt->bindValue(1, $tekst);
                    $stmt->bindValue(2, $imgpath);
                    $stmt->bindValue(3, $author);
                    $stmt->execute();
                }
        
        
                //bewerk artiekel
                public static function editArticle($tekst, $imgpath, $author, $id){
                    global $con;
        
                    $stmt = $con->prepare("UPDATE newsarticle SET`tekst`=? ,`imgpath`=? ,`author`=? WHERE id=?");
                    $stmt->bindValue(1, $tekst);
                    $stmt->bindValue(2, $imgpath);
                    $stmt->bindValue(3, $author);
                    $stmt->bindValue(5, $id);
                    $stmt->execute();
                }
        
                //verwijder een artiekel
                public static function removeArticle($id){
                    global $con;
        
                    $stmt = $con->prepare("DELETE FROM newsarticle WHERE id=?");
                    $stmt->bindValue(1, $id);
                    $stmt->execute();
                }
    }

?>