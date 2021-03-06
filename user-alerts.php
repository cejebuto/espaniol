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
                    <h2><?php _e('Sus alertas', 'twitter') ; ?></h2>
                </div>
            </div>
            <?php if(osc_count_alerts() == 0) { ?>
            <div class="row">
                <div class="span16 columns">
                    <h4><?php _e("Usted no tiene ninguna alerta aún", 'twitter') ; ?></h4>
                </div>
            </div>
            <?php } else { ?>
                <?php while(osc_has_alerts()) { ?>
                <div class="row">
                    <div class="span15 columns offset1">
                        <h4><?php _e("Alerta", 'twitter') ; ?><small> &middot; <a onclick="javascript:return confirm('<?php _e("Esta acción no se puede deshacer. ¿Está seguro que desea continuar?", 'twitter') ; ?>');" href="<?php echo osc_user_unsubscribe_alert_url() ; ?>"><?php _e('Eliminar esta alerta', 'twitter') ; ?></a></small></h4>
                    </div>
                </div>
                    <?php while(osc_has_items()) { ?>
                    <div class="row item-alert">
                        <div class="span14 columns offset2">
                            <h6><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title() ; ?></a></h6>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>