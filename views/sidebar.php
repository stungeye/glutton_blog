<aside id="sidebar">
    <section id="about">
        <h3>About</h3>
        <p><?= $conf['about_snippet'] ?> <a href="<?= $conf['site_url'] ?>/about" class="more">Find out more &raquo;</a></p>
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
            <? foreach($latest_posts as $latest_post): ?>
              <li><a href="<?= $conf['site_url'] . $latest_post['permalink'] ?>"><?= $latest_post['title'] ?></a></li>
            <? endforeach; ?>
        </ul>
    </section>
    
    <? if (isset($conf['sidebar_links'])): ?>
        <section id="links">
            <h3>Social Links &amp; Other Projects</h3>
            <ul>
            <? foreach ($conf['sidebar_links'] as $title => $link): ?>
                <li><a href="<?= $link ?>"><?= $title ?></a></li>
            <? endforeach; ?>
            </ul>
        </section>
    <? endif; ?>
    
    <? if (is_home_page()): ?>
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
    <? endif; ?>
</aside>