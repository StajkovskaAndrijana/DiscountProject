<?php

namespace App;

use App\Image;
use App\Company;
use App\Category;
use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $table = 'deals';
    protected $fillable = ['title', 'type_of_discount', 'price', 'description', 'approved', 'company_id', 'category_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'deal_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}