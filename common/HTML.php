<?php

class HTML {

    public function getSelectHead($params) {
        $tagParams = "";
        if(is_array($params) && count($params) > 0) {
            foreach ($params as $key => $param) {
                $tagParams .= "$key='$param' ";
            }
        }
        echo "<select $tagParams>\n<option value=''></option>\n";
    }

    public function getSelectFoot() {
        echo "</select>";
    }

}

?>
