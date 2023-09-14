<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'art.title' => 'required|string|max:100',
            'art.body' => 'required|string|max:4000',
        ];
    }
}
