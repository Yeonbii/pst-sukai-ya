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
            // Format timestamp sebagai yyyymmdd
            $timestamp = now()->format('Ymd');
    
            // Gabungkan dengan waktu dalam format H:i:s
            $model->name = $timestamp . now()->format('His') . '_RESPONDEN';
        });
    }

    public function scopeFilter($query, array $filters)
    {
        $isReadFilter = $filters['is_read'] ?? null;

        if ($isReadFilter !== null) {
            $query->where('is_read', $isReadFilter);
        }
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'answers', 'responden_id', 'question_id')->withPivot('value');
    }
    
}
