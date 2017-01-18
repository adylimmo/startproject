<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fpdf;
use App\User;
use App\Models\products;
class YourController extends Controller
{
    public function exportpdf()
    {
        $datauser = User::all();
        $pdf = new Fpdf();
        $pdf::AddPage(); 
        $pdf::SetFont('Arial','B',18); 
        $pdf::Cell(0,10,"Title",0,"","C"); 
        $pdf::Ln(); 
        $pdf::Ln(); 
        $pdf::SetFont('Arial','B',12); 
        $pdf::cell(30,8,"Nama",1,"","C"); 
        $pdf::cell(70,8,"Email",1,"","C"); 
        $pdf::cell(50,8,"Username",1,"","C"); 
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($datauser as $user) 
        {
            $pdf::Cell(30,8,$user->name,1,"","C");
            $pdf::Cell(70,8,$user->email,1,"","C");
            $pdf::Cell(50,8,$user->username,1,"","C");
            $pdf::Ln();
        } 
        $pdf::Output(); 
        exit;
    }

    public function printproducts()
    {
        $dataproducts = products::all();
        $pdf = new Fpdf();
        $pdf::AddPage(); 
        $pdf::SetFont('Arial','B',18); 
        $pdf::Cell(0,10,"Title",0,"","C"); 
        $pdf::Ln(); 
        $pdf::Ln(); 
        $pdf::SetFont('Arial','B',12); 
        $pdf::cell(30,8,"KODE",1,"","C"); 
        $pdf::cell(70,8,"NAMA",1,"","C"); 
        $pdf::cell(20,8,"UNIT",1,"","C"); 
        $pdf::cell(50,8,"STOCK",1,"","C"); 
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($dataproducts as $products) 
        {
            $pdf::Cell(30,8,$products->productCode,1,"","C");
            $pdf::Cell(70,8,$products->productName,1,"","C");
            $pdf::Cell(20,8,$products->unit,1,"","C");
            $pdf::Cell(50,8,$products->stock,1,"","C");
            $pdf::Ln();
        } 
        $pdf::Output(); 
        exit;
    }
}
