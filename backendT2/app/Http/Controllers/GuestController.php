<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use carbon\Carbon;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guests = Guest::all();
        return view('home', ['guests' => $guests]);
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
        $guests = new Guest;
        $guests -> nombre = $request -> nombre; 
        $guests -> apellido = $request -> apellido;
        $guests -> edad = $request -> edad;
        $guests -> horaIngreso = Carbon::now();
        $guests -> cAcompanantes = $request -> cAcompanantes;
        $guests -> save();
        return $guests;
    }

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
        //
        $guests = Guest::find($id);
        $guests -> nombre = $request -> nombre; 
        $guests -> apellido = $request -> apellido;
        $guests -> edad = $request -> edad;
        $guests -> horaIngreso = Carbon::now();
        $guests -> cAcompanantes = $request -> cAcompanantes;
        $guests -> save();
        return $guests;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest = Guest::find($id);
        if ($guest) {
            $guest->delete();
            return redirect()->route('home')->with('status', 'Guest deleted successfully');
        }
        return redirect()->route('home')->with('status', 'Guest not found');
    }
};