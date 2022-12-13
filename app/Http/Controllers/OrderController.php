<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::orderBy('id')->get();
    }

    public function indexWeb()
    {
        $orders = Order::orderBy('id')->get();

        return view('administrador.index', [
            'orders' => $orders
        ]);
    }

    public function changeTimer(Request $request, Order $order)
    {

        // Se valida el valor ingresado por el usuario
        $this->validate($request, [
            'timer' => ['required', 'numeric', 'min:1']
        ]);

        // Se modifica el tiempo de espera y estado de la orden
        $order->wait_time = $request->timer;
        $order->status = 'PREPARANDO';
        $order->save();
        return redirect()->route('administrador.index')->with('success_msg', 'El tiempo de espera fue asignado con éxito!');
    }

    public function changeStatus(Order $order)
    {

        $order->status = 'ENTREGADO';
        $order->save();
        return redirect()->route('administrador.index')->with('success_msg', 'El estado de la orden fue actualizado con éxito');
    }

    public function orderStatus($id)
    {
        $order = Order::find($id);
        return response()->json([
            'status' => 222,
            'order' => $order
        ]);
    }

    public function searchStatus($status)
    {
        $orders = Order::where('status', '=', $status)->get();
        // dd($orders);
        return view('administrador.index', [
            'orders' => $orders
        ]);
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = date("Y-m-d");
        $request->request->add(['date' => $today]);

        $validator = Validator::make($request->all(), [
            'code' => ['required', 'unique:orders'],
            'total' => ['required', 'numeric'],
            'status' => 'required',
            'tables_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => 201,

            ]);
        }

        $order = Order::create([
            'code' => $request->code,
            'date' => $request->date,
            'total' => $request->total,
            'status' => $request->status,
            'tables_id' => $request->tables_id
        ]);

        return response()->json([
            'status' => 200,
            'order' => $order
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
