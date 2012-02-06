<?php
    require 'config.php';
    require 'helper.php';
    
    $page = array();
    
    if (is_permalink_page()) {
        list($year, $month, $day, $title) = fetch_page_parameters();
        $filename = build_filename($year, $month, $day, $title);
        if (valid_filename($filename, $conf['pages_folder'])) {
            $page = process_page_file($filename, $conf['pages_folder'], $conf['date_format']);
        } 
    } elseif (is_about_page()) {
        $page['title']   = 'About';
        $page['content'] = file_markdown($conf['about_page']);
    } elseif (is_archive_page()) {
        $page['title'] = 'Archives';
        $pages         = fetch_pages($conf['pages_folder'],$conf['date_format']);
    } elseif (is_home_page()) {
        $pages         = fetch_pages($conf['pages_folder'],$conf['date_format'],$conf['num_entries_on_homepage']);
        $page['title'] = '';
    }
    
    if (!isset($page['title'])) {
        header("HTTP/1.0 404 Not Found");
        $page = fetch_404_page($conf);
    }
    
    $latest_posts = fetch_pages($conf['pages_folder'],$conf['date_format'],$conf['sidebar_num_latest_posts'],true);
    
    require 'views/header.php';
    
    if (is_home_page()) {
        require 'views/home.php';
    } elseif (is_archive_page()) {
        require 'views/archive.php';
    } elseif (is_permalink_page() || is_about_page()) {
        require 'views/page.php';
    }
    
    require 'views/footer.php';
?>

