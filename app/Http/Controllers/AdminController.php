<?php

namespace App\Http\Controllers;

use App\Deal;
use App\Image;
use App\Company;
use App\Category;
use App\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminPanel()
    {
        $customers = Customer::all();
        $deals = Deal::all();
        return view('page_sections.admin_panel', compact('customers', 'deals'));
    }

    public function seeDealDetail(Request $request, $id)
    {
        $deal = Deal::where('id', $id)->first();
        $images_deal = $deal->images()->get();
        $categories = Category::all();
        $image = Image::inRandomOrder()->where('deal_id', '=', $id)->limit(1)->pluck('path');

        return view('admin_panel_sections.company_deal_detail', compact('deal', 'images_deal', 'categories', 'image'));
    }

    public function approveDeal($id)
    {
        $deal = Deal::where('id', $id)->first();
        $deal->approved = 1;
        $deal->save();

        return redirect()->to('admin/panel')->with('message', 'Картичката е успешно одобрена');
    }

    public function deleteDeal($id)
    {
        Deal::where('id', $id)->delete();

        return redirect()->to('admin/panel')->with('message', 'Картичката е успешно избришана');
    }

    public function updateDeal($id)
    {
        $deal = Deal::where('id', $id)->first();
        $images_deal = $deal->images()->get();
        $categories = Category::all();
        return view('admin_panel_sections.company_deal_update', compact('deal', 'images_deal', 'categories'));
    }

    public function updateDealSubmit(Request $request)
    {
        $thumbnailImage = $request->file('thumbnail');
        $thumbnailName = "thum-" . time();
        $thumbnailExtension = $thumbnailImage->getClientOriginalExtension();
        $thumbnailPath = public_path() . "/images/thumbnails/";
        $thumbnailFullPath = "/images/thumbnails/" . $thumbnailName . "." . $thumbnailExtension;
        $thumbnailImage->move($thumbnailPath, $thumbnailName . "." . $thumbnailExtension);

        $companyId = $request->input('company_id');
        $company = Company::find($companyId);
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

        $dealId = $request->input('deal_id');
        $deal = Deal::find($dealId);
        $deal->title = $request->title;
        $deal->type_of_discount = $request->type_of_discount;
        $deal->price = $request->price;
        $deal->description = $request->description;
        $deal->company_id = $company->id;
        $deal->category_id = $request->category;
        $deal->save();

        return back()->with('message', 'Картичката е успешно едитирана');
    }
}