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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use($search) {
                $query->where('text', 'like', '%' . $search . '%')
                      ->orWhereHas('part', function($query) use ($search) {
                          $query->where('name', 'like', '%' . $search . '%');
                      })
                      ->orWhereHas('options', function($query) use ($search) {
                          $query->where('text', 'like', '%' . $search . '%');
                      });
            });
        });

        $query->when($filters['part'] ?? false, function($query, $part) {
            return $query->whereHas('part', function($query) use($part) {
                $query->where('code', $part);
            });
        });
    }

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
