<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel_bucket_items extends Model
{
    protected $fillable = [
    
        'country_id',
        'title',
        'caption',
        'description',
        'city',
        'photos',
        'start_date',
        'end_date',
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
