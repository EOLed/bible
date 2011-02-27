<?php
class EsvBibleComponent extends Object {
    var $key = null;

    function initialize(&$controller, $settings=array()) {
    }

    function set_key($key) {
        $this->key = $key;
    }

    function get_passage($passage) {
        $passage = urlencode($passage);
        $options = "include-passage-references=false&audio-format=flash";
        $url = "http://www.esvapi.org/v2/rest/passageQuery?key=$this->key&passage=$passage&$options";
        CakeLog::write(LOG_DEBUG, "getting passage from: $url");
        $data = fopen($url, "r") ;

        $passage_str = "";

        if ($data) {
            while (!feof($data)) { 
                $buffer = fgets($data, 4096);
                $passage_str .= $buffer;
            }
            fclose($data);
        } else {
            die("fopen failed for url to webservice");
        }

        return $passage_str;
    }
}
