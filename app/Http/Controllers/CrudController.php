<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getOffers()
    {
        return Offer::get();
    }
    public function create() {
        return view('offers.create');
    }
    public function store(OfferRequest $request) {
        Offer::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'details_ar'=>$request->details_ar,
            'details_en'=>$request->details_en,
            'price'=>$request->price,
        ]);
        return redirect()->back()->with(['success'=>'تم تسجيل العرض بنجاح']);
    }
    public function getAllOffers(){

        $offers=Offer::select('id','name_'.LaravelLocalization::getCurrentLocale().' as name',
        'price','details_'.LaravelLocalization::getCurrentLocale(). ' as details')->get();
        return view('offers.all',compact('offers'));
    }
}
