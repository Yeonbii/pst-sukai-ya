<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
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
            $model->name = $timestamp . now()->format('His') . '_ARCHIVE_RESPONDEN_PSTSUKAIYA';
        });
    }
}
