<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable =['week_number', 'day_of_week', 'subtitle', 'description', 'training_id'];

    public function trainings(){
        return $this->belongsTo(Training::class);
    }
}
