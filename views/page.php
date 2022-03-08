<?php  require 'article.php' ?>
<div id="google_above_comments">
    <script type="text/javascript"><!--
        google_ad_client = "ca-pub-8119657288856342";
        /* Html5 Blog Above Comments */
        google_ad_slot = "7686170193";
        google_ad_width = 468;
        google_ad_height = 60;
        //-->
        </script>
        <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
</div>
<?php  if(isset($conf['disqus_shortname'])): ?>
    <div id="disqus_thread"></div>
    <script type="text/javascript">
    var disqus_shortname = '<?php echo  $conf['disqus_shortname'] ?>';
    
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
    </script>
<?php  endif; ?>