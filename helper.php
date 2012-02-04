<?php
require 'markdown.php';

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

function valid_filename($filename, $folder) {
    $pattern = "/^\d{4}-\d{2}-\d{2}-[a-z\-]+\.markdown$/";
    return (preg_match($pattern, $filename) == 1) && file_exists($folder.$filename);
}

function process_page_file($filename, $folder) {
    $pattern = "/^\d{4}-\d{2}-\d{2}-([a-z\-]+)\.markdown$/";
    preg_match($pattern, $filename, $matches);
    $page['content'] = Markdown(file_get_contents($folder.$filename));
    $page['title']   = format_title($matches[1]);
    return $page;
}

function build_filename($year, $month, $day, $title) {
    return "{$year}-{$month}-{$day}-{$title}.markdown";
}

function fetch_pages($folder, $limit = false) {
    $pages = array();
    $files = scandir($folder, 1);
    $files = array_slice($files, 0, -2);
    foreach($files as $i => $file) {
        if ($limit && ($i >= $limit)) {
            break;
        }
        $pages[] = process_page_file($file, $folder);
    }
    return $pages;
}

function fetch_404_page($conf) {
    $page['title']   = $conf['404_title'];
    $page['content'] = Markdown($conf['404_message']);
    return $page;
}

?>
