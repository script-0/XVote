<?php

    class DatabaseConnection{
        public static $connexion = null;
        public function load_db (){
            if(is_null(self::$connexion)){
                self::$connexion = new mysqli('127.0.0.1', 'root', 'password', 'cesa_vote');
            }
            return self::$connexion;
        }

        function __construct(){
        }
    }
?>