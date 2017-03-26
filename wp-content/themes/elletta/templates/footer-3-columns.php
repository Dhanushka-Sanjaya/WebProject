<div id="footer-widget-area" class="footer">	
        <div class="container clearfix three-column">
                <div class="widget-columns">
                        <?php
                        if ( is_active_sidebar( 'footer-1' ) ) {
                                dynamic_sidebar( 'footer-1' );
                        }
                        ?>
                </div>
                <div class="widget-columns">
                        <?php
                        if ( is_active_sidebar( 'footer-2' ) ) {
                                dynamic_sidebar( 'footer-2' );
                        }
                        ?>
                </div>
                <div class="widget-columns last">
                        <?php
                        if ( is_active_sidebar( 'footer-3' ) ) {
                                dynamic_sidebar( 'footer-3' );
                        }
                        ?>
                </div>
        </div>
</div>

