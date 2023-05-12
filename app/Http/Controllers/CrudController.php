<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

class CrudController extends Controller
{
    //-----------------------------------------------------------------------------------------------------------
    public function getalloffers(){
        // return view( 'offers',[
        // 'off' => Offer::all()
        // ]);
        // return Offer::select('id' , 'name')-> get();
        // return Offer::all();
        return view('offers.all',[
            'offers'=>Offer::all()
    ]);
    // $offers = Offer::select('id',
    //         'price',
    //         'name_ar',
    //         'details_ar')->get();
    //         return view('offers.all', 'offers');
    // }
    // public function store(){
        //     Offer::create([
            //         'name'=> 'offer4',
            //         'price'=> '454',
            //         'details'=> 'offer4 details',
            //     ]);
    //-----------------------------------------------------------------------------------------------------------
    }
    public function create(){
        return view('offers.create');
    }

    //-----------------------------------------------------------------------------------------------------------
    public function edit($id)
    {
        return view('offers.edit',[
            'ed'=>Offer::findorfail($id)
        ]);
        // $offer = Offer::find($id);  // search in given table id only
        // if (!$offer)
        //     return redirect()->back();
        // $ed =Offer::select('name_ar','name_en','price','details_ar','details_en')->find($id);
        // return view('offers.edit', compact('ed'));
        // return $id;
    }
    //-----------------------------------------------------------------------------------------------------------

    public function store(Request $request){
        // return $request;
        // dd('$request');
        // -----------------
        /*AHMAD EMMAM WAY TO VALIDATE */
        $rules=[
            'name_'.LaravelLocalization::setLocale()=> 'required|max:10|unique:offers,name',
            'price' => 'required|numeric',
            'details_'.LaravelLocalization::setLocale()=> 'required',
            ];
        $messages=[
            'name_ar.required' =>__('messages.offer name required') ,
            'name_en.required' =>__('messages.offer name required') ,
            'name_ar.unique' => __('messages.offer name unique'),
            'name_en.unique' => __('messages.offer name unique'),
            'name_ar.max' => __('messages.offer name max'),
            'name_en.max' => __('messages.offer name max'),
            'price.required' =>__('messages.offer price required'),
            'price.numeric' =>__('messages.offer price numeric'),
            'details_ar.required' =>__('messages.offer details required'),
            'details_en.required' =>__('messages.offer details required'),
        ];
        // $validator = validator::make($request -> all(),$rules,$messages); 
        // if($validator -> fails()){
        //     return redirect()->back()->withErrors($validator) -> withInputs($request->all()) ;
        // }

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
        return redirect() -> route('offers.all');
        // return 'IT was done';
    // $messages=[
    // 'name.required' =>    'should be required',
    // 'name.unique' =>      'should be required',
    // 'name.max' =>         'shold be less than 10',
    // 'price.required' =>   'should be required',
    // 'price.numeric' =>    'should be integer',
    // 'details.required' => 'should be required',
    //     ];
    /*AHMAD EMMAM WAY TO VALIDATE */
    // -----------------
    // -----------------
    /*AHMAD EMMAM WAY TO STORE */
    // return $validator->errors();
    /*AHMAD EMMAM WAY TO STORE */
    // -----------------
    // --------------
    /*NOUR HOMSI WAY TO VALIDATE */
    // $request ->validate([
    //     'name' => 'required',
    //     'price' => 'integer',
    //     'details' => ['required'],
    // ]);
    /*NOUR HOMSI WAY TO VALIDATE */
    // -----------------
    // -----------------
    /*NOUR HOMSI WAY TO STORE */
    // $offer =new Offer();
    // $offer ->name = $request -> input('name');
    // $offer ->price = $request -> input('price');
    // $offer ->details = $request -> input('details');
    // $offer->save();
    // return redirect() -> route('offers.create') ;
    /*NOUR HOMSI WAY TO STORE */
    // -----------------
    // return redirect() -> route('offers.create') ;
    // return 'add done';
//-----------------------------------------------------------------------------------------------------------
}
public function update(Request $request, $offer_id)
    {
        // $request ->validate([
        //     'computer_name' => 'required',
        //     'computer_origin' => 'required',
        //     'computer_price' => ['required', 'integer'],

        // ]);
        // return $offer_id;
/* -----------------------------------------------------------*/
/* Nour Homsi Method 1 */
// $offer = Offer::findOrFail($offer_id);
// $offer -> id         = strip_tags ($request -> input('id'));
// $offer -> name_ar    = strip_tags ($request -> input('name_ar'));
// $offer -> name_en    = strip_tags ($request -> input('name_en'));
// $offer -> price      = strip_tags ($request -> input('price'));
// $offer -> details_ar = strip_tags ($request -> input('details_ar'));
// $offer -> details_en = strip_tags ($request -> input('details_en'));
// $offer->save();
// return redirect() -> route('offers.all');
/* Nour Homsi Method 1 */
/* -----------------------------------------------------------*/

/* -----------------------------------------------------------*/
/* Ahmad Emmam Method 1 */
// $offer = Offer::findOrFail($offer_id);
// $offer -> update($request -> all());
// return redirect() -> route('offers.all');
/* Ahmad Emmam Method 1 */
/* -----------------------------------------------------------*/

/* -----------------------------------------------------------*/
/* Nour Homsi Method 2 */
Offer::where ('id' , $offer_id) -> update([
        'id'        =>$request -> id,
        'name_ar'   =>$request -> name_ar,
        'name_en'   =>$request -> name_en,
        'price'     =>$request -> price,
        'details_en'=>$request -> details_en,
        'details_ar'=>$request -> details_ar
    ]);
    return redirect() -> route('offers.all');
    /* Nour Homsi Method 2 */
/* -----------------------------------------------------------*/

/* -----------------------------------------------------------*/
/* Ahmad Emmam Method 2 */
// $offer = Offer::find($offer_id);
// $offer = Offer::select('id', 'name_ar', 'name_en', 'details_ar', 'details_en', 'price')->find($offer_id);
// $offer -> update([
//         'id'         => $request -> id,
//         'name_ar'    => $request -> name_ar,
//         'name_en'    => $request -> name_en,
//         'price'      => $request -> price,
//         'details_en' => $request -> details_en,
//         'details_ar' => $request -> details_ar
//         ]);
//     return redirect() -> route('offers.all');
    // return 'it was done';
/* Ahmad Emmam Method 2 */
/* -----------------------------------------------------------*/
    }
    //------------------------------------------
}

