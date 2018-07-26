<?php

class Request extends CI_Controller
{
    protected function get_request_header()
    {
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        $header_joins = [];
        foreach ($headers as $k => $v) {
            if ($k == 'X-Pingplusplus-Signature' || $k == 'Content-Type')
                array_push($header_joins, $k . ': ' . $v);
        }
        return $header_joins;
    }

    public function get()
    {
        $url = $this->input->get_post('url');
        $post = $this->input->post();
        $get = $this->input->post() ? $post : array();
        if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
            response(10000, '代理请求路由参数不合法', array(), 422);
        }
        $this->load->helper('curl_helper');
        echo curl_get($url, $get, $this->get_request_header());
    }

    public function post()
    {
        $url = $this->input->get_post('url');
        $post = $this->input->post();
        if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
            response(10000, '代理请求路由参数不合法', array(), 422);
        }
        $this->load->helper('curl_helper');
        echo curl_post($url, $post, $this->get_request_header());
    }
}
