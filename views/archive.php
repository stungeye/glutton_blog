<? foreach($pages as $page): ?>
    <article class="archives">
        <h2><a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['title'] ?></a></h2>
        <div class="postinfo">
            <p><?= $page['date'] ?></p>
            <p><a href="<?= $conf['site_url'] . $page['permalink'] ?>">Read Full Post &raquo;</a></p>
        </div>
    </article>
<? endforeach; ?>