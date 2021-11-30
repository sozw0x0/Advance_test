<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ZipCodeRule;

class ContactRequest extends FormRequest
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
    protected function getValidatorInstance()
    {
        $data = $this->all();

        $data['fullname'] = $this->input('last_name') . ' ' . $this->input('first_name');

        $this->getInputSource()->replace($data);

        return parent::getValidatorInstance();
    }

    protected function prepareForValidation()
    {
        $this->merge(['english' => mb_convert_kana($this->english, 'as')]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'gender' => 'required',
            'email'    => 'required|email',
            'postcode' => ['required',new ZipCodeRule()],
            'address' => 'required',
            'opinion' => 'required|max:120',
        ];
    }
}
