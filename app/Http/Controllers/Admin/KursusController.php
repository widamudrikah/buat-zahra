<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KursusRequest;
use App\Models\Kategori;
use App\Models\Kursus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index()
    {
        $kursus = Kursus::all();
        return view('template.pages.kursus',[
            'kursus'    => $kursus,
        ]);
    }
    public function create()
    {
        $kategori = Kategori::all();
        return view('template.pages.kursus-create',[
            'kategori'  =>$kategori,
        ]);
    }
    public function store(KursusRequest $request)
    {
        Kursus::create([
            'kategori_id'       =>$request->kategori_id,
            'nama_kursus'       =>$request->nama_kursus,
            'slug'              =>Str::slug($request->nama_kursus),
            'harga'             =>$request->harga,
            'deskripsi'         =>$request->deskripsi,
            'thumbnail'         =>$request->file('thumbnail')->store('img-kursus'),
            'kuota'             =>$request->kuota,
            'durasi'            =>$request->durasi,
        ]);
        return redirect()->route('kursus')->with('Kursus berhasil disimpan');
    }
    
}
