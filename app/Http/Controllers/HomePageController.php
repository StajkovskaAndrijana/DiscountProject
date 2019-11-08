<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use Illuminate\Http\Request;
use App\Deal;
use Symfony\Component\Console\Input\Input;

class HomePageController extends Controller
{
    public function showHomePage()
    {
        $deals = Deal::all();
        $categories = Category::all();
        return view('index', compact('categories', 'deals'));
    }

    public function inputSearch(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $deals = Deal::where('title', 'LIKE', '%' . $request->search . '%"')->orWhere('type_of_discount', 'LIKE', '%' . $request->search . '%')->get();

            if ($deals) {

                foreach ($deals as $deal) {
                    $output .= '<div class="col-md-4 col-sm-6 discount">' .
                        '<div class="thumbnail thumbnail-grid text-center">' .
                        "<img class='thumbnail-logo thumbnail-logo-grid' src='" . $deal->company->thumbnail . "'>" . '<div class="caption caption_grid_view">' .
                        '<h3 class="bold grey">' . $deal->title . '</h3>' .
                        '<p class="yellow bold card_discount_grid">' . $deal->type_of_discount . '</p>' .
                        '<button class="btn bold card_category_grid grey">' . $deal->category->name . '</button>' .
                        '</div>' .
                        '<div class="body body_grid_view">' .
                        '<p class="bold grey">' . '<i class="fas fa-thumbs-up">' . '</i>' .
                        '<span>' . 142 . '</span>' . '<i class="fas fa-thumbs-down">' . '</i>' . '</p>' .
                        "<a href='http://localhost:8000/deal_details/$deal->id'>" .
                        '<button class="btn btn-block grey-btn text-uppercase white bold">Види повеќе</button>' . '</a>' .
                        '</div>' .
                        '</div>' .
                        '</div>';
                }

                return Response($output);
            }
        }
    }

    public function selectSearch($id)
    {
        $output = "";
        $deals = Deal::where('category_id', $id)->get();

        foreach ($deals as $deal) {
            $output .= '<div class="col-md-4 col-sm-6 discount">' .
                '<div class="thumbnail thumbnail-grid text-center">' .
                "<img class='thumbnail-logo thumbnail-logo-grid' src='" . $deal->company->thumbnail . "'>" . '<div class="caption caption_grid_view">' .
                '<h3 class="bold grey">' . $deal->title . '</h3>' .
                '<p class="yellow bold card_discount_grid">' . $deal->type_of_discount . '</p>' .
                '<button class="btn bold card_category_grid grey">' . $deal->category->name . '</button>' .
                '</div>' .
                '<div class="body body_grid_view">' .
                '<p class="bold grey">' . '<i class="fas fa-thumbs-up">' . '</i>' .
                '<span>' . 142 . '</span>' . '<i class="fas fa-thumbs-down">' . '</i>' . '</p>' .
                "<a href='http://localhost:8000/deal_details/$deal->id'>" .
                '<button class="btn btn-block grey-btn text-uppercase white bold">Види повеќе</button>' . '</a>' .
                '</div>' .
                '</div>' .
                '</div>';
        }


        return response()->json(['deals' => $output]);
    }
}