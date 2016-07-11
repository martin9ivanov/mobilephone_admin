<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Datatables;
use App\Brands;
use Illuminate\Support\Facades\Redirect;


class BrandsController extends Controller
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
        return view('brands.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Brands::select('*'))
            ->addColumn('action', '<a href="brands\deactivate\{{$id}}">Deactivate</a>')
            ->make(true);
    }

    public function add()
    {
        return view("brands.add");
    }

    public function store()
    {
        $brands = new Brands;
        $brands->name = request()->name;
        $brands->save();
        return Redirect::to('/brands');
    }

    public function deactivate(Brands $brands)
    {
        $brands->active = 'deactivated';
        $brands->update();
        return back();
    }
}
