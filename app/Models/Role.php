<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['role'];
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class,'id','users_id');
    }
}
