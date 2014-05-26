        </div>
        <footer id="foot">
            <div class="wrapper">
                <div id="emptydiv">
                    <h5 class="footer-title">Kontakt Info</h5>
                    
                </div>
                <div id="contact">
                    <h5 class="footer-title">Kontakta Mig</h5>
                    <?php echo do_shortcode( '[contact-form-7 id="1234" title="Contact form 1"]' ); ?>
                </div>
                <div id="socialfeed">
                    <h5 class="footer-title">Senaste Tweets</h5>
                    <div class="tweet"></div>
                </div>
                <div id="copyright">
                    <p>© <?php echo date("Y") ?> <?php bloginfo('name'); ?></p>
                </div>
            </div>
        </footer>
        
        <?php wp_footer(); ?>
    </body>
</html>