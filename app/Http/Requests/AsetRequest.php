<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'         => 'required',
            'year'          => 'required|numeric',
            'desc'          => 'required',
            'pdf'           => 'required|file|mimes:pdf|max:10240',
            'status'        => 'required',
            'publish_date'  => 'required',
        ];
    }
}
