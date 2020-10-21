<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
    'title','message','ticket',
    'ticket_type_id','status',
    'user_id','order_id'];

    public function tickettype(){
         return $this->belongsTo(TicketType::class);
    }

    public function customer(){
        return $this->belongsTo(User::class,'user_id','id');

    }

    
    public function order(){
        return $this->belongsTo(order::class);

    }
}
