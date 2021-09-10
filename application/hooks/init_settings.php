<?php

function init_settings() {
    $ci = & get_instance();


    $language = "english";

    $ci->lang->load('default', $language);
    $ci->lang->load('custom', $language); //load custom after loading the default. because custom will overwrite the default file.
}
