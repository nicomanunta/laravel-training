<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable =['user_id','title', 'duration_weeks', 'slug', 'notes'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function programs(){
        return $this->hasMany(Program::class);
    }
}
