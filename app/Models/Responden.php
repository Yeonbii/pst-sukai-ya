<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Tentukan kata pada atribut name dan gabungkan dengan timestamp
            $model->name = now()->timestamp . '_RESPONDEN';
        });
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'answers', 'responden_id', 'question_id');
    }
    
}
