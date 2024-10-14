<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Make sure to import this


use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    // has factory
    use HasFactory;
    protected $fillable = ['campaign_id', 'name', 'image_url', 'target_url', 'spots', 'countries'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
