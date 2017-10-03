<?php

//require('glossaryterm.class.php');

class MySqlDataProvider {

    function __construct() {
    }
    
    public function get_terms() {
        $db = $this->connect();

        if ($db === null) {
            return [];
        }

        $stmt = $db->query('SELECT * FROM glossary_terms', PDO::FETCH_CLASS, 'GlossaryTerm');

        $data = $stmt->fetchAll();


        $stmt = null;
        $db = null;

        return $data;
    }
    
    public function get_term($term) {
    }
    
    public function search_terms($search) {
    
    }
    
    public function add_term($term, $definition) {
    }
    
    public function update_term($original_term, $new_term, $definition) {
    }
    
    public function delete_term($term) {
    }

    private function connect() {
        $con_str = 'mysql:dbname=glossary;host=localhost;port=8889';
        $user = 'root';
        $password = 'root';

        try {
            return new PDO($con_str, $user, $password);
        } catch (PDOException $e) {
            return null;
        }
        
    }
}