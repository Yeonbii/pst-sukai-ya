<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['question'];

    public function question() 
    {
        return $this->belongsTo(Question::class);
    }
}
