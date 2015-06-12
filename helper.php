<?php
require 'lib/markdown.php';

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
    $pattern = "/^\d{4}-\d{2}-\d{2}-[0-9a-z\-]+\.markdown$/";
    return (preg_match($pattern, $filename) == 1) && file_exists($folder.$filename);
}

function file_markdown($filename) {
    return Markdown(file_get_contents($filename));
}

function process_page_file($filename, $folder, $date_format, $no_content = false) {
    $pattern = "/^(\d{4})-(\d{2})-(\d{2})-([0-9a-z\-]+)\.markdown$/";
    preg_match($pattern, $filename, $matches);
    
    $page['title']      = format_title($matches[4]);
    $page['permalink']  = "/{$matches[1]}/{$matches[2]}/{$matches[3]}/{$matches[4]}";
    $date               = new DateTime("{$matches[1]}-{$matches[2]}-{$matches[3]}");
    $page['date']       = $date->format($date_format);
    $page['epoch_time'] = $date->format('U');
    
    if (!$no_content) {
        $page['content'] = file_markdown($folder.$filename);
    }
    return $page;
}

function build_filename($year, $month, $day, $title) {
    return "{$year}-{$month}-{$day}-{$title}.markdown";
}

function fetch_pages($folder, $date_format, $limit = false, $no_content = false) {
    $pages = array();
    $files = scandir($folder, 1);
    $files = array_slice($files, 0, -2);
    foreach($files as $i => $file) {
        if ($limit && ($i >= $limit)) {
            break;
        }
        if (pathinfo($file, PATHINFO_EXTENSION) == 'markdown') {
            $pages[] = process_page_file($file, $folder, $date_format, $no_content);
        }
    }
    return $pages;
}

function fetch_404_page($conf) {
    $page['title']   = $conf['404_title'];
    $page['content'] = Markdown($conf['404_message']);
    $date            = new DateTime();
    $page['date']    = $date->format($conf['date_format']);
    return $page;
}

function html_title($page_title, $blog_name) {
    if ($page_title == '') {
        return $blog_name;
    } else {
        return $page_title . ' - ' . $blog_name;
    }
}

function is_archive_page() {
    return isset($_GET['archive']) && (count($_GET) == 1);
}

function is_about_page() {
    return isset($_GET['about']) && (count($_GET) == 1);
}

function is_apps_page() {
    return isset($_GET['apps']) && (count($_GET) == 1);
}

function is_drafts_page() {
   return isset($_GET['draft']) && (count($_GET) == 1);
}

function is_home_page() {
    return count($_GET) == 0;
}

function is_permalink_page() {
    return isset($_GET['year']) && isset($_GET['month']) && isset($_GET['day']) && isset($_GET['title']) && (count($_GET) == 4);
}

?>
