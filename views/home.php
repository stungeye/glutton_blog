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