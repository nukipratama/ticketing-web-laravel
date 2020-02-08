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
            'emailPemesan' => 'required|email',
            'namePeserta.*' => 'required',
            'emailPeserta.*' => 'required|email',
            'addressPeserta.*' => 'required',
            'telPeserta.*' => 'required|min:8',
            'emergencyPeserta.*' => 'required|min:8',
            'genderPeserta.*' => 'required|max:1|different:null',
            'birthdatePeserta.*' => 'required',
            'idPeserta.*' => 'required',
            'sizePeserta.*' => 'required|max:1|different:null',
            'imgPeserta.*' => 'required|image|mimes:jpeg,png,jpg,bmp|max:4096'
        ];
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
