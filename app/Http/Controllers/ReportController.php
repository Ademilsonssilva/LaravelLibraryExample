<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Book;
use \App\Lend;
use \Carbon\Carbon;
use Swal;

class ReportController extends Controller
{
    
	public function lendsByUser()
	{
		$users = User::orderBy('name')->get()->pluck('name', 'id');

		return view('report.lends_by_user', compact('users'));
	}

	public function lendsByBook()
	{
		$books = Book::orderBy('name')->get()->pluck('name', 'id');

		return view('report.lends_by_book', compact('books'));
	}

	public function lendsByPeriod()
	{
		return view('report.lends_by_period');
	}

	public function lendsByUserGenerate(Request $request)
	{

		$data = Lend::where('user_id', $request->input('user'))->orderBy('lend_date')->get();

		if ($data->count() < 1) {
			Swal::warning('Warning', 'No data to export!');
			return back()->withInput();
		}

		$user = User::find($request->input('user'));
		$print = $request->has('print_report');

		$view = view('report.lends_by_user_report', compact('user', 'data', 'print'));

		if ($print){
			return $view;
		}
		else {
			return view('report.base_report', ['content'=> $view]);
		}

	}

	public function lendsByBookGenerate(Request $request)
	{

		$data = Lend::where('book_id', $request->input('book'))->orderBy('lend_date')->get();

		if ($data->count() < 1) {
			Swal::warning('Warning', 'No data to export!');
			return back()->withInput();
		}

		$book = Book::find($request->input('book'));
		$print = $request->has('print_report');

		$view = view('report.lends_by_book_report', compact('book', 'data', 'print'));

		if ($print){
			return $view;
		}
		else {
			return view('report.base_report', ['content'=> $view]);
		}

	}

	public function lendsByPeriodGenerate(Request $request)
	{

		$validatedFields = $request->validate([
			'initial_date' => 'required|date',
			'final_date' => 'required|date|after:initial_date',
		]);

		$period = [Carbon::parse($request->input('initial_date')), Carbon::parse($request->input('final_date'))];
		$print = $request->has('print_report');

		$lends = Lend::whereBetween('lend_date', $period)->orderBy('lend_date')->get();
		$dates_array = Lend::orderLendsByDate($lends);

		if ($lends->count() < 1) {
			Swal::warning('Warning', 'No data to export!');
			return back()->withInput();
		}

		$view = view('report.lends_by_period_report', compact('period', 'dates_array', 'print'));

		if ($print){
			return $view;
		}
		else {
			return view('report.base_report', ['content'=> $view]);
		}

	}
}
