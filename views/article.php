<article>
    <? if (isset($page['permalink'])): ?>
        <h2><a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['title'] ?></a></h2>
    <? else: ?>
        <h2><?= $page['title'] ?></h2>
    <? endif; ?>
    <?= $page['content'] ?>
    <? if (isset($page['permalink'])): ?>
        <p class="postinfo">
            <a href="<?= $conf['site_url'] . $page['permalink'] ?>"><?= $page['date'] ?></a>
            <? if(isset($conf['disqus_shortname'])): ?>
                - 
                <a href="<?= $conf['site_url'] . $page['permalink'] ?>#disqus_thread">Comment</a>
            <? endif; ?>
        </p>
    <? endif; ?>
</article>