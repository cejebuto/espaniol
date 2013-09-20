<?php $aLocales = osc_get_locales() ; ?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()) ; ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
        <script type="text/javascript">
            twitter_theme.text_select_subcategory = "<?php _e('Seleccione una subcategoría ...', 'twitter') ; ?>" ;
            twitter_theme.category_selected_id    = "<?php echo item_selected_category_id() ; ?>" ;
            twitter_theme.subcategory_selected_id = "<?php echo item_selected_subcategory_id() ; ?>" ;
            twitter_theme.max_number_photos       = <?php echo osc_max_images_per_item() ; ?> ;
            twitter_theme.photo_remove_text       = "<?php _e('Eliminar', 'twitter') ; ?>" ;
            twitter_theme.max_images_fields_txt   = "<?php _e('Lo sentimos, usted ha alcanzado el límite máximo de imágenes por anuncio',  'twitter') ; ?>" ;
            twitter_theme.country_select_id       = "<?php echo get_country_id((osc_item() != null) ? osc_item() : array()) ; ?>" ;
            twitter_theme.region_select_id        = "<?php echo get_region_id((osc_item() != null) ? osc_item() : array()) ; ?>" ;
            twitter_theme.city_select_id          = "<?php echo get_city_id((osc_item() != null) ? osc_item() : array()) ; ?>" ;
            twitter_theme.ajax_url                = "<?php echo osc_base_url(true) . '?page=ajax' ; ?>" ;
            twitter_theme.text_select_country     = "<?php _e('Seleccione un país ...', 'twitter') ; ?>" ;
            twitter_theme.text_select_region      = "<?php _e('Seleccione una región ...', 'twitter') ; ?>" ;
            twitter_theme.text_select_city        = "<?php _e('Seleccione una ciudad ...', 'twitter') ; ?>" ;
            twitter_theme.text_no_regions         = "<?php _e('No hay zonas disponibles', 'twitter') ; ?>" ;
            twitter_theme.text_no_cities          = "<?php _e('No hay ciudades disponibles', 'twitter') ; ?>" ;
            twitter_theme.page                    = "edit" ;
            twitter_theme.item_id                 = "<?php echo osc_item_id() ; ?>" ;
            twitter_theme.delete_photo_txt        = "<?php _e('Esta acción no se puede deshacer. ¿Está seguro que desea continuar?', 'twitter') ; ?>";
        </script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('bootstrap-tabs.js') ; ?>"></script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('item_form.js') ; ?>"></script>
        <?php item_category_select_js() ; ?>
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php') ; ?>
        <div class="container margin-top-10">
            <?php twitter_show_flash_message() ; ?>
        </div>
        <div class="container item-edit">
            <?php echo twitter_breadcrumb('&raquo;') ; ?>
            <div class="row">
                <div class="span16 columns">
                    <form class="well" name="item" action="<?php echo osc_base_url(true) ; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="item_edit_post" />
                        <input type="hidden" name="page" value="item" />
                        <input type="hidden" name="id" value="<?php echo osc_item_id() ; ?>" />
                        <input type="hidden" name="secret" value="<?php echo osc_item_secret() ; ?>" />
                        <fieldset>
                            <h1><?php _e('Actualizar su artículo', 'twitter') ; ?></h1>
                            <!-- category input -->
                            <div class="clearfix">
                                <label><?php _e('Categoría', 'twitter') ; ?></label>
                                <div class="input">
                                    <?php item_category_select( __('Seleccione una categoría ...', 'twitter') ) ; ?>
                                </div>
                            </div>
                            <!-- category input end -->
                            <!-- title and description -->
                            <div class="clearfix">
                                <?php if( count($aLocales) > 1 ) { ?>
                                    <?php item_title_description_multilanguage_box(__('Título', 'twitter'), __('Descripción', 'twitter'), $aLocales) ; ?>
                                <?php } else { ?>
                                    <?php item_title_description_box(__('Título', 'twitter'), __('Descripción', 'twitter'), $aLocales) ; ?>
                                <?php } ?>
                            </div>
                            <!-- title and description end -->
                            <?php if( osc_price_enabled_at_items() ) { ?>
                                <!-- price -->
                                <div class="clearfix">
                                    <label for="price"><?php _e('Precio', 'twitter') ; ?></label>
                                    <div class="input">
                                        <?php item_price_input( ) ; ?>
                                        <?php item_currency_select( ) ; ?>
                                        <span class="help-block">
                                            <?php _e("<strong>Nota:</strong> Si usted no esta seguro del costo, introduzca un precio de 0. Si no desea publicar el precio, deje vacio el campo", 'twitter') ; ?>
                                        </span>
                                    </div>
                                </div>
                                <!-- price end -->
                            <?php } ?>
                            <?php if( osc_images_enabled_at_items() ) { ?>
                                <!-- photo -->
                                <h3><?php _e('Fotos', 'twitter') ; ?></h3>
                                <div class="clearfix photos">
                                    <?php 
                                        $resources = osc_get_item_resources();
                                        if( $resources != null && is_array($resources) && count($resources) > 0) { ?>
                                            <ul class="media-grid">
                                            <?php foreach($resources as $r) { ?>
                                            <li id="<?php echo $r['pk_i_id'] ; ?>" fkid="<?php echo $r['fk_i_item_id'] ; ?>" name="<?php echo $r['s_name'] ; ?>">
                                                <a href="javascript://">
                                                    <img class="thumbnail quimby_search_image" src="<?php echo osc_base_url() . $r['s_path'] . $r['pk_i_id'] . '_thumbnail.' . $r['s_extension'] ; ?>" />
                                                </a>
                                                <span>
                                                    <a class="btn danger" href="javascript:delete_image(<?php echo $r['pk_i_id'] . ", " . $r['fk_i_item_id'] . ", '" . $r['s_name'] . "', '" . Params::getParam('secret') . "'" ; ?>);" class="delete"><?php _e('Borrar', 'twitter') ; ?></a>
                                                </span>
                                            </li>
                                            <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    <?php if(osc_max_images_per_item()==0 || (osc_max_images_per_item()!=0 && osc_count_item_resources()<  osc_max_images_per_item())) { ?>
                                    <div class="input input-file">
                                        <input type="file" name="photos[]" />
                                    </div>
                                    <?php } ?>
                                    <div class="more-photos">
                                    </div>
                                    <div class="input">
                                        <a href="javascript://" onclick="return add_photo_field();"><?php _e('Añadir nueva foto', 'modern'); ?></a>
                                    </div>
                                </div>
                                <!-- photo end -->
                            <?php } ?>
                            <!-- location -->
                            <h3><?php _e('Ubicación', 'twitter') ?></h3>
                            <?php item_country_box(__("Country", "twitter"), __("Select a country...", "twitter")) ; ?>
                            <?php item_region_box(__("Region", "twitter"), __("Select a region...", "twitter")) ; ?>
                            <?php item_city_box(__("City", "twitter"), __("Select a city...", "twitter")) ; ?>
                            <div class="clearfix">
                                <label for="cityArea"><?php _e('Barrio', 'twitter') ; ?></label>
                                <div class="input">
                                    <?php item_city_area( ) ; ?>
                                </div>
                            </div>
                            <div class="clearfix">
                                <label for="address"><?php _e('Dirección', 'twitter') ; ?></label>
                                <div class="input">
                                    <?php item_address( ) ; ?>
                                </div>
                            </div>
                            <!-- location end -->
                            <div class="clearfix">
                                <div id="plugin-hook"></div>
                            </div>
                            <?php if( osc_recaptcha_items_enabled() ) { ?>
                            <div class="clearfix">
                                <?php osc_show_recaptcha(); ?>
                            </div>
                            <?php } ?>
                            <div class="actions">
                                <button class="btn" type="submit"><?php _e('Actualizar', 'twitter') ; ?></button>
                                <a class="btn" href="javascript:history.back(-1)"><?php _e('Cancelar', 'twitter') ; ?></a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>