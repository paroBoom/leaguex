<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Dynamically add CSS files to header page
if(!function_exists('add_css')){
    function add_css($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        if(empty($file)){
            return;
        }

        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){   
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css',$header_css);
        }else{
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css',$header_css);
        }
    }
}

if(!function_exists('put_headers')){
    function put_headers()
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
       
        foreach($header_css AS $item){
            $str .= '<link rel="stylesheet" href="'.base_url().'assets/'.$item.'" />'."\n";
        }

        return $str;
    }
}

