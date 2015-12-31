<?php

/**
 * 载入主题目录下 /functions 目录的所有 PHP 文件 
 */
foreach ( glob( get_template_directory() . '/functions/*.php' ) as $filename ) {
	require $filename;
}
	require get_template_directory() . '/ajax-comment/main.php';
