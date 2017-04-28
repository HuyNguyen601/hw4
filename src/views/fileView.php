<?php
namespace hw4\views;

use hw4\models\Model;

class fileView {
	public function __construct($obj){
        $input = 'spreadsheet.dtd';
        $str = \file_get_contents($input);
        $tag =[];
        $i = 0;
        do
        {
                $pos = strpos($str,'ELEMENT ',$i);
                $line = strpos($str,'>',$i);
                if($line)
                {
                        $i = $line +5;
                        $sub = substr($str,$i+7,$line);
                        $space = strpos($sub,' ');
                        if($sub !== false)
                                array_push($tag,substr($sub,0,$space));
                }
                $i++;
        } while ($pos !== false);
      
        $xml = new \SimpleXMLElement("<$tag[0]/>");
        $out["$tag[1]"] = $obj['sheet_id'];
        $out["$tag[2]"] = $obj['name'];
        $out["$tag[3]"] = $obj['data'];

        $name = $obj['name'];
        $file = $name.'.xml';
        $out = array_flip($out);
        array_walk_recursive($out, array ($xml, 'addChild'));
        print $xml->asXML();
        $xml->asXML($file);
	}
}
