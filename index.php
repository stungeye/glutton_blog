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
    } elseif (is_home_page()) {
        $pages           = fetch_pages($conf['pages_folder'],$conf['date_format'],$conf['num_entries_on_homepage']);
        $page['title']   = $conf['blog_name'];
    }
    
    if (!isset($page['title'])) {
        header("HTTP/1.0 404 Not Found");
        $page = fetch_404_page($conf);
    } else {
        $latest_posts = fetch_pages($conf['pages_folder'],$conf['date_format'],$conf['sidebar_num_latest_posts'],true);
    }
    
    require 'header.php';
?>

<? if (is_home_page()): ?>
    <? foreach ($pages as $page): ?>
        <article>
            <h2><a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['title'] ?></a></h2>
            <?= $page['content'] ?>
            <div class="postinfo">
                <p><a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['date'] ?></a></p>
            </div>
        </article>
    <? endforeach; ?>
<? elseif (is_archive_page()): ?>
    <? foreach($pages as $page): ?>
        <article class="archives">
            <h2><a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['title'] ?></a></h2>
            <div class="postinfo">
                <p><?= $page['date'] ?></p>
                <p><a href="<?= $conf['site_url'] . $page['permalink'] ?>">Read Full Post &raquo;</a></p>
            </div>
        </article>    <? endforeach; ?>
<? elseif (is_permalink_page()): ?>
    <article>
        <h2><a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['title'] ?></a></h2>
        <?= $page['content'] ?>
        <p class="postinfo">
            <a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['date'] ?></a>
        </p>
    </article>
<? endif; ?>

<?php 
    require 'footer.php';
?>

