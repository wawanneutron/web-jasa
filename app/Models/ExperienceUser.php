<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienceUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'experience_user';

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $fillable = [
        'detail_user_id', 'experience',
    ];

    // one to many
    public function detail_user()
    {
        return $this->belongsTo(DetailUser::class, 'detail_user_id', 'id');
    }
}
