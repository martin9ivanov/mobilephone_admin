<?php

namespace App\Http\Controllers;

use App\Brands;
use App\OS;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Yajra\Datatables\Datatables;
use App\Products;

class ProductsController extends Controller
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
        return view('products.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $products = Products::leftJoin('brands','products.brand_id','=','brands.id')
            ->select(array('products.id', 'products.title', 'brands.name as brand', 'products.screen'))
            ->where('products.active','=','active');
        return Datatables::of($products)
            ->addColumn('action', '<a href="products\deactivate\{{$id}}" class="btn btn-danger">Deactivate</a>
                                   <a href="products\view\{{$id}}" class="btn btn-info">View</a>')
            ->make(true);
    }

    public function add()
    {
        $brands = Brands::where('active','=', 'active')->orderBy('name')->pluck('id', 'name');
        $os = OS::where('active', '=', 'active')->orderBy('name')->pluck('id', 'name');

        return view("products.add", compact('brands','os'));
    }

    public function deactivate(Products $products)
    {
        $products->active = 'deactivated';
        $products->update();
        return back();
    }

    public function store()
    {
        $products = new Products;
        $products->title = request()->title;
        $products->screen = request()->screen;
        $products->description = request()->description;
        $products->brand_id = request()->brand_id;
        $products->os_id = request()->os_id;
        $products->save();
        return Redirect::to('/products');
    }

    public function view(Products $products)
    {
        $brand = Brands::where('id','=',$products->brand_id)->value('name');
        $os = Brands::where('id','=',$products->os_id)->value('name');
        return view("products.view", compact('products', 'brand', 'os'));
    }

}
