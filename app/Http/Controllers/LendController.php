<?php

namespace App\Http\Controllers;

use App\Lend;
use Illuminate\Http\Request;
use App\User;
use App\Book;
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
        $users = User::all()->pluck('name', 'id');
        $books = Book::all()->pluck('name', 'id');

        return view('lend.create', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'days' => 'required|integer|between:1,14',
        ]);

        $book = Book::find($request->input('book'));

        if (!$book->isAvaliable()) {
            Swal::error('Error', 'The required book is not avaliable!');
            return back()->withInput();
        }

        $lend = new Lend();
        $lend->user_id = User::find($request->input('user'))->id;
        $lend->book_id = $book->id;
        $lend->days = $request->input('days');
        $lend->lend_date = \Carbon\Carbon::today();

        try {
            $lend->save();
            Swal::success("Success", "Operation successfully registered!");
            return redirect()->route('lend.index');
        }
        catch (Exception $e) {
            Swal::error("Error", "Something went wrong!");
            return redirect()->route('lend.index');   
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function show(Lend $lend)
    {
        return view('lend.show', compact('lend'));
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
