<?php 
namespace Liaison\Scaffold;

use GLM\Sessions\TableBuilder;

/**
 * Class: Tables
 *
 * Setup for the Plugin tables.
 *
 * @see TableBuilder
 */
class Tables extends TableBuilder{

    /**
     * Class Constructor
     *
     * Build the tables variable for defining the database tables.
     * 'table_name' => 'table creation sql'
     */
    public function __construct(){

        $this->tables = array(
            'settings'               =>
                'id INT NOT NULL AUTO_INCREMENT,
                opentok_key TINYTEXT NULL,
                opentok_secret TINYTEXT NULL,
                activity_verification_title TEXT NOT NULL,
                activity_verification_message TEXT NOT NULL,
                activity_verification_button_text TINYTEXT NOT NULL,
                require_authentication BOOLEAN NOT NULL,
                PRIMARY KEY  (id)',
            'sessions'               =>
                'id INT NOT NULL AUTO_INCREMENT,
                created_at DATETIME NOT NULL,
                updated_at TIMESTAMP NOT NULL,
                session_key TINYTEXT NOT NULL,
                slug TINYTEXT NOT NULL,
                post_id SMALLINT NOT NULL,
                PRIMARY KEY  (id)',
            'users'                  =>
                'id INT NOT NULL AUTO_INCREMENT,
                created_at DATETIME NOT NULL,
                updated_at TIMESTAMP NOT NULL,
                display_name TINYTEXT NOT NULL,
                client_id TINYTEXT NULL,
                connection_id TINYTEXT NULL,
                wp_user BOOLEAN NULL DEFAULT 0,
                PRIMARY KEY  (id)',
            'messages'               =>
                'id INT NOT NULL AUTO_INCREMENT,
                created_at DATETIME NOT NULL,
                updated_at TIMESTAMP NOT NULL,
                user_id TINYTEXT NOT NULL,
                session_id INT NOT NULL,
                client_id TINYTEXT NOT NULL,
                file_url TEXT NULL,
                flagged BOOLEAN NOT NULL DEFAULT 0,
                message TEXT NULL,
                PRIMARY KEY  (id)',
            'session_users'          =>
                'id INT NOT NULL AUTO_INCREMENT,
                created_at DATETIME NOT NULL,
                session_id INT NOT NULL,
                user_id INT NOT NULL,
                user_active BOOLEAN NOT NULL DEFAULT 0,
                user_verified_activity BOOLEAN NOT NULL DEFAULT 0,
                user_participant BOOLEAN NULL DEFAULT 0,
                user_has_participated BOOLEAN NULL DEFAULT 0,
                user_blocked BOOLEAN NULL DEFAULT 0,
                PRIMARY KEY  (id)',
            'participation_requests' =>
                'id INT NOT NULL AUTO_INCREMENT,
                created_at DATETIME NOT NULL,
                updated_at TIMESTAMP NOT NULL,
                user_id INT NULL,
                approved BOOLEAN NULL DEFAULT 0,
                approved_by INT NULL,
                session_id INT NULL,
                PRIMARY KEY  (id)',
            'guest_users'            =>
                'id INT NOT NULL AUTO_INCREMENT,
                created_at DATETIME NOT NULL,
                client_id TEXT NOT NULL,
                user_login TEXT NOT NULL,
                PRIMARY KEY  (id)',
            'user_activity'          =>
                'id INT NOT NULL AUTO_INCREMENT,
                created_at DATETIME NOT NULL,
                updated_at TIMESTAMP NOT NULL,
                user_id INT NULL,
                post_id INT NULL,
                type INT NOT NULL,
                PRIMARY KEY  (id)',
            'activity_types'         =>
                'id INT NOT NULL AUTO_INCREMENT,
                code TINYINT NOT NULL,
                description TEXT NOT NULL,
                label TEXT NULL,
                PRIMARY KEY  (id)',
        );
        $this->glm_sessions_db_update_check();
    }
}

