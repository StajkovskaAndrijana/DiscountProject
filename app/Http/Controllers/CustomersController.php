<?php

namespace App\Http\Controllers;


use App\Deal;
use App\Image;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerValidation;

class CustomersController extends Controller
{
    public function dealDetails(Request $request, $id)
    {
        $deal = Deal::where('id', $id)->first();
        $images_deal = $deal->images()->get();

        $image = Image::inRandomOrder()->where('deal_id', '=', $id)->limit(1)->pluck('path');
        return view('page_sections.deal_details', compact('deal', 'images_deal', 'image'));
    }

    public function buyDeal(Request $request, $id)
    {
        $deal = Deal::where('id', $id)->first();
        return view('page_sections.buy_deal_form', compact('deal'));
    }

    public function buyDealSubmit(CustomerValidation $request)
    {
        $customer = new Customer();
        $customer->fullName = $request->fullName;
        $customer->companyName = $request->companyName;
        $customer->numberOfEmployees = $request->numberOfEmployees;
        $customer->phone = $request->phone;
        $customer->deal_id = $request->deal_id;
        $customer->save();
        return back()->with('message', 'Картичката е успешно купена');
    }
}