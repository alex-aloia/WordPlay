<?php


/* -------------------------->
// DEBUG OPTIONS
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
define('SAVEQUERIES', true);
< -------------------------- */

/* ---------------------------------------------------------------------------------------------------------------->
  Depending on your server configuration, you may find WordPress fails to find your content (themes and plugins).
  This is due to how your server returns `$_SERVER['DOCUMENT_ROOT']`. If this issue affects you, try swapping
  for the `dirname(__FILE__)` method below.
 <---------------------------------------------------------------------------------------------------------------- */

{% if project.env != 'prod' %}
{% set domain = project.env + '.' %}
define('WP_HOME','http://{{ domain | default('') }}{{ project.home_url }}');
define('WP_SITEURL','http://{{ domain | default('') }}{{project.home_url}}/wordpress');
define('WP_CONTENT_URL', 'http://{{ domain | default('') }}{{ project.home_url }}/content');
{% endif %}

{% if project.env == 'prod' %}
define('WP_HOME','http://{{ project.home_url }}');
define('WP_SITEURL','http://{{project.home_url}}/wordpress');
define('WP_CONTENT_URL', 'http://{{ project.home_url }}/content');
{% endif %}


define('WP_ENV', '{{project.env}}');


define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/content' );

// if the above fails, use this instead
//define('WP_CONTENT_DIR', realpath($_SERVER['DOCUMENT_ROOT'] . '/content'));

define('DB_NAME', '{{project.env}}_{{project.name}}');
define('DB_USER', '{{ deploy_user }}');
define('DB_PASSWORD', '{{ project.db_pass }}');

define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('WPLANG', '');
$table_prefix  = 'wp_';

define( 'WP_DEFAULT_THEME', '{{project.theme.name}}' );

// SALTS GO HERE
{{ wp_salt.stdout }}



if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

{% if project.auto_update == true %}
define( 'AUTOMATIC_UPDATER_DISABLED', false );
{% else %}
define( 'AUTOMATIC_UPDATER_DISABLED', true );
{% endif %}








