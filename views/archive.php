<?php  foreach($pages as $page): ?>
    <article class="archives">
        <h2><a href="<?php echo  $conf['site_url'] . $page['permalink'] ?>"><?php echo  $page['title'] ?></a></h2>
        <div class="postinfo">
            <p><?php echo  $page['date'] ?></p>
            <p><a href="<?php echo  $conf['site_url'] . $page['permalink'] ?>">Read Full Post &raquo;</a></p>
        </div>
    </article>
<?php  endforeach; ?>