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
    } elseif (is_archive_page()) {
        $page['title']   = $conf['blog_name'] . ' Archive';
        $pages           = fetch_pages($conf['pages_folder'],$conf['date_format']);
        $page['content'] = 'Arhive';
    } elseif (is_home_page()) {
        $pages           = fetch_pages($conf['pages_folder'],$conf['date_format'],$conf['num_entries_on_homepage']);
        $page['title']   = $conf['blog_name'];
        $page['content'] = '<pre>'.print_r($pages,true).'</pre>';
    }
    
    if (!isset($page['content'])) {
        header("HTTP/1.0 404 Not Found");
        $page = fetch_404_page($conf);
    }
    
    require 'header.php';
?>

<? if (is_home_page()): ?>
    <? foreach ($pages as $page): ?>
        <article>
            <h2><a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['title'] ?></a></h2>
            <?= $page['content'] ?>
            <p class="postinfo">
                <a href="<? $conf['site_url'] . $page['permalink'] ?>"><?= $page['date'] ?></a>
            </p>
        </article>
    <? endforeach; ?>
<? elseif (is_archive_page()): ?>
    <? foreach($pages as $page): ?>
        <h1><a href="<?= $conf['site_url'] ?><?= $page['permalink'] ?>"><?= $page['title'] ?></a></h1>
        <p><?= $page['date'] ?></p>
    <? endforeach; ?>
<? elseif (is_permalink_page()): ?>
    <h1><?= $page['title'] ?></h1>
    <?= $page['content'] ?>
<? endif; ?>

<?php 
    require 'footer.php';
?>

