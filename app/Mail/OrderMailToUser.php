<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMailToUser extends Mailable
{
    use Queueable, SerializesModels;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        // $user= 
        // $this->orderDetail=[
        //     "user" => ,
        //     "farm_id" => 6,
        //     "status" => "initial",
        //     "payment_method" => "cash-on-delivery",
        //     "updated_at" => "2021-03-21 09:36:01",
        //     "created_at" => "2021-03-21 09:36:01",
        //     "id" => 34,
        // ];
        // dd($order);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@hamrakisan.com')
                    ->view('mail.ordermailtouser')
                    ->with('booking',$this->order);
    }
}
