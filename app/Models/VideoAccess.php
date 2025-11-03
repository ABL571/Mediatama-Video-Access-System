<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class VideoAccess extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'video_id', 'expired_at'];

    protected $dates = ['expired_at'];

    public function video() {
        return $this->belongsTo(Video::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function isExpired() {
        return $this->expired_at && $this->expired_at->isPast();
    }
}
