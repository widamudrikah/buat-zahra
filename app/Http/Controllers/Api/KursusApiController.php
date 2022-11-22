<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Helper\MessageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class KursusApiController extends Controller
{
   public function index()
   {
    $kursus = Kursus::get()
            ->map(function($kursus){
                return $this->format($kursus);
            });
        return $this->result($kursus);
   }

    public function format($kursus)
    {
        return [
            'id'                => $kursus->id,
            'kategori'          => $kursus->kategori->nama_kategori,
            'nama_kursus'       => $kursus->nama_kursus,
            'slug'              => $kursus->slug,
            'harga'             => $kursus->harga,
            'deskripsi'         => $kursus->deskripsi,
            'thumbnail'         => $kursus->thumbnail,
            'kuota'             => $kursus->kuota,
            'durasi'            => $kursus->durasi,
            'status'            => $kursus->status,
        ];
    }

    public function result($kursus)
    {
        return response()->json([
            'status'    => true,
            'pesan'     => "Berhasil menampilkan data kursus",
            'data'      => $kursus,
        ]);
    }

    public function tambahKursus(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'kategori_id'       => 'required',
            'nama_kursus'       => 'required|unique:kursuses',
            'harga'             => 'required',
            'deskripsi'         => 'required',
            'thumbnail'         => 'required',
            'kuota'             => 'required',
            'durasi'            => 'required',
            'status'            => 'required',
        ]);

        if($validasi->fails()){
            $valIndex = $validasi->errors()->all();
            return MessageHelper::error(false, $valIndex[0]);
        }
        
        $kursus = Kursus::create([
            'kategori_id'       => $request->kategori_id,
            'nama_kursus'       => $request->nama_kursus,
            'slug'              => Str::slug($request->nama_kursus),
            'harga'             => $request->harga,
            'deskripsi'         => $request->deskripsi,
            'thumbnail'         => $request->file('thumbnail')->store('img-kursus'),
            'kuota'             => $request->kuota,
            'durasi'            => $request->durasi,
            'status'            => $request->status,
        ]);
        $kursus = Kursus::where('id', $kursus->id)
                ->get()
                ->map(function($kursus){
                    return $this->format($kursus);
                });
        return $this->result($kursus);
    }
}
