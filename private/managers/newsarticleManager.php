<?php

    class newsarticleManager{
                //voeg een nieuw nieuws atriekel toe
                public static function addArticle($tekst, $imgpath, $author, $Titel){
                    global $con;
        
                    $stmt = $con->prepare("INSERT INTO newsarticle(`tekst`,`imgpath`,`author`,`Titel`) VALUES(?,?,?,?);");
                    $stmt->bindValue(1, $tekst);
                    $stmt->bindValue(2, $imgpath);
                    $stmt->bindValue(3, $author);
                    $stmt->bindValue(4, $Titel);
                    $stmt->execute();
                }
        
        
                //bewerk artiekel
                public static function editArticle($tekst, $imgpath, $author, $Titel, $id){
                    global $con;
        
                    $stmt = $con->prepare("UPDATE newsarticle SET`tekst`=? ,`imgpath`=? ,`author`=?, `Titel`=? WHERE id=?");
                    $stmt->bindValue(1, $tekst);
                    $stmt->bindValue(2, $imgpath);
                    $stmt->bindValue(3, $author);
                    $stmt->bindValue(4, $Titel);
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

                //haal alle artikels op
                public static function getAllNews(){
                    global $con;
        
                    $stmt = $con->prepare("SELECT * FROM newsarticle");
                    $stmt->execute();

                    return $stmt->fetchAll(PDO::FETCH_OBJ);
                }
    
                public static function getArticleById($id){
                    global $con;

                    $stmt = $con->prepare("SELECT * FROM newsarticle WHERE id=?");
                    $stmt->bindValue(1, $id);
                    $stmt->execute();

                    return $stmt->fetch(PDO::FETCH_OBJ);
                }
            }
?>