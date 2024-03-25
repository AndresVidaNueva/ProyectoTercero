<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\GeneraOrdenes;
use DB;
use Auth;

class GeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $rq){

        $periodos=DB::select("SELECT * FROM aniolectivo");
        $jornadas=DB::select("SELECT * FROM jornadas");
        $meses=$this->meses();
        return view('generador.index')
        ->with('periodos',$periodos)
        ->with('jornadas',$jornadas)
        ->with('meses',$meses);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

public function generarOrdenes(Request $rq){
$datos=$rq->all();
$anl_id=$datos['anl_id'];
$jor_id=$datos['jor_id'];
$mes=$datos['mes'];
$estudiantes=DB::select("SELECT *, m.id as mat_id FROM matriculas m 
    JOIN estudiantes e ON m.est_id=e.id 
    WHERE m.anl_id=$anl_id 
    AND m.jor_id=$jor_id 
    AND m.mat_estado=1 
    ");
$valor_pagar=75;
foreach ($estudiantes as $e) {
$input['mat_id']=$e->mat_id; //id de la matricula
// $input['codigo']=; //MGM3IF-8989
$input['fecha_registro']=date('Y-m-d');
$input['valor_pagar']=$valor_pagar;
$input['fecha_pago']=null;
$input['valor_pagado']=0; 
$input['estado']=0; //Pendiente->0 Pagado->1
$input['mes']=$this->mesesLetras($mes);
$input['responsable']=Auth::user()->name ;
// $input['secuencial']=; //Secuencial del grupo/orden
$input['documento']=null;
}



   }
public function meses(){
    $meses= [
        '1' => 'Enero',
        '2' => 'Febrero',
        '3' => 'Marzo',
        '4' => 'Abril',
        '5' => 'Mayo',
        '6' => 'Junio',
        '7' => 'Julio',
        '8' => 'Agosto',
        '9' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre',
    ];
    return $meses;
 }

 public function mesesLetras($nmes){
       $result="";
        $nmes==1?$result="E":"";
        $nmes==2?$result="F":"";
        $nmes==3?$result="M":"";
        $nmes==4?$result="A":"";
        $nmes==5?$result="MY":"";
        $nmes==6?$result="J":"";
        $nmes==7?$result="JL":"";
        $nmes==8?$result="AG":"";
        $nmes==9?$result="S":"";
        $nmes==10?$result="O":"";
        $nmes==11?$result="N":"";
        $nmes==12?$result="D":"";

        return $result;
        }
 }











