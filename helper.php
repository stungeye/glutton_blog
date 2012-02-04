<?php

define('PAGES_FOLDER','./pages/');

function fetch_page_parameters() {
    $parameter_names = array('year','month','day','title');
    $parameters      = array();
    foreach($parameter_names as $name) {
        $parameters[] = isset($_GET[$name]) ? $_GET[$name] : false;
    }
    return $parameters;
}

function format_title($title) {
    return ucwords(str_replace('-',' ',$title));
}

function valid_filename($filename) {
    $pattern = "/^\d{4}-\d{2}-\d{2}-[a-z\-]+\.markdown$/";
    return preg_match($pattern, $filename) == 1;
}

?>
