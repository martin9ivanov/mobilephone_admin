<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Datatables;
use App\Log;

class LogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('logs.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $logs = Log::leftJoin('users','logs.user_id','=','users.id')
                        ->select(array('logs.id', 'users.name as username', 'users.email as user_email', 'logs.created_at as login'));
        return Datatables::of($logs)->make(true);
    }
}
