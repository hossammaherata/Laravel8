<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $deals = Dealer::all();
        return view('cms.deals.index', ['deals' => $deals]);
    }

    public function getdeal($id)
    {

        return view('cms.prod.create', ['deal' => Dealer::find($id)]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Re(sponse
     */

    public function dealProducts($id)
    {

    $deal=    Dealer::with(['products'=>function($query){
            $query->orderBy('created_at', 'DESC');
        }])->where('id',$id)->first();
        return view('cms.prod.index', ['deal' =>$deal]) ;

    }
    public function create()
    {
        //
        return view('cms.deals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'mobile' => 'required|numeric',
            'name' => 'required',
        ], [
            'mobile.required' => 'رقم الهاتف مطلوب',
            'mobile.numeric' => 'رقم الهاتف يجب أن يكون رقم',
            'name.required' => 'اسم التاجر مطلوب',
        ]);
        $deal = new Dealer();
        $deal->name = $request->get('name');
        $deal->mobile = $request->get('mobile');
        $deal->save();
        Alert::success('تم الإنشاء بنجاح');
        return redirect()->route('deal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function show(Dealer $dealer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deal = Dealer::find($id);
        return view('cms.deals.edit', ['deal' => $deal]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'mobile' => 'required|numeric',
            'name' => 'required',
        ], [
            'mobile.required' => 'رقم الهاتف مطلوب',
            'mobile.numeric' => 'رقم الهاتف يجب أن يكون رقم',
            'name.required' => 'اسم التاجر مطلوب',
        ]);
        $deal = Dealer::find($id);
        $deal->name = $request->get('name');
        $deal->mobile = $request->get('mobile');
        $deal->save();
        Alert::success('تم التعديل بنجاح');
        return redirect()->route('deal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Dealer::find($id)->delete();

        if ($del) {
            return response()->json(['icon' => 'success', 'title' => 'تم الحذف بنجاح  '], 200);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'فشل الحذف'], 400);
        }
    }
}
