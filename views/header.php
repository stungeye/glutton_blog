<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo  html_title($page['title'], $conf['blog_name']) ?></title>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php echo  $feed_url ?>" />
    <link rel="stylesheet" href="http://yandex.st/highlightjs/6.1/styles/solarized_light.min.css">
    <script src="http://yandex.st/highlightjs/6.1/highlight.min.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="home">
    <div id="wrapper">
        <header>
            <h1><a href="<?php echo  $conf['site_url'] ?>" title="Return to the homepage"><?php echo  $conf['blog_name'] ?></a></h1>
            <nav>
                <ul>
                    <li><a href="<?php echo  $conf['site_url'] ?>/apps">Apps</a></li>
                    <li><a href="<?php echo  $conf['site_url'] ?>/archive">Archives</a></li>
                    <li><a href="<?php echo  $feed_url ?>">RSS</a></li>
                </ul>
            </nav>
        </header>
        <div id="content" role="main">
