<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {
        $validated=Validator::make($request->all(),[
            'nim'=>'required|unique:mahasiswas,nim',
            'nama'=>'required'
        ]);

        if ($validated->fails()) {
            return response()->json(['status'=>'error','message'=>'Data tidak lengkap']);
           // var_dump($validated);
        }

        Mahasiswa::create($request->all());
        return response()->json(['status'=>'success','message'=>'Data Berhasil Ditambahkan']);

    }

    public function getMahasiswa()
    {
        $data=Mahasiswa::all();

        return response()->json($data);
    }

    public function update(Request $request)
    {
        $validated=$this->validate($request,[
            'nama'=>'required',
            'nim'=>'required'
        ]);

        Mahasiswa::where('NIM',$request->nim)->update(['nama'=>$request->nama]);

        return response()->json(['status'=>'success','message'=>'data behasil di edit','data'=>$validated]);

    }

    public function delete($nim)
    {
        Mahasiswa::where('nim',$nim)->delete();

        return response()->json(['status'=>'success','message'=>'data berhasil dihapus']);
    }


    //
}