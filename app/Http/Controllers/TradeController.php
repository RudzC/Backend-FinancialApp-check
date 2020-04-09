<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trade;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trades = Trade::all();
      if (!$trades) {
        return response()->json([
            'status'=>'failed',
            'message' => 'No trades found!'
        ], 500);
      }
      return response()->json([
          'status'=>'success',
          'trades' => $trades
      ], 200);
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
        $inputs = $request->all();
        
        $trade = new Trade();
        $trade->fill($inputs);
        $trade->save();

        return response()->json([
            'status' => 'success',
            'trade' => $trade
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trade = Trade::where('id', $id)->first();

        if (!$trade) {
            return response()->json([
                'status'=>'failed',
                'message' => 'Trade not found!'
            ], 500);
        }
        
        return response()->json([
          'status' => 'success',
          'trade' => $trade
      ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $inputs = $request->all();
        
        $trade = Trade::where('id', $id)->first();

        // $task -> name = $inputs['name'];
        // $task -> description = $inputs['description'];
        $trade -> update($inputs);
        $trade -> save();

        return response()->json([
            'status' => 'success',
            'trade' => $trade
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trade = Trade::where('id', $id)->delete();

        return response()->json([
            'status' => 'success'
        ], 201);
    }
}
