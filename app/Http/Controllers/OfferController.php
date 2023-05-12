<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create()
    {
        return view('ajaxoffers.create');
    }
    public function store(Request $request)
    {
        $file_extension = $request -> photo -> getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'images/offers';
        $request -> photo -> move($path , $file_name);

        Offer::create([
            'photo'  => $file_name,
            'name_ar'=> $request -> input('name_ar'),
            'name_en'=> $request -> input('name_en'),
            'price'  => $request -> input('price'),
            'details_ar'=> $request -> input('details_ar'),
            'details_en'=> $request -> input('details_en'),
        ]);
        // return redirect() -> route('ajaxoffers.create');
        return redirect() -> route('offers.all');
        // return 'add success';
    }

}
