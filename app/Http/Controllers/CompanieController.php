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

    public function resizing($logo){

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
        $companies = Companie::latest()->paginate(4);
        return view('companie.index',compact('companies'));
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
            //resize image function
            $this->resizing($logo);
        }else{
            $this->logoName = 'default.jpg';
        }
        
        Companie::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $this->logoName,
            'website' => $request->website
        ]);

        return back()->with('message',['text' => 'Companie Added Sucessfully!', 'class' => 'success']);
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
    public function edit($id)
    {
        $companie = Companie::find($id);
        return view('companie.edit',compact('companie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanieStoreRequest $request, $id)
    {
        $companie = Companie::find($id);

        //store logo
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            //resize image function
            $this->resizing($logo);
        }else if($companie->logo != null){
        }else{
            $this->logoName = 'default.jpg';
        }

        $companie->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $this->logoName,
            'website' => $request->website
        ]);

        return back()->with('message',['text' => 'Companie Updated Sucessfully!', 'class' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companie $companie)
    {
        $companie->delete();
        return back()->with('message',['text' => 'Companie deleted successfully!', 'class' => 'success']);
    }
}
