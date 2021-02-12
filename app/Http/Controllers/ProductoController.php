<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::select('CATEGORY', 'PRODUCT_ID', 'PRODUCT_ORDER', 'COST')
         ->orderBy('PRODUCT_ORDER')
         ->get();

        return view('productos.index', ['productos' => $productos]);
    }

    //API Endpoint
    public function getAll()
    {
        $productos = Producto::select('CATEGORY', 'PRODUCT_ID', 'PRODUCT_ORDER', 'COST')
        ->where('CATEGORY', '!=', null)
         ->orderBy('PRODUCT_ORDER')
         ->get();

         return response()->json(['message' => 'Success!', 'data' => $productos]);
    }

    //Import productos

    public function importProductos(){

        Producto::truncate();
        Excel::import(new ProductsImport, request()->file('file'));

        return back()->with('success', 'Se actualizo el órden de los productos!.');
    }

    //Export productos
    public function export(Request $request){
        return Excel::download(new ProductsExport, 'PRODUCTS_ORDER.xlsx');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
