<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'start_date', 'end_date', 'countries', 'is_active'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    // change is_active to false when the end_date is reached
    public function getIsActiveAttribute($value)
    {
        if ($this->end_date < now()) {
            return false;
        }
        return $value;
    }
    
}
