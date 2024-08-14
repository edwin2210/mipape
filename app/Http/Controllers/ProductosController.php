<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Productos = Producto::get();
        //dd($estandares);
        return Inertia::render('Productos/Views/Index', [
            'Productos' => $Productos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $token = token_api();
        return Inertia::render('Productos/Views/Create', [
            'token' => $token
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('llegaaaa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
