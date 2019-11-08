<?php

namespace App;

use App\Deal;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'thumbnail', 'description', 'websiteLink', 'facebookLink', 'phone', 'email', 'googleMapsAddress', 'address'];

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
}