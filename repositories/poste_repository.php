<?php

    class PosteRepository extends DefaultRepository
    {
        function __construct()
        {
            parent::__construct();
        }
        
        //Vote : 10
        public function list_postes(){
            return $this->get_conn()->query("SELECT * FROM postes");
        }
    }

?>