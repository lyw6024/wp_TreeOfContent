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
        add_filter("the_content","malicTOC::getContent");
    }

    public static function getContent($content)
    {
        self::$fullContent = preg_replace("/<h2>(.*?)<\/h2>/","<h2 id='h2_$1'>$1</h2>",$content);
        self::$fullContent = preg_replace("/<h3>(.*?)<\/h3>/","<h3 id='h3_$1'>$1</h3>",self::$fullContent);
        return self::$fullContent;
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
            $h23arr = array();
            preg_match_all("/<h(2|3) (.*?)>.*?<\/h(2|3)>/",self::$fullContent,$pat_arr);
            $lastH2="root";
            foreach($pat_arr[0] as $x)
            {
                if(preg_match("/^<h2/",$x))
                {   
                    $lastH2 = preg_replace("/<(.*?)>(.*?)<\/.*?>/","$2",$x);
                   $h23arr[$lastH2] = array(); 
                }
                else
                {
                    $h3name = preg_replace("/<(.*?)>(.*?)<\/.*?>/","$2",$x);
                   array_push($h23arr[$lastH2],$h3name);
                }
            }
            echo '<script type="text/javascript" >';
            echo 'menuArr='.json_encode($h23arr);
            echo '</script>';
            echo '<script type="text/javascript" src="/wp-content/plugins/'.__CLASS__.'/addMenu.js"></script>';
        }
    }

}

malicTOC::init();

?>
