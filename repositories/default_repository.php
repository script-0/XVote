<?php

    require_once 'database_connection.php';
    
    class DefaultRepository
    {
        private $conn;

        function __construct()
        {
            $database = new DatabaseConnection();
            $this->conn = $database->load_db();
        }
        
        public function get_conn(){
            return $this->conn;
        }
    }

?>