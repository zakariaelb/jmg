<?php
namespace App\Traits;

Trait ExpesnesTrait{
     function saveImage($photo,$folder){
        //Save photo in folder ;
        $file_extension = $photo ->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);
        return $file_name;
    }
}
