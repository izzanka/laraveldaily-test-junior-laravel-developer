<?php

namespace App\Http\Controllers\Api;

use App\Models\Companie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CompanieApiController extends Controller
{
    public function getCompanies(){
        $companie = Companie::get();
        return datatables()->of($companie)
                ->addColumn('image',function($companie){
                    $url = Storage::url('logos/' . $companie->logo);
                    return '<img src="'. $url .'" width="100" height="100" class="img-fluid" alt="logo">';
                })
                ->addColumn('action',function($companie){
                    return '<a href="/companies/'. $companie->id .'/edit"
                    class="btn btn-primary btn-sm btn-block">Edit</a>
                    <a href="/companies/' . $companie->id . '/destroy"
                    class="btn btn-danger btn-sm btn-block">Delete</a>';
                })
                ->addIndexColumn()
                ->rawColumns(['image','action'])
                ->make(true);
    }
}
