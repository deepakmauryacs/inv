<?php

if(!function_exists('get_field_value'))
{
    function get_field_value($table,$field,$where)
    {
        $CI=get_instance(); 
        $rest = $CI->db->get_where($table,$where)->row_array();
        if ($rest) {
            return $rest[$field];
        }
        else
        {
            return false;
        }
    }
}

if(!function_exists('get_field_select'))
{
    function get_field_select($table,$where)
    {
        $CI=get_instance(); 
        $rest = $CI->db->get_where($table,$where)->result_array();
        if ($rest) {
            return $rest;
        }
        else
        {
            return false;
        }
    }
}

?>