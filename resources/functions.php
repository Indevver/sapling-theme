<?php

use GutenBlock\Accordion;
use GutenBlock\Gallery;
use GutenBlock\ModalBAP;
use GutenBlock\ModalForm;
use GutenBlock\PostGrid;
use GutenBlock\Sample;
use GutenBlock\Tabs;
use GutenBlock\Truncated;
use Sapling\Plugin\ACF\PageBuilder;
use Sapling\Theme;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__.'/../.env');

require_once __DIR__.'/../includes/theme-requirements.php';
require_once __DIR__.'/../includes/timber.php';

$theme = new Theme();
