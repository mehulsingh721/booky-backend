<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUserEvent extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $fillable = [
        'name',
        'meetLocation',
        'description',
        'eventLink',
        'type',
        'inviteeQuestions',
        'user_id'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function availability()
    {
        return $this->hasOne(availability::class, "availability_id");
    }
}
