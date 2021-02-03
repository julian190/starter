<?php

namespace App\Traitt;

Trait Julian {
    function saveImage($photo,$folder){
        $file_extenstion = $photo -> getClientoriginalExtension();
        $file_name = time() .".".$file_extenstion;
        $path = $folder;
        $photo ->move($path,$file_name);
        return $path."/".$file_name;
    }
}

