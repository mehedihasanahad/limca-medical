<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index() 
    {
        // $data = Makepdf::find(1);
        // share data to view
        // view()->share('data',$data);
        $pdf = PDF::loadView('appointmentpdf')->setOptions(['defaultFont' => 'sans-serif']);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
