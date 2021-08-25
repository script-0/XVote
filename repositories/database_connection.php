<?php

    class DatabaseConnection{
        public static $connexion = null;
        public function load_db (){
            if(is_null(self::$connexion)){
                self::$connexion = new mysqli('db4free.net', 'cesa_user', 'cesa_password', 'cesa_vote');
            }
            return self::$connexion;
        }

        function __construct(){
        }
    }
?>