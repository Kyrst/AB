<?php
define('DEFAULT_PAGE_TITLE', 'ActingBio');
define('PAGE_TITLE_APPENDIX', 'ActingBio');
define('PAGE_TITLE_SEPARATOR', '-');

$public_path = public_path();
$public_path = !empty($public_path) ? $public_path . '/' : '';

define('BASE_URL', URL::route('home', array(), false));