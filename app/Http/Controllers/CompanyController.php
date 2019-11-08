<?php

namespace App\Http\Controllers;

use App\Deal;
use App\Image;
use App\Company;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyValidation;

class CompanyController extends Controller
{
    public function createDeal()
    {
        $categories = Category::all();
        return view('page_sections.create_deal_form', compact('categories'));
    }

    public function createDealSubmit(CompanyValidation $request)
    {
        $thumbnailImage = $request->file('thumbnail');
        $thumbnailName = "thum-" . time();
        $thumbnailExtension = $thumbnailImage->getClientOriginalExtension();
        $thumbnailPath = public_path() . "/images/thumbnails/";
        $thumbnailFullPath = "/images/thumbnails/" . $thumbnailName . "." . $thumbnailExtension;
        $thumbnailImage->move($thumbnailPath, $thumbnailName . "." . $thumbnailExtension);

        $company = new Company();
        $company->name = $request->name;
        $company->thumbnail = $thumbnailFullPath;
        $company->description = $request->description;
        $company->websiteLink = $request->websiteLink;
        $company->facebookLink = $request->facebookLink;
        $company->phone = $request->phoneNumber;
        $company->email = $request->companyEmail;
        $company->googleMapsAddress = $request->googleMapsAddress;
        $company->address = $request->address;
        $company->save();

        $deal = new Deal();
        $deal->title = $request->title;
        $deal->type_of_discount = $request->type_of_discount;
        $deal->price = $request->price;
        $deal->description = $request->description;
        $deal->company_id = $company->id;
        $deal->category_id = $request->category;
        $deal->save();

        $allImages = $request->file('image');
        foreach ($allImages as $image) {
            $dealImage = rand(1, 100) . "." . time();
            $imageExtension = $image->getClientOriginalExtension();
            $imagePath = public_path() . "/images/";
            $imageFullPath = "/images/" . $dealImage . "." . $imageExtension;
            $image->move($imagePath, $dealImage . "." . $imageExtension);

            $images = new Image();
            $images->path = $imageFullPath;
            $images->deal_id = $deal->id;
            $images->save();
        }

        return back()->with('message', 'Картичката е успешно креирана.');
    }
}