<?php
/*
Plugin Name: malicTOC 
Plugin URI: malic.xyz 
Description: none 
Version: 0.1
Author: malic 
Author URI: www.malic.xyz 
License: GPL2
*/

class malicTOC
{
    
    public static $add_malicTOC;
    private static $fullContent;

    public static function init()
    {
        add_shortcode("malicTOC","malicTOC::generate_malicTOC");
        add_action("wp_footer","malicTOC::set_malicTOC");
    }

    public static function generate_malicTOC()
    {
        self::$add_malicTOC = true;
    }
    
    private static function set_style()
    {
       $stylemsg='
<style>
div.malicTOC
{
    background-color:#EEE;
    border-top:2px solid;
    border-bottom:2px solid;
    margin-right:30px;
    margin-left:30px;
    padding:20px;
}
</style>
'; 
        return $stylemsg;
    }

    public static function set_malicTOC()
    {
        if(self::$add_malicTOC==true)
        {
            echo self::set_style();
            echo '<script type="text/javascript" src="/wp-content/plugins/'.__CLASS__.'/decorateAttrs.js"></script>';
            echo '<script type="text/javascript" src="/wp-content/plugins/'.__CLASS__.'/addMenu.js"></script>';
        }
    }

}

malicTOC::init();

?>
