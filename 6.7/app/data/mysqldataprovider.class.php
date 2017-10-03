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
    
    public function get_term($id) {
        $db = $this->connect();
        
        if ($db === null) {
            return false;
        }

        $sql = 'SELECT * FROM glossary_terms WHERE id = :id';
        $stmt = $db->prepare($sql);

        $stmt->execute([':id'=> $id]);

        $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        if (empty($data)) {
            return false;
        }

        $stmt = null;
        $db = null;

        return $data[0];
    }
    
    public function search_terms($search) {
        $db = $this->connect();
        
        if ($db === null) {
            return [];
        }

        $sql = 'SELECT * FROM glossary_terms WHERE term LIKE :search OR definition LIKE :search';
        $stmt = $db->prepare($sql);

        $stmt->execute([':search'=> "%$search%"]);

        $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        if (empty($data)) {
            return [];
        }

        $stmt = null;
        $db = null;

        return $data;
    }
    
    public function add_term($term, $definition) {
        $db = $this->connect();
        
        if ($db === null) {
            return;
        }

        $sql = 'INSERT INTO glossary_terms (term, definition) VALUES (:term, :definition)';
        $stmt = $db->prepare($sql);

        $stmt->execute([':term'=> $term, ':definition' => $definition]);

        $stmt = null;
        $db = null;
    }
    
    public function update_term($id, $term, $definition) {
        $db = $this->connect();
        
        if ($db === null) {
            return;
        }

        $sql = 'UPDATE glossary_terms set term = :term, definition = :definition WHERE id = :id';
        $stmt = $db->prepare($sql);

        $stmt->execute([':term'=> $term, ':definition' => $definition, ':id' => $id]);

        $stmt = null;
        $db = null;
    }
    
    public function delete_term($id) {
        $db = $this->connect();
        
        if ($db === null) {
            return;
        }

        $sql = 'DELETE FROM glossary_terms WHERE id = :id';
        $stmt = $db->prepare($sql);

        $stmt->execute([':id'=> $id]);

        $stmt = null;
        $db = null;
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