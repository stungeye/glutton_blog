<? foreach ($pages as $page): ?>
    <? require 'article.php' ?>
<? endforeach; ?>
<p>
    <a href="<?= $conf['site_url'] ?>/archive">Read More In Our Archive &raquo;</a>
</p>