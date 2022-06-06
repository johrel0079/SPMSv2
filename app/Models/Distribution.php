<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Distribution extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['picker_user_id','process_masterlist_id','distributor_user_id'];
    protected $guarded = ['id'];
}
