<?php //namespace App\Data;

//require('glossaryterm.class.php');

// function get_terms() {
//     $json = get_data();

//     return json_decode($json);
// }

// function get_term($term) {
//     $terms = get_terms();

//     foreach ($terms as $item) {
//         if ($item->term == $term) {
//             return $item;
//         }
//     }

//     return false;
// }

// function search_terms($search) {
//     $items = get_terms();

//     $results = array_filter($items, function($item) use($search) {
        
//         if (strpos($item->term, $search) !== false || 
//             strpos($item->definition, $search) !== false) {
//             return $item;
//         }
//     });

//     return $results;

// }

// function add_term($term, $definition) {
//     $items = get_terms();

//     $items[] = new GlossaryTerm($term, $definition);

//     set_data($items);
// }

// function update_term($original_term, $new_term, $definition) {
//     $terms = get_terms();
    
//     foreach ($terms as $item) {
//         if ($item->term == $original_term) {
//             $item->term = $new_term;
//             $item->definition = $definition;
//             break;
//         }
//     }

//     set_data($terms);
// }

// function delete_term($term) {
//     $terms = get_terms();
    
//     for ($i = 0; $i < count($terms); $i++) {
//         if ($terms[$i]->term === $term) {
//             unset($terms[$i]);
//             break;
//         }
//     }

//     $new_terms = array_values($terms);

//     set_data($new_terms);
// }

// function get_data() {
//     $fname = CONFIG['data_file'];

//     $json = '';

//     if (!file_exists($fname)) {
//         file_put_contents($fname, '');
//     } else {
//         $json = file_get_contents($fname);
//     }


//     return $json;
// }

// function set_data($arr) {
//     $fname = CONFIG['data_file'];

//     $json = json_encode($arr);

//     file_put_contents($fname, $json);
// }