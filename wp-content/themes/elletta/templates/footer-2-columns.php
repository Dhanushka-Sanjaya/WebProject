<div id="footer-widget-area" class="footer">	
        <div class="container clearfix two-column">
                <div class="widget-columns">
                        <?php
                        if ( is_active_sidebar( 'footer-1' ) ) {
                                dynamic_sidebar( 'footer-1' );
                        }
                        ?>
                </div>
                <div class="widget-columns last">
                        <?php
                        if ( is_active_sidebar( 'footer-2' ) ) {
                                dynamic_sidebar( 'footer-2' );
                        }
                        ?>
                </div>
        </div>
</div>

