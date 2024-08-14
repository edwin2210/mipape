<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // dd($request);
        $usuario = auth()->user();
        dd('here');
        // $validator = Validator::make(
        //     $request->all()
        //     ,[
        //             'TipoLicencia' => 'required'
        //         ,   'FolioNuevo' => 'required'
        //         ,   'FechaLicenciaInicial' => 'required'
        //         ,   'FechaLicenciaFinal' => 'required'
        //         ,   'AplicaQuincena' => 'required'
        //     ]
        // )
        // ->setAttributeNames([
        //             'TipoLicencia' => 'tipo'
        //         ,   'FolioNuevo' => 'folio'
        //         ,   'FechaLicenciaInicial' => 'fecha inicial'
        //         ,   'FechaLicenciaFinal' => 'fecha final'
        //         ,   'AplicaQuincena' =>  'aplica en la quincena'
        // ]);
        // if($validator->fails())
        // {
        //     return response()->json(['errors'=>$validator->errors()]);
        // }
        try {
            $prducto = Producto::create([
                
            ]);

        }
        catch(Exception $ex){
            return response()->json(['error' => 'Error']);
        }
        return response()->json(['success' => 'El producto fue agregado correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
