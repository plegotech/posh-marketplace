<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model {
    //
    protected $table = "notifications";
    protected $fillable = [
        'title', 'desc', 'sender_id', 'recieved_id', 'status', 'notification_type', 'notificaiton_date', 'created_at', 'updated_at'
    ];
}
