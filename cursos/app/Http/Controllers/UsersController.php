<?php

namespace App\Http\Controllers;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
//Jornadas//
$response = Http::get('http://192.168.100.92/api/public/api/jornadas');
$jornadas = $response->json();
//Especialidades//
$response = Http::get('http://192.168.100.92/api/public/api/especialidades');
$especialidades = $response->json();
//Cursos//
$response = Http::get('http://192.168.100.92/api/public/api/cursos');
$cursos = $response->json();

return view('users.index')
->with('jornadas',$jornadas)
->with('especialidades',$especialidades)
->with('cursos',$cursos);




    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles=Roles::all();

        return view('users.create')
        ->with('roles',$roles)
  ;  }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input=$request->all();
        User::create($input);
        return redirect(route('users.index'));
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
    public function edit(string $usu_id )
    {
        //
        $user=User::find($usu_id);
        $roles=Roles::all();
          return view('users.edit')
          ->with('user',$user)
          ->with('roles',$roles);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $usu_id)
    {
        //
        $input=$request->all();
        $user=User::find($usu_id);
        $user->update($input);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $usu_id)
    {
        //
        $users=User::find($usu_id);
       $users->delete();
       return redirect(route('users.index') );

    }

    public function exportExcel(){
       
return Excel::download(new UserExport ,'Users_excel.xlsx');
// $response = Http::get('http://192.168.100.92/api/public/api/matriculas/1/16');
// $data = $response->json();
// dd($data);


    }

       public function apiConnect(Request $rq){
       

dd($rq->all());
$response = Http::get('http://192.168.100.92/api/public/api/matriculas/1/16/');
$data = $response->json();
dd($data);


    }




}
