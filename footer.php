        <div id="peoplequotes">
          <?php echo do_shortcode("[bne_testimonials_list post='1' order='rand' image='false' class='testim' category='testimonials']"); ?>
        </div><!--#peoplequotes--> 
        <div class="push">
        </div><!--.push-->
    </div><!-- #contentwrapper -->    
    <div id="footer">
        <div id="foothold1">
            <div id="foothold2">
                <div id="colophon">
                    <div id="site-info">
                    <?php echo do_shortcode("[bne_testimonials_list post='1' order='rand' image='false' name='false' class='testim' category='tips']"); ?>
                    </div><!-- #site-info -->
                    <div id="site-footer">
                        Efficient | Reliable | Quality
                    </div><!--#site-footer-->
                </div><!-- #colophon -->
            </div><!-- #foothold2 -->
        </div><!-- #foothold1 -->
    </div><!-- #footer -->
</div><!--#wrapper-->
<?php wp_footer(); ?>

</body>
</html>