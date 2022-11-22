<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KursusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kategori_id'       =>  'required',
            'nama_kursus'       =>  'required',
            'harga'             =>  'required',
            'kuota'             =>  'required',
            'deskripsi'         =>  'required',
            'thumbnail'         =>  'required',
            'durasi'            =>  'required',
        ];
    }
    public function messages()
    {
        return [
            'kategori_id.required'       =>  'Pilih Kategori Kursus',
            'nama_kursus.required'       =>  'Masukan Nama Kursus',
            'harga.required'             =>  'Masukan Harga Kursus',
            'kuota.required'             =>  'Masukan Harga Kursus',
            'deskripsi.required'         =>  'Masukan deskripsi Kursus',
            'thumbnail.required'         =>  'Masukan gambar',
            'durasi.required'            =>  'Masukan durasi',
        ];
    }
}
