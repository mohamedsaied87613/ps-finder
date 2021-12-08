<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePSRequest extends FormRequest
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
        return [
            'name' => 'required',
            'zone_name' => 'required',
            'full_address' => 'required | unique:play_stations',
            'hour_price' => 'required | integer | min:0',
            'open_at' => 'date_format:H:i',
            'closed_at' => 'date_format:H:i'
        ];
    }
}
