<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Supplier $supplier)
    {
        $order = new Order();

        $order->order_date = new Carbon();
        $order->delivery_date = new Carbon();

        return view('suppliers.orders.create', compact('supplier', 'order'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Supplier $supplier)
    {
         $data = request()->validate([
            'order_ref' => 'required',
            'order_date' => 'required|date|before_or_equal:today',
            'delivery_date' => 'required|date|after_or_equal:order_date',
            'confirmation_no' => 'nullable',
            'invoice_no' => 'nullable',
            'bl_no' => 'nullable',
            'active' =>'required',
            'infos' => 'nullable',
        ]);

        $data['supplier_id'] = $supplier->id;

        $order = Order::create($data);

        return redirect()->route('orders.show', ['order' => $order])->with('message', 'Une commande a été créée');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Supplier $supplier, Order $Order)
    {
        $order = $Order;
        // dd($order);
        return view('suppliers.orders.edit', compact('supplier', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
