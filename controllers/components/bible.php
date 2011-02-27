<?php 
App::import("Component","Bible.EsvBible");
class BibleComponent extends Object {
    var $components = array("EsvBible");
    var $impl = null;
    function initialize(&$controller, $settings=array()) {
        $this->impl = $this->{$settings["translation"] . "Bible"};
        $this->impl->set_key($settings["key"]);
    }

    function get_passage($passage) {
        CakeLog::write(LOG_DEBUG, "getting passage: $passage");
        return $this->impl->get_passage($passage);
    }
}
