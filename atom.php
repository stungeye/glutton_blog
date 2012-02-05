<?php
    require 'config.php';
    require 'helper.php';
	include("lib/FeedWriter.php");
	
	$feed = new FeedWriter(ATOM);

	$feed->setTitle($conf['blog_name']);
	$feed->setLink($conf['site_url']);
	
	$feed->setChannelElement('updated', date(DATE_ATOM , time()));
	$feed->setChannelElement('author', array('name'=>$conf['blog_author']));

    $pages = fetch_pages($conf['pages_folder'], $conf['date_format'], $conf['rss_num_feed_items']);

    foreach($pages as $page) {
        $newItem = $feed->createNewItem();

        $newItem->setTitle($page['title']);
        $newItem->setLink($conf['site_url'] . $page['permalink']);
        $newItem->setDate($page['epoch_time']);
        $newItem->setDescription($page['content']);

        $feed->addItem($newItem);
    }
	
	$feed->genarateFeed();
?>
