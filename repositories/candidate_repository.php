<?php
    require_once 'default_repository.php';
    
    class CandidateRepository extends DefaultRepository
    {
        function __construct()
        {
            parent::__construct();
        }
        
        //Vote : 10
        public function list(){
            return $this->get_conn()->query("SELECT * FROM candidate");
        }

        //vote_result : 35
        public function get_by_id($candidate_id){
            return $this->get_conn()->query("SELECT * FROM candidate WHERE candidate_id = '$candidate_id'");
        }

        //results : 23
        public function get_by_poste($poste){
            return $this->get_conn()->query("SELECT * FROM `candidate` WHERE `position` = " . $poste);
        }
    }

?>