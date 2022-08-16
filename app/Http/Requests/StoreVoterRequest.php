<?php

namespace App\Http\Requests;

use App\Models\Voter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVoterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('voter_create');
    }

    public function rules()
    {
        return [
            'circuit_no' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'parlmaint_no' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'parlmaint_name' => [
                'string',
                'nullable',
            ],
            'parlmaint_type' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'gender_id' => [
                'required',
                'integer',
            ],
            'letter_id' => [
                'required',
                'integer',
            ],
            'register_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'register_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'moi_reference' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'full_name' => [
                'string',
                'required',
            ],
            'name_1' => [
                'string',
                'nullable',
            ],
            'name_2' => [
                'string',
                'nullable',
            ],
            'name_3' => [
                'string',
                'nullable',
            ],
            'name_4' => [
                'string',
                'nullable',
            ],
            'birth_day' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'job' => [
                'string',
                'nullable',
            ],
            'register_status' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'area_id' => [
                'required',
                'integer',
            ],
            'committee_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
