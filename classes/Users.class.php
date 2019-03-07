<?php

    //Klass för att lagra användare och logga in
    class Users {

        private $db;
        private $username;
        private $password;
        private $fullname;
        private $email;

        function __construct(){
            $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
            if($this->db->connect_errno > 0){
                die('Fel vid anslutning [' . $this->db->connect_error . ']');
            }
        }

        //Lagra ny användare
        function storeUser($username, $password, $fullname, $email){
            $username = $this->db->real_escape_string($username);
            $password = $this->db->real_escape_string($password);
            $fullname = $this->db->real_escape_string($fullname);
            $email = $this->db->real_escape_string($email);

            //Hasha $password - CRYPT_BLOWFISH 
            $salt = '$2a$15$HuJkSbuyetwQcjkIloksnQ$';
            $password = crypt($password, $salt);

            $sql = "INSERT INTO user(username, password, fullname, email)VALUES('$username', '$password', '$fullname', '$email')";
            $result = $this->db->query($sql);

            return $result;
        }

        // //Hämta specifik användare från id
        // function getSpecificUser($id){
        //     $id = intval($id);

        //     $sql = "SELECT * FROM user WHERE userid=$id";
        //     $result = $this->db->query($sql);
        //     $row = mysqli_fetch_array($result);

        //     return $row;
        // }

        //Läs in alla användare
        function getUsers(){
            $sql = "SELECT * FROM user ORDER BY username ASC";
            $result = $this->db->query($sql);
            
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
            
        }

        //Logga in
        function loginUser($username, $password){
            $username = $this->db->real_escape_string($username);
            $password = $this->db->real_escape_string($password);

            $sql = "SELECT password FROM user WHERE username='$username'";
            $result = $this->db->query($sql);

            //Koll om användarnamnet och lösenordet finns i databasen
            //är det fler rader än 0 så finns användaren i databasen), annars inte
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $storedPass = $row['password'];

                if($storedPass == crypt($password, $storedPass)){
                    $_SESSION['username'] = $username;
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }

        //Logga ut
        function logOutUser($username){
            unset($_SESSION['username']);           
        }

        //Om användarnamn redan är upptaget
        function takenUsername($username){
            $username = $this->db->real_escape_string($username);

            $sql = "SELECT username FROM user WHERE username='$username'";

            $result = $this->db->query($sql);

            //Koll om användarnamnet finns i databasen
            //mysqli_num_rows() returnerar antal rader från $result
            //är det fler rader än 0 så är användarnamnet upptaget(finns redan i databasen), annars inte
            if($result->num_rows > 0){
                return true;
            }
            else{
                return false;
            }


        }

    }

?>