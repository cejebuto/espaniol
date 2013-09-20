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
            <div class="margin-top-10">
                <?php echo twitter_breadcrumb('&raquo;') ; ?>
            </div>
            <div class="contact">
                <?php twitter_show_flash_message() ; ?>
            </div>
            <div class="contact well">
                <form action="<?php echo osc_base_url(true); ?>" method="post" >
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="login_post" />
                    <fieldset>
                        <legend><?php _e('Acceda a su cuenta', 'twitter') ; ?></legend>
                        <div class="clearfix">
                            <label for="email"><?php _e('Correo', 'twitter') ; ?> *</label>
                            <div class="input">
                                <input class="xlarge" type="text" value="" name="email" id="email">
                            </div>
                        </div>
                        <div class="clearfix">
                            <label for="password"><?php _e('Contraseña', 'twitter') ; ?> *</label>
                            <div class="input">
                                <input class="xlarge" type="password" value="" name="password" id="password">
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="input">
                                <ul class="inputs-list">
                                    <li>
                                      <label>
                                        <input type="checkbox" name="remember" value="remember">
                                        <span><?php _e('Recuérdame', 'twitter') ; ?></span>
                                      </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn" type="submit"><?php _e('Iniciar sesión', 'twitter') ; ?></button>
                        </div>
                        <div class="clearfix">
                            <div class="input">
                                <a href="<?php echo osc_register_account_url() ; ?>"><?php _e("Registrar una cuenta gratuita", 'twitter') ; ?></a> &middot; <a href="<?php echo osc_recover_user_password_url() ; ?>"><?php _e("¿Olvidó su contraseña?", 'twitter') ; ?></a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>