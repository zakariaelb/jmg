<?php
namespace App\Traits;

Trait ExpesnesTraitMultiple{

    function store(request $request) {

        $input=$request->all();
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
            }
        }
}
