<?php

namespace App\Models;

use App\Models\Part;
use App\Models\Chart;
use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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

}
