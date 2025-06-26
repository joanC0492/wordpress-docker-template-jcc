<?php
/**
 * Plugin Name: Mi Blog Config
 * Description: Configuraciones básicas para el blog.
 * Version: 1.0
 * Author: Joan C
 */

// Crear menú en admin
add_action('admin_menu', function () {
  add_options_page('Config Blog', 'Config Blog', 'manage_options', 'miblog-config', 'miblog_config_page');
});

// Mostrar formulario
function miblog_config_page()
{
  ?>
  <div class="wrap">
    <h1>Configuración del Blog</h1>
    <form method="post" action="options.php">
      <?php
      settings_fields('miblog_options');
      do_settings_sections('miblog-config');
      submit_button();
      ?>
    </form>
  </div>
  <?php
}

// Registrar ajustes
add_action('admin_init', function () {
  register_setting('miblog_options', 'miblog_autor');
  register_setting('miblog_options', 'miblog_bienvenida');

  add_settings_section('miblog_main', 'Ajustes Básicos', null, 'miblog-config');

  add_settings_field('miblog_autor', 'Autor del blog', function () {
    echo '<input type="text" name="miblog_autor" value="' . esc_attr(get_option('miblog_autor')) . '" />';
  }, 'miblog-config', 'miblog_main');

  add_settings_field('miblog_bienvenida', 'Mensaje de bienvenida', function () {
    echo '<textarea name="miblog_bienvenida">' . esc_textarea(get_option('miblog_bienvenida')) . '</textarea>';
  }, 'miblog-config', 'miblog_main');
});