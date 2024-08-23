<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCutiRequest extends FormRequest
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
            'nomor_induk_id' => 'required|exists:employees,nomor_induk',
            'tanggal_cuti' => 'required|date',
            'lama_cuti' => 'required|numeric',
            'keterangan' => 'required|string',
        ];
    }
}
