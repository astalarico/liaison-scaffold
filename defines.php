<?php
namespace Liaison\Scaffold\Defines;

global $wpdb;

define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ) . '/' );
define( __NAMESPACE__ . '\PLUGIN_DIR', __DIR__ . '/' );
define( __NAMESPACE__ . '\DB_PREFIX', $wpdb->prefix . 'liaison_' );
define( __NAMESPACE__ . '\PLUGIN_VERSION', '0.0.1' );
define( __NAMESPACE__ . '\SETTINGS_TABLE',  $wpdb->base_prefix  . 'options' );
define( __NAMESPACE__ . '\SESSIONS_TABLE', DB_PREFIX . 'sessions' );
define( __NAMESPACE__ . '\MESSAGES_TABLE', DB_PREFIX . 'messages' );
define( __NAMESPACE__ . '\ACTIVITY_TABLE', DB_PREFIX . 'user_activity' );
define( __NAMESPACE__ . '\ACTIVITY_TYPES_TABLE', DB_PREFIX . 'activity_types' );
define( __NAMESPACE__ . '\USERS_TABLE', $wpdb->base_prefix . 'users' );
define( __NAMESPACE__ . '\POSTS_TABLE', $wpdb->prefix . 'posts' );
define( __NAMESPACE__ . '\DB_VERSION', '0.0.1' );