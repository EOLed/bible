<?php
class BibleHelper extends AppHelper {
    function encode_passage($passage) {
        $passage = urlencode($passage);
        return str_replace("%3A", "|", $passage);
    }
}
