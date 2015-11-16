        <footer>
            <?php
                global $wp_customize;

                $are_active_sidebras =  is_active_sidebar( 'footer-first' ) ||
                                        is_active_sidebar( 'footer-second' ) ||
                                        is_active_sidebar( 'footer-third' );

                $items_class = '';

                /* WP CUSTOMIZE */
                if( isset( $wp_customize ) ){
                    $items = true;
                    $items_class = !($are_active_sidebras || (bool)mythemes_mod( 'default-content', true ) ) ? 'hidden' : '';
                }

                /* FRONTEND */
                else{
                    $items = $are_active_sidebras || (bool)mythemes_mod( 'default-content', true );
                }
                
                if( $items ){
            ?>
                    <aside class="mythemes-default-content <?php echo esc_attr( $items_class ); ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <?php get_sidebar( 'footer-first' ); ?>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                    <?php get_sidebar( 'footer-second' ); ?>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                    <?php get_sidebar( 'footer-third' ); ?>
                                </div>
                            </div>
                        </div>
                    </aside>
            <?php
                }
            ?>

            <div class="mythemes-black-side">
                <div class="container mythemes-copyright">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                           <p>Text me @ 828.275.7744</p>
                        </div>
                        <?php
                            if( isset( $wp_customize ) ) {
                                  $facebook   = esc_url( mythemes_mod( 'facebook', 'https://www.facebook.com/will.thibodeau.33' ) );
                                
                                 $fb_class   = empty( $facebook ) ? 'hidden' : '';
                               
                                 $facebook   = empty( $facebook ) ? esc_url( home_url() ) : $facebook;
                                 }
                            else{
                                $facebook   = esc_url( mythemes_mod( 'facebook', 'https://www.facebook.com/will.thibodeau.33' ) );
                               
                               
                                $fb_class   = '';
                            }
                        ?>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="mythemes-social">
                                <?php
                                    
                                    if( !empty( $facebook ) ){
                                        echo '<a href="' . esc_url( $facebook ) . '" class="icon-facebook ' . esc_attr( $fb_class ) . '" target="_blank"></a>';
                                    }
                                    
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <?php wp_footer(); ?>

    </body>
</html>