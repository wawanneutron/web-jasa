<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order';

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $fillable = [
        'users_id', 'service_id',  'freelancer_id', 'buyer_id', 'order_status_id',
        'file', 'note', 'expired'
    ];

    // one to many 
    public function user_freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id', 'id');
    }

    public function user_buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function order_status()
    {
        return $this->belongsTo(Order::class, 'order_status_id', 'id');
    }
}
