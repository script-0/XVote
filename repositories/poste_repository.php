<?php

    require_once 'default_repository.php';

    class PosteRepository extends DefaultRepository
    {
        function __construct()
        {
            parent::__construct();
        }

        //Vote : 10
        //Results : 20
        //submi_vote : 4
        //vote_result : 26
        public function list(){
            return $this->get_conn()->query("SELECT * FROM postes");
        }

        //vote_result : 10
        public function list_class(){
            return $this->get_conn()->query("SELECT `class_name` FROM postes");
        }
    }

?>