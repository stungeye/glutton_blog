<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $page['title'] ?></title>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?= $conf['site_url'] ?>/atom/" />
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="home">
    <div id="wrapper">
        <header>
            <h1><a href="<?= $conf['site_url'] ?>" title="Return to the homepage"><?= $conf['blog_name'] ?></a></h1>
            <nav>
                <ul>
                    <li><a href="<?= $conf['site_url'] ?>/about">About</a></li>
                    <li><a href="<?= $conf['site_url'] ?>/archive">Archives</a></li>
                    <li><a href="<?= $conf['site_url'] ?>/contact">Contact</a></li>
                </ul>
            </nav>
        </header>
        <div id="content" role="main">
