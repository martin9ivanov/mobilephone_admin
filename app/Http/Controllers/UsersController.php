<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Displays users front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('users.index');
    }

    /**
     * Process users ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(User::select('*'))
            ->make(true);
    }
}
