<?php
class ExamplesController extends AppController {
    var $components = array("Bible.Bible" => array("Esv"));
    var $helpers = array("Bible.Bible");
    var $uses = null;

    function passages($passages) {
        $text = $this->Bible->get_passage($passages);
        $this->set("passage", $text);
    }

    function index() {
    }
}
?>
