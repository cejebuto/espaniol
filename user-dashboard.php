<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()) ; ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php') ; ?>
        <div class="container user">
            <div class="row">
                <div class="span16 columns">
                    <?php twitter_user_menu() ; ?>
                    <?php twitter_show_flash_message() ; ?>
                    <h2><?php printf(__('Últimos artículos de %s', 'twitter'), osc_logged_user_name()) ; ?></h2>
                </div>
            </div>
            <?php if(osc_count_items() == 0) { ?>
            <div class="row">
                <div class="span16 columns">
                    <h4><?php _e("Usted no tiene ningún artículo aún", 'twitter') ; ?></h4>
                </div>
            </div>
            <?php } else { ?>
                <?php while( osc_has_items() ) { ?>
                <div class="row">
                    <div class="span16 columns">
                        <h4><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></h4>
                        <p class="gray"><?php printf(__('<strong>Fecha de publicación</strong>: %s', 'twitter'), osc_format_date( osc_item_pub_date() ) ) ; ?></p>
                        <?php
                            $location = array() ;
                            if( osc_item_country() != '' ) {
                                $location[] = sprintf( __('<strong>País</strong>: %s', 'twitter'), osc_item_country() ) ;
                            }
                            if( osc_item_region() != '' ) {
                                $location[] = sprintf( __('<strong>Departamento</strong>: %s', 'twitter'), osc_item_region() ) ;
                            }
                            if( osc_item_city() != '' ) {
                                $location[] = sprintf( __('<strong>Ciudad</strong>: %s', 'twitter'), osc_item_city() ) ;
                            }
                            if( count($location) > 0) {
                        ?>
                        <p class="gray"><?php echo implode(' &middot; ', $location) ; ?></p>
                        <?php } ?>
                        <p><?php echo osc_highlight( strip_tags( osc_item_description() ) ) ; ?></p>
                        <p>
                            <strong><a href="<?php echo osc_item_edit_url(); ?>"><?php _e('Editar', 'twitter') ; ?></a></strong>
                            &middot;
                            <a class="delete" onclick="javascript:return confirm('<?php _e('Esta acción no se puede deshacer. ¿Está seguro que desea continuar?', 'twitter') ; ?>')" href="<?php echo osc_item_delete_url() ; ?>" ><?php _e('Borrar', 'twitter') ; ?></a>
                            <?php if( osc_item_is_inactive() ) { ?>
                            &middot;
                            <a href="<?php echo osc_item_activate_url() ; ?>" ><?php _e('Activar', 'twitter') ; ?></a>
                            <?php } ?>
                        </p>
                    </div>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>