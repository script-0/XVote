<?php

    require_once 'default_repository.php';
    
    class VoteRepository extends DefaultRepository
    {
        function __construct()
        {
            parent::__construct();
        }
        
        public function list(){
            return $this->get_conn()->query("SELECT * FROM votes");
        }

        //results : 25
        public function count_by_poste($poste, $as){
            return $this->get_conn()->query("SELECT count(*) as " . $as . " FROM `votes` WHERE `poste_id` = " . $poste);
        }

        //results : 37
        public function count_by_candidate($candidate, $as){
            return $this->get_conn()->query("SELECT count(*) as " . $as . " FROM `votes` WHERE `candidate_id` = " . $candidate);
        }

        //submit_vote : 15, 17
        public function save($candidateID, $voterID, $posteID){
            return $this->get_conn()->query("INSERT INTO `votes` (`candidate_id` , `voters_id` , `poste_id`) VALUES( '$candidateID','$voterID','$posteID')");
        }
        
    }
?>