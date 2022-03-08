<?php 
header('Content-type: application/xml');
$url = $_GET['url'];

echo getRSS($url);

function getRSS($url)
/*
Fairly standard fopen/getRSS function.
*/
{
    $fp = fopen($url,"r");
    if($fp)
    {
        while(!feof($fp)){
        $buffer = fgets($fp, 600);
        @$file .= $buffer;
    }
        fclose($fp);
    }
    else
    {
        die("Could not create a connection to website");
    }
    
    //clean up markup 
    $file = preg_replace('/\s+/',' ', $file);
    //$file = preg_replace('/<!\[CDATA(.?\n?)+\]\]>/',' ',$file);
    return $file;
}

?>
