<?php

namespace App\CamCyber;


use Illuminate\Http\Request;
use Image;

class FileUpload{
    
    public static function image(Request $request, $imageName ="", $folders = array(), $sizes = array()){

        return $request->hasFile($imageName); 
      
        if($request->hasFile($imageName)) {

            $image = $request->file($imageName);
            $extension = $image->getClientOriginalExtension(); 

        
         
            $directories = "";
            for($i=0; $i< sizeof($folders); $i++){
                $directories .= $folders[$i];
            }
            if(!file_exists(public_path($directories))){
                mkdir(public_path($directories) , 0777, true);
            }

            $uploadedImage = array();
            foreach($sizes as $size){
                $myImage = '/'.$size[1].'x'.$size[2].'.'.$extension;
                Image::make($image->getRealPath())->resize($size[1], $size[2])->save(public_path($directories).$myImage);
                $uploadedImage[$size[0]] = 'public/'.$directories.$myImage;
            }

            return json_encode($uploadedImage);


        }else{
            return "";
        }
    }

    public static function fileUpload(Request $request, $fileName ="", $folders = array()){
        if($request->hasFile($fileName)) {
            $file = $request->file($fileName);
            //dd($file);
            $extension = $file->getClientOriginalExtension(); 
            
         
            $directories = "";
            for($i=0; $i< sizeof($folders); $i++){
                $directories .= $folders[$i];
            }

            if(!file_exists(public_path($directories))){
                mkdir(public_path($directories) , 0777, true);
            }
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $path = $file->move(public_path($directories), $fileName);
            return 'public/'.$directories.'/'.$fileName;

        }else{
            return "";
        }
    }

    public static function uploadImage(Request $request, $imageName ="", $folders = array(), $sizes = array()){
        if($request->hasFile($imageName)) {
            $image = $request->file($imageName);
            $extension = $image->getClientOriginalExtension(); 
            
         
            $directories = "";
            for($i=0; $i< sizeof($folders); $i++){
                $directories .= $folders[$i];
            }
            if(!file_exists(public_path($directories))){
                mkdir(public_path($directories) , 0777, true);
            }


            $uploadedImage = array();
            foreach($sizes as $size){
                $myImage = '/'.$size[1].'x'.$size[2].'.'.$extension;
                Image::make($image->getRealPath())->resize($size[1], $size[2])->save(public_path($directories).$myImage);
                $uploadedImage[$size[0]] = 'public/'.$directories.$myImage;
            }

            // return json_encode($uploadedImage);
            return 'public/'.$directories.$myImage;

        }else{
            return "";
        }
    }
   
    public static function resize(Request $request, $imageName ="", $folders = array(), $sizes = array()){
       
        if($request->hasFile($imageName)) {
            $image = $request->file($imageName);
            $extension = $image->getClientOriginalExtension(); 
            
         
            $directories = "";
            for($i=0; $i< sizeof($folders); $i++){
                $directories .= $folders[$i];
            }
            if(!file_exists(public_path($directories))){
                mkdir(public_path($directories) , 0777, true);
            }


            $uploadedImage = array();
            foreach($sizes as $size){
                $myImage = '/'.$size[1].'x'.$size[2].'.'.$extension;
                Image::make($image->getRealPath())->resize($size[1], $size[2],
                function($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path($directories).$myImage);
                $uploadedImage[$size[0]] = 'public/'.$directories.$myImage;
            }

            // return json_encode($uploadedImage);
            return 'public/'.$directories.$myImage;

        }else{
            return "";
        }
    }

    public static function upload64base($FILE, $dir = 'uploads/unknown'){
       
           
        if(!file_exists($dir)){
            mkdir($dir , 0777, true);
        }

        $image_parts = explode(";base64,", $FILE);
        $image_type_aux = explode("image/", $image_parts[0]);
        $extension = $image_type_aux[1];

       
        $uri = $dir.'/'.uniqid().'.'.$extension; 
        file_put_contents($uri, base64_decode($image_parts[1]));   
        
        return $uri;
            

            
        
    }
  
}
