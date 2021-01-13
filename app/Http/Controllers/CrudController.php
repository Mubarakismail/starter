<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
        ]);
        return redirect()->back()->with(['success'=>'تم تسجيل العرض بنجاح']);
    }
    public function getAllOffers(){

        $offers=Offer::select('id','name','price','details')->get();
        return view('offers.all',compact('offers'));
    }
}
