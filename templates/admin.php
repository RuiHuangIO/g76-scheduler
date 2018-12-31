<div class="wrap">
  <h1>haHAA from template</h1>
  <?php settings_errors(); ?>

  <form method="post" action="options.php">
    <?php
    settings_fields('the_plug_options_group');
    do_settings_sections('the_plug');
    submit_button();
    ?>
  </form>
</div>

