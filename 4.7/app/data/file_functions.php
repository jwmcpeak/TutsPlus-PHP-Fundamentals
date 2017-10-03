<?php

function get_terms() {
    $json = get_data();

    return json_decode($json);
}

function get_term($term) {
    $terms = get_terms();

    foreach ($terms as $item) {
        if ($item->term == $term) {
            return $item;
        }
    }

    return false;
}

function search_terms($search) {
    $items = get_terms();

    $results = array_filter($items, function($item) use($search) {
        
        if (strpos($item->term, $search) !== false || 
            strpos($item->definition, $search) !== false) {
            return $item;
        }
    });

    return $results;

}

function add_term($term, $definition) {
    $items = get_terms();

    $obj = (object) [
        'term' => $term,
        'definition' => $definition
    ];

    $items[] = $obj;

    set_data($items);
}

function get_data() {
    $fname = CONFIG['data_file'];

    $json = '';

    if (!file_exists($fname)) {
        file_put_contents($fname, '');
    } else {
        $json = file_get_contents($fname);
    }


    return $json;
}

function set_data($arr) {
    $fname = CONFIG['data_file'];

    $json = json_encode($arr);

    file_put_contents($fname, $json);
}