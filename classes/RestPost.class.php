<?php

    //Klass för att konvertera inläggen till JSON-format.
    class RestPost {

        private $db;

        //Konstruktor
        function __construct(){
            //Anslut till databas
            $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
            if($this->db->connect_errno > 0){
                die('Fel vid anslutning [' . $this->db->connect_error . ']');
            }
        }

        //Hämta inlägg
        function getWidgetPosts(){

            $numrows = 999; //Maxvärde
            if(isset($_GET['antal'])) {
                $numrows = intval($_GET['antal']);
            }
            //SQL-fråga som hämtar alla inlägg i fallande ordning med en begränsning
            $sql = "SELECT * FROM post ORDER BY postid DESC LIMIT $numrows";
            $result = $this->db->query($sql) or die('Fel vid SQL-fråga');

            //Loopa genom resultet och spara till ny array
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            //Konvertera arrayen till JSON
            $json = json_encode($rows, JSON_PRETTY_PRINT);  
            
            //returnera JSON-strängen
            return $json;
        }
    }

?>