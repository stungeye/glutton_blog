<?php
    require 'config.php';
    require 'helper.php';
    
    list($year, $month, $day, $title) = fetch_page_parameters();
    $page = array();
    
    if ($year && $month && $day && $title) {
        $filename = build_filename($year, $month, $day, $title);
        if (valid_filename($filename, $conf['pages_folder'])) {
            $page = process_page_file($filename, $conf['pages_folder']);
        } 
    } elseif (count($_GET) == 0) {
        $pages           = fetch_pages($conf['pages_folder'],5);
        $page['title']   = $conf['blog_name'];
        $page['content'] = '<pre>'.print_r($pages,true).'</pre>';
    }
    
    if (!isset($page['content'])) {
        header("HTTP/1.0 404 Not Found");
        $page = fetch_404_page($conf);
    }
    
    require 'header.php';
?>

<h1><?= $page['title'] ?></h1>
<?= $page['content'] ?>

<?php 
    require 'footer.php';
?>

