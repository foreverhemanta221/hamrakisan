<?php

use App\Models\Backend\User;
use Intervention\Image\Image;

//upload image
 function uploadImage($image = null,$user_id){
    if(empty($image) || !$image->isValid()) return;

    $uploadPath = 'backend/uploads/images/';
    $imageMeta = [
        'name'      => "test",
        'extension' => $image->getClientOriginalExtension(),
        'size'      => $image->getClientSize(),
        'mimetype'  => $image->getClientMimeType(),
    ];
    $hash = bin2hex(random_bytes(8));
    $filename = 'image-' . $hash . '.' . $image->getClientOriginalExtension();
    $imagePath = $uploadPath . $filename;
    $intvImage = \Intervention\Image\Facades\Image::make($image)->save($imagePath, 40);
    if($intvImage){
        $imageSize = getimagesize($imagePath);
//        $imageMeta['hash'] = $hash;
        $imageMeta['filename'] = $filename;
        $imageMeta['path'] = 'backend/uploads/images/' . $filename;
        $imageMeta['width'] = $imageSize[0];
        $imageMeta['height'] = $imageSize[1];
        $imageMeta['user_id'] = $user_id;

       $image =    \App\Models\Images::create($imageMeta);

        return $image->id;
    }
    return "error";
}
 function uploadImageApi($image=null,$user_id){
     //fetch image
    $imageDetail = explode(',',$image)[0];
    $image = base64_decode(explode(',',$image)[1]);

    //upload path
    $uploadPath = 'backend/uploads/images/';
    $hash = bin2hex(random_bytes(8));
    $name = 'image-' . $hash . '.' . "jpeg";
    $imagePath = $uploadPath . $name;
    $intvImage = \Intervention\Image\Facades\Image::make($image)->save($imagePath, 100);
    //other imate detail
    $width = explode('x',$imageDetail)[0];
    $height = explode('x',$imageDetail)[1];
    $imageMeta = [
        'name'=>$name,
        'filename'=>$name,
        'extension'=>"jpeg",
        'mimetype'=>'image/jpeg',
        'height'=>$height,
        'width'=>$width,
        'path'=>$imagePath,
        'user_id'=>$user_id
    ];
    $image =    \App\Models\Images::create($imageMeta);

    return $image->id;
}


//all provinces
function getProvince(){
     return[
       '1'=>'Province 1',
       '2'=>'Province 2',
       '3'=>'Bagmati',
       '4'=>'Gandaki',
       '5'=>'Lumbini',
       '6'=>'Karnali',
       '7'=>'SudurPashchim',
     ];
}
function nepaliProvince(){
     return [
        '1'=>'प्रदेश १',
         '2'=>'प्रदेश २',
         '3'=>'बागमती',
         '4'=>'गण्डकी प्रदेश',
         '5'=>'लुम्बिनी',
         '6'=>'कर्णाली प्रदेश',
         '7'=>'सुदुर पश्चिम प्रदेश '

     ];
}

function check_nepali_province($province){
     $allprovince = nepaliProvince();
     if(array_key_exists($province,$allprovince)){
         return $allprovince[$province];
     }
}
//all districts
function getDistrict(){
    return [
        '1'=>'achham',
        '2'=>'arghakhanchi',
        '3'=>'baglung',
        '4'=>'baitadi',
        '5'=>'bajhang',
        '6'=>'bajura',
        '7'=>'banke',
        '8'=>'bara',
        '9'=>'bardiya',
        '10'=>'bhaktapur',
        '11'=>'bhojpur',
        '12'=>'chitwan',
        '13'=>'dadeldhura',
        '14'=>'dailekh',
        '15'=>'dang',
        '16'=>'darchula',
        '17'=>'dhading',
        '18'=>'dhankuta',
        '19'=>'dhanusa',
        '20'=>'dholkha',
        '21'=>'dolpa',
        '22'=>'doti',
        '23'=>'gorkha',
        '24'=>'gulmi',
        '25'=>'humla',
        '26'=>'ilam',
        '27'=>'jajarkot',
        '28'=>'jhapa',
        '29'=>'jumla',
        '30'=>'kailali',
        '31'=>'kalikot',
        '32'=>'kanchanpur',
        '33'=>'kapilvastu',
        '34'=>'kaski',
        '35'=>'kathmandu',
        '36'=>'kavrepalanchok',
        '37'=>'khotang',
        '38'=>'lalitpur',
        '39'=>'lamjung',
        '40'=>'mahottari',
        '41'=>'makwanpur',
        '42'=>'manang',
        '43'=>'morang',
        '44'=>'mugu',
        '45'=>'mustang',
        '46'=>'myagdi',
        '47'=>'nawalparasi (east)',
        '48'=>'nawalparasi (west)',
        '49'=>'nuwakot',
        '50'=>'okhaldhunga',
        '51'=>'palpa',
        '52'=>'panchthar',
        '53'=>'parbat',
        '54'=>'parsa',
        '55'=>'pyuthan',
        '56'=>'ramechhap',
        '57'=>'rasuwa',
        '58'=>'rautahat',
        '59'=>'rolpa',
        '60'=>'rukum (east)',
        '61'=>'rukum (west)',
        '62'=>'rupandehi',
        '63'=>'salyan',
        '64'=>'sankhuwasabha',
        '65'=>'saptari',
        '66'=>'sarlahi',
        '67'=>'sindhuli',
        '68'=>'sindhupalchok',
        '69'=>'siraha',
        '70'=>'solukhumbu',
        '71'=>'sunsari',
        '72'=>'surkhet',
        '73'=>'syangja',
        '74'=>'tanahu',
        '75'=>'taplejung',
        '76'=>'terhathum',
        '77'=>'udayapur'
    ];


}

function district_nepali(){
     return [
         '1'=>'अछाम',
         '2'=>'अर्घाखाँची',
         '3'=>'बागलुङ',
         '4'=>'बैतडी',
         '5'=>'बझाङ',
         '6'=>'बाजुरा',
         '7'=>'बाँके',
         '8'=>'बारा',
         '9'=>'बर्दिया',
         '10'=>'भक्तपुर',
         '11'=>'भोजपुर',
         '12'=>'चितवन',
         '13'=>'डडेलधुरा',
         '14'=>'दैलेख',
         '15'=>'दाङ',
         '16'=>'दार्चुला',
         '17'=>'धादिङ',
         '18'=>'धनकुटा',
         '19'=>'धनुषा',
         '20'=>'दोलखा',
         '21'=>'डोल्पा',
         '22'=>'डोटी',
         '23'=>'गोरखा',
         '24'=>'गुल्मी',
         '25'=>'हुम्ला',
         '26'=>'इलाम',
         '27'=>'जाजरकोट',
         '28'=>'झापा',
         '29'=>'जुम्ला',
         '30'=>'कैलाली ',
         '31'=>'कालिकोट',
         '32'=>'कंचनपुर',
         '33'=>'कपिलवस्तु ',
         '34'=>'कास्की',
         '35'=>'काठमाडौँ',
         '36'=>'काभ्रेपलान्चोक',
         '37'=>'खोटाँग',
         '38'=>'ललितपुर',
         '39'=>'लमजुङ ',
         '40'=>'महोत्तरी',
         '41'=>'मकवानपुर',
         '42'=>'मनाङ',
         '43'=>'मोरंग',
         '44'=>'मुगु ',
         '45'=>'मुस्ताङ',
         '46'=>'म्याग्दी ',
         '47'=>'नवलपुर',
         '48'=>'परासी',
         '49'=>'नुवाकोट ',
         '50'=>'ओखलढुंगा ',
         '51'=>'पाल्पा ',
         '52'=>'पांचथर',
         '53'=>'पर्वत ',
         '54'=>'पर्सा',
         '55'=>'प्युठान',
         '56'=>'रामेछाप ',
         '57'=>'रसुवा',
         '58'=>'रौतहट ',
         '59'=>'रोल्पा ',
         '60'=>'पूर्वी रूकुम ',
         '61'=>'पश्चिमी रूकुम ',
         '62'=>'रुपन्देही ',
         '63'=>'सल्यान ',
         '64'=>'संखुवासभा',
         '65'=>'सप्तरी ',
         '66'=>'सर्लाही ',
         '67'=>'सिन्धुली ',
         '68'=>'सिन्धुपाल्चोक ',
         '69'=>'सिराहा ',
         '70'=>'सोलुखुम्बू ',
         '71'=>'सुनसरी ',
         '72'=>'सुर्खेत ',
         '73'=>'स्याङग्जा ',
         '74'=>'तनहुँ',
         '75'=>'ताप्लेजुंग ',
         '76'=>'तेह्रथुम ',
         '77'=>'उदयपुर'
     ];
}

//check nepali distrcit
function check_nepali($district){
     $alldistrict = district_nepali();
     if(array_key_exists($district,$alldistrict)){
         return $alldistrict[$district];
     }
}
//province with respect to therir districts
function provience_district(){
    return[
        '1'=>[11,18,26,28,37,43,50,52,64,70,71,75,76,77],
        '2'=>[8,19,40,54,58,65,66,69],
        '3'=>[10,12,17,20,35,36,38,41,49,56,57,67,68],
        '4'=>[3,23,34,39,42,45,46,47,53,73,74],
        '5'=>[2,7,9,15,24,33,48,51,55,59,60,62],
        '6'=>[14,21,25,27,29,31,44,61,63,72],
        '7'=>[1,4,5,6,13,16,22,30,32]
    ];
}
// return province name with their key
function check_province($request){
     $province = getProvince();
     if(array_key_exists($request,$province)){
         return $province[$request];
     }
}

//return districts name with therir key
function check_district($request){
     $district = getDistrict();
     if(array_key_exists($request,$district)){
         return $district[$request];
     }
}
//return district with province key
function checkProvinceDistrict($request){
     $provience_district = provience_district();
     $province = check_province($request);
     if($province){

         if(\Illuminate\Support\Facades\Session::has('locale')=='ne'){
             $arr = array();
             foreach ($provience_district[$request] as $req){
                 $arr[$req]=check_nepali($req);
             }
             return $arr;
         }else{
             $arr = array();
             foreach ($provience_district[$request] as $req){
                 $arr[$req]=check_district($req);
             }
             return $arr;
         }
     }
}
//check district province
function checkDistrictProvince($district){
    $provience_district = provience_district();
    foreach($provience_district as $key => $districts) {
      $data =  in_array($district,$districts);
      if($data){
          return $key;
      }
    }
}

//remove image
function removeImage($imageId = null)
{
    if (empty($imageId)) return;
        $imagePath = public_path('backend/uploads/images/');
        // Image model instance
        $image = \App\Models\Images::find($imageId);
        $path = $imagePath . $image->filename;
        if ($image->filename && File::exists($path)) {
            // Delete from the server
             unlink($path);
            // Delete from the db row
            $image->delete();
        }
}
//for api
 function getUserId($token){
    $user_token = \App\UserToken::where('api_token',$token)->first();
    if($user_token!=null){
        $user_id = $user_token->user_id;
        return $user_id;
    }
}

//check data is either email  or phone
function checkEmailOrPhone($string){
    if(checkEmail($string) == true){
        return "email";
    }elseif(checkPhone($string) == true){
        return "phone";
    }else{
        return "invalid";
    }

}
function checkEmail($email) {
    $find1 = strpos($email, '@');
    $find2 = strpos($email, '.');
    return ($find1 !== false && $find2 !== false && $find2 > $find1) ? true : false;
}
function checkPhone($number){
    $mobileregex = "/^[9][8][0-9]{8}$/" ;
    return preg_match($mobileregex, $number)==1 ? true : false;
}

//measeure unit
function measureUnit(){
     return ['KG','Dharni','Dozon','Litre','Dharni','Piece'];
}

//loan type
//all function for loan from here to
function loanType(){
     return ['Non Collatral','Regular'];
}


//frontend

function review_html($avg){
     $roundReview = round($avg);
     $reviewHtmlCode ='<div class="farm-rating">';
     for($i=0;$i<$roundReview;$i++){
         $reviewHtmlCode.='<span class="fa fa-star checked"></span>';
     }
     for ($i=$roundReview;$i<5;$i++){
         $reviewHtmlCode.='<span class="fa fa-star"></span>';
     }
     $reviewHtmlCode.="</div>";
     return $reviewHtmlCode;
}
function getRole(){
     return [
       'admin',
       'farmer',
       'user'
     ];
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
