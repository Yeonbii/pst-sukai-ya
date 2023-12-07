<?php

namespace App\Models;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trigger extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['question_to', 'question_from', 'option'];

    public function question_to()
    {
        return $this->belongsTo(Question::class, 'question_to');
    }

    public function question_from()
    {
        return $this->belongsTo(Question::class, 'question_from');
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
