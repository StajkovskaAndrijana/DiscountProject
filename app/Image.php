<?php

namespace App;

use App\Deal;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected  $table = 'images';

    public function deals()
    {
        return $this->belongsTo(Deal::class, 'id', 'deal_id');
    }
}