<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }


    public function DealProud(Request $request)
    {


        $request->validate([
            'date' => 'required|date',
            'gave' => 'required|integer',
            'discount' => 'required|integer',
            'real' => 'required|integer',
        ], [
            'date.required' => 'التاريخ مطلوب',
            'date.date' => 'التاريخ يجب أن يكون وقت',
            'gave.required' => ' المبلغ المُعطى مطلوب',
            'gave.integer' => 'المبلغ المعطى يجب أن يكون عدد صحيح',
            'real.required' => 'السعر الأصلي للبضاعة مطلوب',
            'real.integer' => 'السعر الأصلي يجب أن يكون رقم صحيح',
            'discount.required' => 'المبلغ المُرجع مطلوب',
            'discount.integer' => 'المبلغ المُرجع يجب أن يكون رقم',

        ]);

            $prod=new Product();
            $prod->gave=$request->get('gave');
            $prod->discount=$request->get('discount');
            $prod->real=$request->get('real');
            $prod->dealer_id=$request->get('deal_id');
            $prod->day=$request->get('day');
            $prod->status='wait';
                $prod->created_at=$request->date;
               $save= $prod->save();
            if($save){
                SuccessError::Success('تم الإنشاء بنجاح');
                return redirect()->back();

            }



    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        return view('cms.prod._edit',['item'=>Product::find($id)]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

         $prod=Product::find($id);
            $prod->gave=$request->get('gave');
            $prod->discount=$request->get('discount');
            $prod->real=$request->get('real');

            if($request->day){
            $prod->day=$request->get('day');

            }
            $prod->status=$request->status;
                $prod->created_at=$request->date;
               $save= $prod->save();
            if($save){
                $deal=$prod->deal;
                $sumGave=$deal->products->where('status','success')->sum('gave');
                $sumReal=$deal->products->where('status','success')->sum('real');
                $sumDiscount=$deal->products->where('status','success')->sum('discount');
               $SumReturn=($sumGave+$sumDiscount)-$sumReal;

               $deal->mony=$SumReturn;
               $deal->save();
                SuccessError::Success('تم التعديل بنجاح');
                return redirect()->back();

            }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
