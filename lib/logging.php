<?php
// super ghetto, super dirty, super shit, like segwit
function fileLog($file,$data){
    file_put_contents(BCH_PLUGIN_PATH.$file,$data);
}