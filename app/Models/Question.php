<?php

namespace App\Models;

use App\Models\Part;
use App\Models\Chart;
use App\Models\Option;
use App\Models\Trigger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['part', 'options', 'chart'];

    public function part() 
    {
        return $this->belongsTo(Part::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function chart()
    {
        return $this->hasOne(Chart::class);
    }

    public function trigger_to()
    {
        return $this->hasOne(Trigger::class, 'question_to');
    }

    public function trigger_from()
    {
        return $this->hasOne(Trigger::class, 'question_from');
    }
}
