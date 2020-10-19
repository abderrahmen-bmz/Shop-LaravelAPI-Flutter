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

    public function user(){
        return $this->belongsTo(User::class);

    }
}
