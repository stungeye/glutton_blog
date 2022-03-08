<?php     require 'config.php';
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
    } elseif (is_apps_page()) {
        $page['title']   = 'Our Mobile Apps';
        $page['content'] = file_markdown($conf['apps_page']);
    } elseif (is_archive_page()) {
        $page['title'] = 'Archives';
        $pages         = fetch_pages($conf['pages_folder'],$conf['date_format']);
    } elseif (is_drafts_page()) {
        $pages         = fetch_pages($conf['drafts_folder'],$conf['date_format'],$conf['num_entries_on_homepage']);
        $page['title'] = '';
    } elseif (is_home_page()) {
        $pages         = fetch_pages($conf['pages_folder'],$conf['date_format'],$conf['num_entries_on_homepage']);
        $page['title'] = '';
    }
    
    if (!isset($page['title'])) {
        header("HTTP/1.0 404 Not Found");
        $page = fetch_404_page($conf);
    }
    
    $latest_posts = fetch_pages($conf['pages_folder'],$conf['date_format'],$conf['sidebar_num_latest_posts'],true);
    
    if (isset($conf['feedburner'])) {
        $feed_url = "http://feeds.feedburner.com/{$conf['feedburner']}?format=xml";
    } else {
        $feed_url = $conf['site_url'] . '/atom';
    }
    
    require 'views/header.php';
    
    if (is_home_page() || is_drafts_page()) {
        require 'views/home.php';
    } elseif (is_archive_page()) {
        require 'views/archive.php';
    } elseif (is_permalink_page() || is_about_page() || is_apps_page()) {
        require 'views/page.php';
    }
    
    require 'views/footer.php';
?>

