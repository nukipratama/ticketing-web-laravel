<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class ParticipantForm extends FormRequest
{
    // input sanitizer
    use SanitizesInput;
    public function filters()
    {
        return [
            'emailPemesan' => 'trim|escape|lowercase',
            'namePeserta.*' => 'trim|escape|uppercase',
            'emailPeserta.*' => 'trim|escape|lowercase',
            'addressPeserta.*' => 'trim|escape|capitalize',
            'telPeserta.*' => 'digit',
            'emergencyPeserta.*' => 'digit',
            'genderPeserta.*' => 'trim|escape|lowercase',
            'birthdatePeserta.*' => 'trim',
            'idPeserta.*' => 'trim|escape',
            'sizePeserta.*' => 'trim|escape',
            'medicalPeserta.*' => 'trim|escape',
            'communityPeserta.*' => 'trim|escape|uppercase'
        ];
    }
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'emailPemesan' => 'required|email:rfc',
            'namePeserta.*' => 'required',
            'emailPeserta.*' => 'required|email:rfc',
            'addressPeserta.*' => 'required',
            'telPeserta.*' => 'required|min:8',
            'emergencyPeserta.*' => 'required|min:8',
            'genderPeserta.*' => 'required',
            'birthdatePeserta.*' => 'required|date',
            'idPeserta.*' => 'required',
            'sizePeserta.*' => 'required',
            'medicalPeserta.*' => 'nullable',
            'communityPeserta.*' => 'nullable'
        ];
        foreach ($this->request->get('namePeserta') as $key => $val) {
            $rules['imgPeserta.' . $key] = 'required|image|max:2048';
        }
        return $rules;
    }
    public function attributes()
    {
        $attributes = [
            'emailPemesan' => 'Email Pemesan',
            'namePeserta.*' => 'Nama',
            'emailPeserta.*' => 'Email',
            'addressPeserta.*' => 'Alamat',
            'telPeserta.*' => 'No Telp',
            'emergencyPeserta.*' => 'No Telp Darurat',
            'genderPeserta.*' => 'Jenis Kelamin',
            'birthdatePeserta.*' => 'Tanggal Lahir',
            'idPeserta.*' => 'No Identitas',
            'sizePeserta.*' => 'Ukuran Baju'
        ];
        foreach ($this->request->get('namePeserta') as $key => $val) {
            $attributes['imgPeserta.' . $key] = 'Foto Identitas';
        }
        return $attributes;
    }
    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong!',
            'regex' => 'Format :attribute tidak dapat digunakan!',
            'min' => ':attribute minimal mengandung :min karakter!',
            'image' => ':attribute harus merupakan gambar!'
        ];
    }
}
