<?php
namespace App;
use App\Models\Images;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Config;
use Illuminate\Support\Facades\File;
class Helpers
{
    public static function upload_image($imageRequest,$height = null,$width = null){
        $ClientOriginalImage= $imageRequest;
        $originalImage = Image::make($ClientOriginalImage);
        $base_path =Config::get('constants.image_base_path');
        $random_char = Str::random(10);
        if($height!= null && $width != null){
            $file_path = $base_path["path"].'/'. $width .'x'. $height. '/';
            if(!File::isDirectory($file_path)){
                File::makeDirectory($file_path, 0777, true, true);
            }
            $originalImage->resize( $width,$height );
            $originalImage->save($file_path.'thumb_'.$random_char.'_'.$width .'x'. $height.'_'.$ClientOriginalImage->getClientOriginalName());
            $path = $base_path["path"].'/'. $width .'x'. $height. '/'.'thumb_'.$random_char.'_'.$width .'x'. $height.'_'.$ClientOriginalImage->getClientOriginalName();
        }else{
            $file_path_1 =$base_path["path"].'/media/';
            if(!File::isDirectory($file_path_1)){
                File::makeDirectory($file_path_1, 0777, true, true);
            }
            $originalImage->save($file_path_1.$random_char.'_'.$ClientOriginalImage->getClientOriginalName());
            $path = $base_path["path"].'/media/'.$random_char.'_'.$ClientOriginalImage->getClientOriginalName();
        }
        return $path;
    }
    public static function upload_api_image($imageRequest,$height = null,$width = null){
        $hash = bin2hex(random_bytes(8));
        $name = 'image-' . $hash . '.' . "jpeg";

        // $ClientOriginalImage = str_replace('data:image/png;base64,', '', $imageRequest);
        // $ClientOriginalImage = str_replace(' ', '+', $ClientOriginalImage);

        $imageDetail = explode(',',$imageRequest)[0];
        $image = base64_decode(explode(',',$imageRequest)[1]);

        $originalImage = Image::make($image);
        $base_path =Config::get('constants.image_base_path');
        $random_char = Str::random(10);
        if($height!= null && $width != null){
            $file_path = $base_path["path"].'/'. $width .'x'. $height. '/';
            if(!File::isDirectory($file_path)){
                File::makeDirectory($file_path, 0777, true, true);
            }
            $originalImage->resize( $width,$height );
            $originalImage->save($file_path.'thumb_'.$random_char.'_'.$width .'x'. $height.'_'.$name);
            $path = $base_path["path"].'/'. $width .'x'. $height. '/'.'thumb_'.$random_char.'_'.$width .'x'. $height.'_'.$name;
        }else{
            $file_path_1 = $base_path["path"].'/media/';
            if(!File::isDirectory($file_path_1)){
                File::makeDirectory($file_path_1, 0777, true, true);
            }
            $originalImage->save($file_path_1.$random_char.'_'.$name);
            $path = $base_path["path"].'/media/'.$random_char.'_'.$name;
        }
        return $path;
    }
    public static function uploadImageToDb($image)
    {
            $insert = new Images();
            $insert->image = Helpers::upload_image($image);
            $height =  Config::get('constants.medium_thumbnail.height');
            $width =  Config::get('constants.medium_thumbnail.width');
            $insert->medium_thumb =  Helpers::upload_image($image , $height, $width);
            $height =  Config::get('constants.small_thumbnail.height');
            $width =  Config::get('constants.small_thumbnail.width');
            $insert->small_thumb =  Helpers::upload_image($image , $height, $width);
            $height =  Config::get('constants.banner.height');
            $width =  Config::get('constants.banner.width');
            $insert->banner =  Helpers::upload_image($image , $height, $width);
            $insert->save();
            return $insert->id;
    }
    public static function uploadApiImageToDb($image)
    {
        $insert = new Images();
        $insert->image = Helpers::upload_api_image($image);
        $height =  Config::get('constants.medium_thumbnail.height');
        $width =  Config::get('constants.medium_thumbnail.width');
        $insert->medium_thumb =  Helpers::upload_api_image($image , $height, $width);
        $height =  Config::get('constants.small_thumbnail.height');
        $width =  Config::get('constants.small_thumbnail.width');
        $insert->small_thumb =  Helpers::upload_api_image($image , $height, $width);
        $height =  Config::get('constants.banner.height');
        $width =  Config::get('constants.banner.width');
        $insert->banner =  Helpers::upload_api_image($image , $height, $width);
        $insert->save();
        return $insert->id;
    }

    public static function delete_image_byId($image_id){
        $image = Images::find($image_id);
        if(file_exists($image->image)){
            File::delete($image->image);
        }
        if(file_exists($image->medium_thumb)){
            File::delete($image->medium_thumb);
        }
        if(file_exists($image->small_thumb)){
            File::delete($image->small_thumb);
        }
        $image->delete();
    }

    public static function getAnotherSizeOfImage($size,$originalImage){
        if($originalImage!=null){
            $originalImage =  explode(URL::to('/').'/',$originalImage)[1];
            $image = Images::where('image',$originalImage)->first();
            switch ($size){
                case 'small':
                    return URL::asset($image->small_thumb);
                    break;
                case 'medium':
                    return URL::asset($image->medium_thumb);
                case 'banner':
                    return URL::asset($image->banner);
                default:
                    return null;
            }
        }
    }
}
