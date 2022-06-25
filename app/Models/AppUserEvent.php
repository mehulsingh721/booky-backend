<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUserEvent extends Model
{
    use HasFactory;
    protected $table = 'events';
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
        return $this->belongsTo(User::class);
    }

    public function availability()
    {
        return $this->hasOne(Availability::class);
    }
}
