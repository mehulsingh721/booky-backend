<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;
    protected $table = "availability";
    protected $fillable = [
        'name',
        'rules',
        'timezone'
    ];
    protected $casts = [
        'rules' => 'json',
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function event()
    {
        return $this->belongsTo(AppUserEvent::class, "app_user_event_id");
    }
}
