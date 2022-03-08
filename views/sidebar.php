<aside id="sidebar">
    <section id="about">
        <h3>About</h3>
        <p><?php echo  $conf['about_snippet'] ?> <a href="<?php echo  $conf['site_url'] ?>/about" class="more">Find out more &raquo;</a></p>
    </section>

    <section id="google_sidebar">
        <script type="text/javascript"><!--
        google_ad_client = "ca-pub-8119657288856342";
        /* Html5 Blog Side Square */
        google_ad_slot = "7040032816";
        google_ad_width = 250;
        google_ad_height = 250;
        //-->
        </script>
        <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
    </section>
    
    <section id="latest">
        <h3>Latest Posts</h3>
        <ul>
            <?php  foreach($latest_posts as $latest_post): ?>
              <li><a href="<?php echo  $conf['site_url'] . $latest_post['permalink'] ?>"><?php echo  $latest_post['title'] ?></a></li>
            <?php  endforeach; ?>
        </ul>
    </section>
    
    <?php  if (isset($conf['sidebar_links'])): ?>
        <section id="links">
            <h3>Social Links &amp; Other Projects</h3>
            <ul>
            <?php  foreach ($conf['sidebar_links'] as $title => $link): ?>
                <li><a href="<?php echo  $link ?>"><?php echo  $title ?></a></li>
            <?php  endforeach; ?>
            </ul>
        </section>
    <?php  endif; ?>
    
    <?php  if (is_home_page()): ?>
        <section id="google_sidebar">
            <script type="text/javascript"><!--
            google_ad_client = "ca-pub-8119657288856342";
            /* Html5 Blog Side */
            google_ad_slot = "9504934000";
            google_ad_width = 160;
            google_ad_height = 600;
            //-->
            </script>
            <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>
        </section>
    <?php  endif; ?>
    
    <section id="twitter_widget">
        <h3>Follow Me on Twitter</h3>
        <div style="margin-left: -8px;">
        <a class="twitter-timeline" href="https://twitter.com/html5mob" data-widget-id="567774008490221568">Tweets by @html5mob</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
    </section>
</aside>