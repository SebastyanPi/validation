<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\validation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function listStudent($id)
    {
        $user = DB::connection('notas')->table('users')->where('id', $id)->first();
        $programs = DB::connection('notas')->table('programs')->get();
        $certification =  validation::where('nit',$user->nit)->get();
        return view('listStudent',compact('user','programs','certification'));
    }

    public function addCertification (Request $request){
       do {
        $code = "0".$this->generarCodigo(14);
        $count = validation::where('code',$code)->count();
       } while ($count > 0);

        validation::create([
            "nit" => $request->nit, 
            "type" => $request->type, 
            "title" => $request->title,
            "register" => $request->register,
            "acta" => $request->acta,
            "folio" => $request->folio,
            "code" => $code,
        ]);
        return redirect()->route('listStudent',$request->id);
    }


    public function generarCodigo($longitud) {
        $key = '';
        //$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $pattern = '1234567890';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
        return $key;
    }   
}
