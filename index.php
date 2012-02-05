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
    
    require 'header.php';
?>

<? if (is_home_page()): ?>
    <? foreach ($pages as $page): ?>
        <article>
            <h2><a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['title'] ?></a></h2>
            <?= $page['content'] ?>
            <div class="postinfo">
                <p>
                    <a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['date'] ?></a> - 
                    <a href="<?= $conf['site_url'] . $page['permalink'] ?>#disqus_thread">Comment</a>
                </p>
            </div>
        </article>
    <? endforeach; ?>
    <p>
        <a href="<?= $conf['site_url'] ?>/archive">Read More In Our Archive &raquo;</a>
    </p>
<? elseif (is_archive_page()): ?>
    <? foreach($pages as $page): ?>
        <article class="archives">
            <h2><a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['title'] ?></a></h2>
            <div class="postinfo">
                <p><?= $page['date'] ?></p>
                <p><a href="<?= $conf['site_url'] . $page['permalink'] ?>">Read Full Post &raquo;</a></p>
            </div>
        </article>
    <? endforeach; ?>
<? elseif (is_permalink_page() || is_about_page()): ?>
    <article>
        <? if (isset($page['permalink'])): ?>
            <h2><a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['title'] ?></a></h2>
        <? else: ?>
            <h2><?= $page['title'] ?></h2>
        <? endif; ?>
        <?= $page['content'] ?>
        <? if (isset($page['permalink'])): ?>
            <p class="postinfo">
                <a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['date'] ?></a> -
                <a href="<?= $conf['site_url'] . $page['permalink'] ?>#disqus_thread">Comment</a>
            </p>
        <? endif; ?>
    </article>
    <div id="google_above_comments">
        <script type="text/javascript"><!--
            google_ad_client = "ca-pub-8119657288856342";
            /* Html5 Blog Above Comments */
            google_ad_slot = "7686170193";
            google_ad_width = 468;
            google_ad_height = 60;
            //-->
            </script>
            <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
    </div>
    <div id="disqus_thread"></div>
    <script type="text/javascript">
    var disqus_shortname = 'mobilehtml5dev';

    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
    </script>
<? endif; ?>

<?php 
    require 'footer.php';
?>

