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
    public $orderItems;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order->format();
        $this->orderItems= $order->rel_orderItems;
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
