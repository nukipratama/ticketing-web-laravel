<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantForm extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            // 'emailPemesan' => 'required|email:rfc',
            // 'namePeserta.*' => 'required',
            // 'emailPeserta.*' => 'required|email:rfc',
            // 'addressPeserta.*' => 'required',
            // 'telPeserta.*' => 'required|min:8',
            // 'emergencyPeserta.*' => 'required|min:8',
            // 'genderPeserta.*' => 'required',
            // 'birthdatePeserta.*' => 'required',
            // 'idPeserta.*' => 'required',
            // 'sizePeserta.*' => 'required',
            'imgPeserta' => 'required',
            'imgPeserta.*' => 'image|max:2048'
        ];
        // dd($this->request->idPeserta);
        return $rules;
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    // public function withValidator($validator)
    // { 
    //     if ($validator->fails())
    //     {
    //         return redirect('register')->withErrors($validator);
    //     }
    // }
}
