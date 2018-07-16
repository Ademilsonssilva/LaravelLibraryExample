<?php

namespace App\Http\Controllers;

use App\Lend;
use Illuminate\Http\Request;
use App\User;
use Swal;

class LendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lends = Lend::paginate(10);
        
        return view('lend.index', compact('lends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '123';
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
     * @param  \App\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function show(Lend $lend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function edit(Lend $lend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lend $lend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lend $lend)
    {
        //
    }

    public function devolution(Lend $lend)
    {
        return view('lend.devolution', compact('lend'));
    }

    public function devolution_post(Request $request, Lend $lend)
    {
        $validatedDate = $request->validate([
            'devolution_date' => 'date|after_or_equal:' . $lend->lend_date->format('Y-m-d'),
        ]);

        $lend->devolution_date = $request->input('devolution_date');

        $lend->save();

        Swal::success('Success', 'Devolution date successfully registered!');
        return redirect()->route('lend.index');

    }
}
