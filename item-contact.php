<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()) ; ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php') ; ?>
        <div class="container">
            <div class="contact">
                <?php twitter_show_flash_message() ; ?>
            </div>
            <?php echo twitter_breadcrumb('&raquo;') ; ?>
            <div class="contact well">
                <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" onsubmit="return doItemContact();" >
                    <?php ContactForm::primary_input_hidden() ; ?>
                    <?php ContactForm::action_hidden() ; ?>
                    <?php ContactForm::page_hidden() ; ?>
                    <fieldset>
                        <legend><?php _e('Póngase en contacto con el vendedor', 'twitter') ; ?></legend>
                        <div class="clearfix">
                            <label><?php _e('Para', 'twitter') ; ?></label>
                            <div class="input">
                                <span class="inline-help padding-top">
                                    <?php echo osc_item_contact_name() ; ?>
                                </span>
                            </div>
                        </div>
                        <div class="clearfix">
                            <label><?php _e('Artículo', 'twitter') ; ?></label>
                            <div class="input">
                                <span class="inline-help padding-top">
                                    <a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title() ; ?></a>
                                </span>
                            </div>
                        </div>
                        <div class="clearfix">
                            <label for="contact-yourName"><?php _e('Su nombre', 'twitter') ; ?> *</label>
                            <div class="input">
                                <input class="xlarge contact-yourName" type="text" value="<?php echo osc_logged_user_name() ; ?>" name="yourName" id="contact-yourName">
                            </div>
                        </div>
                        <div class="clearfix">
                            <label for="contact-yourEmail"><?php _e('Tu e-mail', 'twitter') ; ?> *</label>
                            <div class="input">
                                <input class="xlarge contact-yourEmail" type="text" value="<?php echo osc_logged_user_email() ; ?>" name="yourEmail" id="contact-yourEmail">
                            </div>
                        </div>
                        <div class="clearfix">
                            <label for="contact-phoneNumber"><?php _e('Celular/Telefono', 'twitter') ; ?> *</label>
                            <div class="input">
                                <input class="xlarge contact-phoneNumber" type="text" value="" name="phoneNumber" id="contact-phoneNumber">
                            </div>
                        </div>
                        <div class="clearfix">
                            <label for="contact-message"><?php _e('Mensaje', 'twitter') ; ?> *</label>
                            <div class="input">
                                <textarea class="xlarge contact-message" id="contact-message" name="message" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="clearfix">
                            <?php osc_show_recaptcha(); ?>
                        </div>
                        <div class="actions">
                            <button class="btn" type="submit"><?php _e('Enviar mensaje', 'twitter') ; ?></button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            var text_error_required = '<?php _e('Este campo es obligatorio', 'twitter') ; ?>' ;
            var text_valid_email    = '<?php _e('Introduzca una dirección e-mail válida', 'twitter') ; ?>' ;
        </script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('item_contact.js') ; ?>"></script>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>