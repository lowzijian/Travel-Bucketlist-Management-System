<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel_bucket_country extends Model
{
    protected $fillable = [
        'name',
        'capital',
        'population',
        'flag',
        'currency',
        'region',
        'languages',
    ];
    
    public function travel_bucket_item()
    {
        return $this->hasMany(Travel_bucket_item::class);
    }
}
