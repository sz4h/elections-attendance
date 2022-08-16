<?php

namespace App\Http\Requests;

use App\Models\Committee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommitteeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('committee_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
