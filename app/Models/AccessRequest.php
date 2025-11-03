<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AccessRequest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','video_id','status'];

    public function user(){ return $this->belongsTo(\App\Models\User::class); }
    public function video(){ return $this->belongsTo(\App\Models\Video::class); }
}
