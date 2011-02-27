<?php
class BibleHelper extends AppHelper {
    function encode_passage($passage) {
        $passage = rawurlencode($passage);
        return str_replace("%3A", "|", $passage);
    }
}
