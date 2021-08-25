<?php

    class VoterRepository extends DefaultRepository
    {
        function __construct()
        {
            parent::__construct();
        }
        
        //Login_query : 7
        function login($id_number, $password)
        {
            return $this->get_conn()->query("SELECT voters_id, status, account FROM voters WHERE id_number = '$id_number' && password = '$password'");
        }
    }
?>