<script type="text/javascript">
    $(document).ready(function() {
        $(".alert-button").bind('click', function() {
            $.post("<?php echo osc_base_url(true); ?>", { email: $("#alert_email").val(), userid: $("#alert_userId").val(), alert: $("#alert").val(), page: "ajax", action: "alerts" }, 
                function(data) {
                    if(data == 1) {
                        alert("<?php _e('Se ha suscrito con éxito a la alerta', 'modern') ; ?>") ; 
                    } else if(data == -1) { 
                        alert("<?php _e('Dirección de correo electrónico no válida', 'twitter') ; ?>") ; 
                    } else {
                        alert("<?php _e('Ocurrió un problema con la alerta', 'twitter') ; ?>") ;
                    }
                }
            );
            return false;
        }) ;
    }) ;
</script>
<h4><?php _e('Suscribirse a esta búsqueda', 'twitter') ; ?></h4>
<form action="<?php echo osc_base_url(true); ?>" method="post" name="sub_alert" id="sub_alert">
    <fieldset>
        <?php AlertForm::page_hidden() ; ?>
        <?php AlertForm::alert_hidden() ; ?>
        <?php if( osc_is_web_user_logged_in() ) { ?>
            <?php AlertForm::user_id_hidden() ; ?>
            <?php AlertForm::email_hidden() ; ?>
        <?php } else { ?>
            <?php AlertForm::user_id_hidden() ; ?>
            <input id="alert_email" type="text" name="alert_email" value="">
        <?php } ?>
        <button type="submit" class="btn alert-button" ><?php _e('Suscríbase ahora!', 'twitter') ; ?></button>
    </fieldset>
</form>