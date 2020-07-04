<?php

class MySqlDataProvider extends DataProvider {
    public function get_terms() {
        
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
        try {
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        } catch (PDOException $e) {
            return null;
        }
    }
}