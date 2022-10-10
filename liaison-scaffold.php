<?php
/**
 * Plugin Name:       Liaison Scaffold
 * Plugin URI:        https://liaison.com
 * Description:       Empty plugin to use as a starting point for Liaison plugins.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Anthony Talarico
 * Author URI:        https://astalarico.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       liaison-scaffold
 * Domain Path:       /languages
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/defines.php';

use \Liaison\Scaffold\Doctrine\ORM\EntityManager;
use \Liaison\Scaffold\Doctrine\ORM\Tools\Setup;
use \Liaison\Scaffold\Doctrine\DBAL\DriverManager;
use \Liaison\Scaffold\Doctrine\Migrations\Configuration\Migration\PhpFile;
use \Liaison\Scaffold\Doctrine\Migrations\DependencyFactory;
use \Liaison\Scaffold\Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Liaison\Scaffold\Composer\InstalledVersions;

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$params = array(
    'dbname'   => DB_NAME,
    'user'     => DB_USER,
    'password' => DB_PASSWORD,
    'host'     => DB_HOST,
    'driver'   => 'mysqli',
    
);
$connection = DriverManager::getConnection($params);

$config = Setup::createAttributeMetadataConfiguration( array( __DIR__ . '/entities' ), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader );
$entity_manager = EntityManager::create( $params , $config);

$migrations_config = new PhpFile(__DIR__ . '/database/migrations-config.php');
$schema_manager = $connection->getSchemaManager();
$columns = $schema_manager->listTableColumns('wp_options');

foreach ($columns as $column) {
    print_r( $column->getName() );
}