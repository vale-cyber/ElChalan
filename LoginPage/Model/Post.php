<?php

namespace Model;

class post {
    private $conn;
    private $table = 'posts';

    //Post Properties
    

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GetPost
    public function read() {
        // Create query
        $query = '';
        
        //Prep Statement
        $statemnt = $this->conn->prepare($query);

        //Execute query
        $statemnt->execute();

        return $statemnt;
    }
}