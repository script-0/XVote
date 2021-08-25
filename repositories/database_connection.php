<?php

    class DatabaseConnection{
        public static $conn = null;
        public function load_db (){
            if(is_null(self::$conn)){
                self::$conn = new mysqli('127.0.0.1', 'root', 'password', 'cesa_vote');
            }
            return self::$conn;
        }

        function __construct(){
        }
    }
?>