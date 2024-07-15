<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\validation;
use Barryvdh\DomPDF\Facade\Pdf;


class CertificateController extends Controller
{
    //
    public function searchCertificate(Request $request)
    {
        $user = DB::connection('notas')->table('users')->where('nit', $request->nit)->first();
        $certification = validation::where('nit',$request->nit)->get();
        return view('certificate', compact('certification','user'));
    }

    public function generateCertificate(){

        $document = Pdf::loadView('generate.certificate');
        return $document->stream();

    }

}
