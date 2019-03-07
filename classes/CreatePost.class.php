<?php

    //Klass för att lagra, hämta, skapa och radera inlägg.
    class CreatePost {

        private $db;
        private $username;
        private $title;
        private $message;

        //Konstruktor
        function __construct(){
            //Anslut till databas
            $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
            if($this->db->connect_errno > 0){
                die('Fel vid anslutning [' . $this->db->connect_error . ']');
            }
        }

        //Läs in alla inlägg
        function getPosts(){
            $sql = "SELECT * FROM post ORDER BY date DESC LIMIT 5";
            $result = $this->db->query($sql);
            
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
            
        }

        //Läs in inlägg från en inloggad användare
        function getSpecificPosts(){
            $sql = "SELECT * FROM post WHERE username='" . $_SESSION['username'] . "' ORDER BY date DESC";
            $result = $this->db->query($sql);
            
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
            
        }

        //Läs in inlägg från en specifik användare
        function getPostsByUser(){
            $sql = "SELECT * FROM post WHERE username='" . $_GET['userID'] . "' ORDER BY date DESC";
            $result = $this->db->query($sql);
            
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
            
        }

        //Lägg till ett inlägg
        function addPost($username, $title, $message){
            
            if(!$this->setTitle($title)){
                return false;
            }
            if(!$this->setMessage($message)){
                return false;
            }

            $sql = "INSERT INTO post(username, title, message)VALUES('" . $_SESSION['username'] . "', '" . $this->title . "', '" . $this->message . "');";
            return $result = $this->db->query($sql);

        }

        //Radera ett inlägg
        function DeletePost($id){
            //Försäkra om att det är en siffra som matas in
            $id = intval($id);
            $sql = "DELETE FROM post WHERE postid = $id";
            return $this->db->query($sql);

        }
        //Uppdatera ett inlägg
        function UpdatePost($title, $message, $id){

            if(!$this->setTitle($title)){
                return false;
            }
            if(!$this->setMessage($message)){
                return false;
            }
            //Försäkra om att det är en siffra som matas in
            $id = intval($id);
            
            $sql = "UPDATE post SET title='".$this->title."', message='".addslashes($this->message)."', date=now() WHERE postid=$id";
            return $this->db->query($sql);
        }

        //Hämta specifikt inlägg med id
        function getSpecificPost($id){
            $id = intval($id);

            $sql = "SELECT * FROM post WHERE postid=$id";
            $result = $this->db->query($sql);
            $row = mysqli_fetch_array($result);

            return $row;
        }

        //sätt namn
        function setTitle($title){
            if($title != "") {
                $this->title = $this->db->real_escape_string($title);
                return true;
            }
            else{
                return false;
            }
        }

        //sätt meddelande
        function setMessage($message){
            if($message != "") {
                $this->message = $this->db->real_escape_string($message);
                return true;
            }
            else{
                return false;
            }
        }

    }

?>