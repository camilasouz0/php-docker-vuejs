<?php

namespace Config;

define("DB_CONNECTION", "pgsql");
define("DB_HOST", "127.0.0.1");
define("DB_PORT", "5432");
define("DB_DATABASE", "softexpert");
define("DB_USERNAME", "postgres");
define("DB_PASSWORD", "postgres");

//site name
define('SITE_NAME', 'softexpert');

//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '');
define("VIEWS_PATH", "./../");