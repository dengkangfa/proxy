<?php

/**
* Send a POST requst using cURL
* @param string $url to request
* @param array $post values to send
* @param array $options for cURL
* @return string
*/
function curl_post($url, $post = NULL,$header = array(), array $options = array())
{
    $defaults = array(
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url,
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 4,
        //CURLOPT_POSTFIELDS => http_build_query($post),
        CURLOPT_POSTFIELDS => $post,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_HTTPHEADER => $header
    );

    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
    	p(curl_error($ch));
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
}

/**
* Send a GET requst using cURL
* @param string $url to request
* @param array $get values to send
* @param array $options for cURL
* @return string
*/
function curl_get($url, $get = NULL,$header = array(), $options = array())
{
    $defaults = array(
        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 4,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_HTTPHEADER => $header
    );
    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
}
?>