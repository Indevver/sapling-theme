<?php
use Sapling\Plugin\ACF\PageBuilder;
use Sapling\Theme;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__.'/../.env');

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../includes/theme-requirements.php';
require_once __DIR__.'/../includes/timber.php';
require_once __DIR__.'/../includes/builder.php';

$theme = new Theme();
$pageBuilder = new PageBuilder();
