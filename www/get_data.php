<?php
function get_array($cat)
{
    return parse_ini_file("/config.ini", $cat);
}

?>