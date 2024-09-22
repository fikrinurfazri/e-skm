<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function sweet_alert($config)
{
    $CI = &get_instance();
    $CI->load->view('sweet_alert', $config);
}
