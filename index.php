<?php
    require 'markdown.php';
    require 'config.php';
    require 'helper.php';
    
    list($year, $month, $day, $title) = fetch_page_parameters();
    $file_content = false;
    
    if ($year && $month && $day && $title) {
        $page_title  = format_title($title);
        $filename = "{$year}-{$month}-{$day}-{$title}.markdown";
        if (valid_filename($filename) && file_exists($conf['pages_folder'].$filename)) {
            $file_content = Markdown(file_get_contents($conf['pages_folder'].$filename));
        } 
    } elseif (count($_GET) == 0) {
        $page_title = 'Mobile HTML5 Development';
        $directory = scandir($conf['pages_folder'], 1);
        $file_content = '<pre>'.print_r($directory,true).'</pre>';
    }
    
    if (!$file_content) {
        header("HTTP/1.0 404 Not Found");
        $page_title = $conf['404_title'];
        $file_content = Markdown($conf['404_message']);
    }
    
    require 'header.php';
?>

<h1><?= $page_title ?></h1>
<?= $file_content ?>

<?php 
    require 'footer.php';
?>

