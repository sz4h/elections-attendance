<?php

namespace App\Http\Requests;

use App\Models\Assignment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssignmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assignment_create');
    }

    public function rules()
    {
        return [
            'committee_id' => [
                'required',
                'integer',
            ],
            'area_id' => [
                'required',
                'integer',
            ],
            'gender_id' => [
                'required',
                'integer',
            ],
            'from' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'to' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'letters.*' => [
                'integer',
            ],
            'letters' => [
                'required',
                'array',
            ],
        ];
    }
}
