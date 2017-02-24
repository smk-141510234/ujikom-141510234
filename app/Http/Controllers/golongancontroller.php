<?php

namespace App\Http\Controllers;
use Request;
use App\golongan;
use Validator;
use Input;

class golongancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
       // $this->middleware('auth');
       // $this->middleware('hrd');
    }
    public function index()
    {
        //
        $golongan=golongan::all();
        return view ('golongan.index',compact('golongan'));
    }

    /**
     * Show the form fo;r creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
        $golongan=golongan::all();
        return view ('golongan.create',compact('golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $golongan=Request::all();
         $rules=['kode_golongan'=>'required|unique:golongans',
                 'nama_golongan'=>'required|unique:golongans',
                 'besaran_uang'=>'required|unique:golongans'];
         $message=[
         'kode_golongan.unique'=>'Masukan Sudah Ada','kode_golongan.required'=>'Kolom Jangan Kosong',
         'nama_golongan.unique'=>'Masukan Sudah Ada','nama_golongan.required'=>'Kolom Jangan Kosong',
         'besaran_uang.unique'=>'Masukan Sudah Ada','besaran_uang.required'=>'Kolom Jangan Kosong'];
         $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/golongan/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
         
         golongan::create($golongan);
         return redirect('golongan');
        }
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
        //
        $golongan=golongan::find($id);
        return view('golongan.edit',compact('golongan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


         $golongan=Request::all();
         
         $rules=['kode_golongan'=>'required:golongans',
                 'nama_golongan'=>'required:golongans',
                 'besaran_uang'=>'required:golongans'];
         $message=[
         'kode_golongan.required'=>'Kolom Jangan Kosong',
         'nama_golongan.required'=>'Kolom Jangan Kosong',
         'besaran_uang.required'=>'Kolom Jangan Kosong'];
         $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/golongan/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
        $golonganupdate=Request::all();
        $golongan=golongan::find($id);
        $golongan->update($golonganupdate);
        return redirect('/golongan');
         golongan::create($golongan);
         return redirect('golongan');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        golongan::find($id)->delete()       ;
        return redirect('golongan');
    }
}
