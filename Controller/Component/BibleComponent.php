<?php 
App::uses("EvsBibleComponent","Bible.Controller/Component");
class BibleComponent extends Component {
    var $components = array("Bible.EsvBible");
    var $default = "Esv";

    function initialize(Controller $controller, $settings=array()) {
        foreach ($settings as $impl => $impl_settings) {
            if (is_array($impl_settings)) {
                $this->{$impl . "Bible"}->set_settings($impl_settings);
            } else if ($impl == "default") {
                $this->default = $impl_settings;
            }
        }
    }

    function get_passage($passage, $impl = null) {
        CakeLog::write(LOG_DEBUG, "getting passage: $passage");
        return $this->{($impl == null ? $this->default : $impl) . "Bible"}->get_passage($passage);
    }
}
