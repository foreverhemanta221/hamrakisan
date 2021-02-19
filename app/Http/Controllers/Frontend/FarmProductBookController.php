<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\PHPMailer;
use App\Models\FarmProduct;
use App\Models\FarmProductBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FarmProductBookController extends Controller
{
    public function getView($farmproduct){
        $farmproduct = FarmProduct::find($farmproduct);
        if($farmproduct){
            return view('frontend.hamrakisan.farmproductbook')->with('product',$farmproduct);
        }
        abort(404);

    }
    public function bookNow(Request $request, $id){
        $farmproduct = FarmProduct::find($id);
        $farm_detail = $farmproduct->listing;

        if($farmproduct){
                $booking =   FarmProductBook::create([
               'name'=>$request->name,
               'email'=>$request->email,
               'phone'=>$request->phone,
               'province'=>$request->province,
               'district'=>$request->district,
               'city'=>$request->city,
               's_address'=>$request->s_address,
               'quantity'=>$request->quantity,
              'product_id'=>$id,
              'description'=>$request->description
            ]);

                //address detail
                $province = check_province($request->province);
                $district = check_district($request->district);
                $city = $request->city;
                $specific_address = $request->s_address;
                //email to buyer
            $mail = new PHPMailer();
            $mail->From = $farm_detail->email;
            $mail->FromName = $farm_detail->name;
            $mail->AddAddress($request->email, 'New Order Arrived');
            $mail->Subject = "Booking successful";
            $mail->Body ="Dear Customer </br>
                        Thank you for your order we will contanct you as soon as possible
                            ";
            $mail->send();

            //mail to farm
            $mail =  new PHPMailer();
            $mail->From = $request->email;
            $mail->FromName = $farm_detail->name;
            $mail->AddAddress( $farm_detail->email, 'New Order Arrived');
            $mail->Subject = "Booking Received";
            $mail->Body ="New Booking Arrived </br>
                        You have got one order request from $request->name</br>
                        <strong>Booking Detail are:</strong></br>
                        <strong>Product Nmae : </strong> $farmproduct->name </br>
                        <strong>Quantity : </strong> $request->quantity</br>
                        <strong>Buyer Name : </strong> $request->name </br>
                        <strong> Address : </strong> $specific_address ,  $city, $district   </br>
                            ";
            $mail->send();
            return redirect()->back()->with('success','Order Successfully submitted');
        }abort(404);

    }
}
