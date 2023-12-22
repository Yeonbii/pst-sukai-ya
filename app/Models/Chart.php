<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['question'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use($search) {
                $query->where('no', 'like', '%' . $search . '%')
                      ->orWhereHas('question', function($query) use ($search) {
                          $query->where('text', 'like', '%' . $search . '%');
                      });
            });
        });
    }

    public function question() 
    {
        return $this->belongsTo(Question::class);
    }
}
