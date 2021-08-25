<?php

    require_once 'default_repository.php';

    class UserRepository extends DefaultRepository
    {
        function __construct()
        {
            parent::__construct();
        }
        
        public function list(){
            return $this->get_conn()->query("SELECT * FROM user");
        }

        //sess : 9
        public function get_by_id($user_id){
            return $this->get_conn()->query("SELECT * FROM user WHERE user_id = '$user_id'");
        }
    }
?>