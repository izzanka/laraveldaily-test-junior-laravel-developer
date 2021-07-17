<?php

namespace App\Http\Controllers;

use Spatie\Image\Image;
use App\Models\Companie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanieStoreRequest;

class CompanieController extends Controller
{
    public $logoName;

    public function resize_logo($logo){

        $this->logoName = time() . '.' . $logo->extension();
        $path = $logo->storeAs('public/logos',$this->logoName);

        //resize logo with spatie
        Image::load(public_path('storage/logos') . '/' . $this->logoName)->width(100)->height(100)->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $companies = Companie::latest()->paginate(10);
        // return view('companie.index',compact('companies'));
        return view('companie.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanieStoreRequest $request)
    {
        //store logo
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            //resize logo function
            $this->resize_logo($logo);
        }else{
            $this->logoName = 'default.jpg';
        }
        
        Companie::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $this->logoName,
            'website' => $request->website
        ]);

        return redirect()->route('companies.create')->with('message',['text' => __('companie.status2'), 'class' => 'success']);
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
    public function edit(Companie $company)
    {
        return view('companie.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanieStoreRequest $request, Companie $company)
    {
        //store logo
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            //resize image function
            $this->resize_logo($logo);
        }else if($company->logo != null){
            $this->logoName = $company->logo;
        }else{
            $this->logoName = 'default.jpg';
        }

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $this->logoName,
            'website' => $request->website
        ]);

        return redirect()->route('companies.edit',$company->id)->with('message',['text' => __('companie.status3'), 'class' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companie $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('message',['text' => __('companie.status4'), 'class' => 'success']);
    }
}
