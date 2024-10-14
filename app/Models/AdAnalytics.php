<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdAnalytics extends Model
{
   
    use HasFactory;
    protected $fillable = ['ad_id', 'views', 'clicks'];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
