<?php

class MySqlDataProvider extends DataProvider {
    public function get_terms() {
        return $this->query('SELECT * FROM terms');
    }
    
    public function get_term($term) {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT * FROM terms WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $term,
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $smt = null;
        $db = null;

        if (empty($data)) {
            return;
        }

        

        return $data[0];
    }
    
    public function search_terms($search) {
        return $this->query(
            'SELECT * FROM terms WHERE term LIKE :search OR definition LIKE :search',
            [':search' => '%'.$search.'%']
        );
    }
    
    public function add_term($term, $definition) {
        $this->execute(
            'INSERT INTO terms (term, definition) VALUES (:term, :definition)',
            [
                ':term' => $term,
                ':definition' => $definition
            ]
        );
    }
    
    public function update_term($original_term, $new_term, $definition) {
        $this->execute(
            'UPDATE terms SET term = :term, definition = :definition WHERE id = :id',
            [
                ':term' => $new_term,
                ':definition' => $definition,
                ':id' => $original_term
            ]
        );
    }
    
    public function delete_term($term) {
        $this->execute(
            'DELETE FROM terms WHERE id = :id',
            [':id' => $term]
        );
    }

    private function query($sql, $sql_parms = []) {
        $db = $this->connect();

        if ($db == null) {
            return [];
        }

        $query = null;

        if (empty($sql_parms)) {
            $query = $db->query($sql);
        } else {
            $query = $db->prepare($sql);
            $query->execute($sql_parms);
        }

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $query = null;
        $db = null;

        return $data;
    }

    private function execute($sql, $sql_parms) {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $smt = $db->prepare($sql);

        $smt->execute($sql_parms);

        $smt = null;
        $db = null;
    }

    private function connect() {
        try {
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        } catch (PDOException $e) {
            return null;
        }
    }
}