<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\OS;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

class OSController extends Controller
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
        return view('os.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(OS::select('*'))
            ->addColumn('action', '<a href="os\deactivate\{{$id}}">Deactivate</a>')
            ->make(true);
    }

    public function add()
    {
        return view("os.add");
    }

    public function store()
    {
        $os = new OS;
        $os->name = request()->name;
        $os->save();
        return Redirect::to('/os');
    }

    public function deactivate(OS $os)
    {
        $os->active = 'deactivated';
        $os->update();
        return back();
    }
}
