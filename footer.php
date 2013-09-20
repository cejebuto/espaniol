<!-- footer -->
<?php osc_show_widgets('footer'); ?>
<div class="footer-line">
<div class="container footer">
    <div class="row">
        <div class="span16 columns">
            <a href="<?php echo osc_contact_url(); ?>"><?php _e('Contact', 'twitter') ; ?></a> &middot;
            <?php _e('Este sitio web está gestionado por <a title="OSClass web" href="http://osclass.org/">open source classifieds</a> software <strong>OSClass</strong> y <a href="http://twitter.github.com/bootstrap/">twitter bootstrap</a>', 'twitter') ; ?>.
        </div>
    </div>
</div>
</div>
<!-- footer end -->
<?php osc_run_hook('footer') ; ?>