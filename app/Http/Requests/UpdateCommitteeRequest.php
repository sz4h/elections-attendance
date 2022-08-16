<?php

namespace App\Http\Requests;

use App\Models\Committee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCommitteeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('committee_edit');
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
