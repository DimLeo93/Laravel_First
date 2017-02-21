<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = $request->get('search');

        $users = User::where('username', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
			->orWhere('fname', 'like', "%$search%")
			->orWhere('lname', 'like', "%$search%")
            ->paginate(5)
            ->appends(['search' => $search])
        ;

        return view('welcome', compact('users'));
    }
}
