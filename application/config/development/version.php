<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['version_list'] = array();

$config['version_list']['android']['now'] = array(
		'version' => 8,
		'version_no' => '3.0.0',
		'update_info' => '',
		'android_download_url' => 'http://dev-kci.ffun360.com/site/download_test',
        'path' => "",
        'size' => '', //字节数
	);

$config['version_list']['android']['history'] = array(
    '3.0.0' => array(
        'version' => 8,
        'version_no' => '3.0.0',
        'update_info' => '',
        'android_download_url' => 'http://dev-kci.ffun360.com/site/download_test',
        'path' => "",
        'size' => '', //字节数
    ),
);

$config['version_list']['apple']['now'] = array(
        'version' => '3.17',
        'apple_download_url' => 'https://www.pgyer.com/SOV6',
);