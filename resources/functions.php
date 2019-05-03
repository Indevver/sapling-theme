<?php
use Sapling\ACF\PageBuilder;
use Sapling\Theme;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../includes/theme-requirements.php';
require_once __DIR__.'/../includes/timber.php';
require_once __DIR__.'/../includes/builder.php';
require_once __DIR__.'/../includes/shortcodes.php';
require_once __DIR__.'/../includes/filters.php';
require_once __DIR__.'/../includes/actions.php';

$theme = new Theme();
$pageBuilder = new PageBuilder();
