<?php

{% if env != 'prod' %}
{% set domain = env + '.' %}
{% endif %}

/* -------------------------->
// DEBUG OPTIONS
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
define('SAVEQUERIES', true);
< -------------------------- */

//define('WP_ENV', 'development');
define('WP_HOME','http://{{ domain | default('') }}{{ wp_home_url }}');
define('WP_SITEURL','http://{{ domain | default('') }}{{ wp_home_url }}/wordpress');

define('DB_NAME', '{{env}}_{{wp_project_name}}');
define('DB_USER', '{{ deploy_user }}');
define('DB_PASSWORD', '{{ wp_db_pass }}');

define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('WPLANG', '');
$table_prefix  = 'wp_';

// SALTS GO HERE
{{ wp_salt.stdout }}

/* ---------------------------------------------------------------------------------------------------------------->
  Depending on your server configuration, you may find WordPress fails to find your content (themes and plugins).
  This is due to how your server returns `$_SERVER['DOCUMENT_ROOT']`. If this issue affects you, try swapping
  for the `dirname(__FILE__)` method below.
 <---------------------------------------------------------------------------------------------------------------- */

define('WP_CONTENT_URL', 'http://{{ domain | default('') }}{{ wp_home_url }}/content');
define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/content' );
//define('WP_CONTENT_DIR', realpath($_SERVER['DOCUMENT_ROOT'] . '/content'));

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');


/** Disable Automatic Updates Completely */
define( 'AUTOMATIC_UPDATER_DISABLED', {{auto_up_disable}} );







