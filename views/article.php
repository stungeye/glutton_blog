<article>
    <?php  if (isset($page['permalink'])): ?>
        <h2><a href="<?php echo  $conf['site_url'] . $page['permalink'] ?>"><?php echo  $page['title'] ?></a></h2>
    <?php  else: ?>
        <h2><?php echo  $page['title'] ?></h2>
    <?php  endif; ?>
    <?php echo  $page['content'] ?>
    <?php  if (isset($page['permalink'])): ?>
        <p class="postinfo">
            <a href="<?php echo  $conf['site_url'] . $page['permalink'] ?>"><?php echo  $page['date'] ?></a>
            <?php  if(isset($conf['disqus_shortname'])): ?>
                - 
                <a href="<?php echo  $conf['site_url'] . $page['permalink'] ?>#disqus_thread">Comment</a>
            <?php  endif; ?>
        </p>
    <?php  endif; ?>
</article>