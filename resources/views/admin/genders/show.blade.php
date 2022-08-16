@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gender.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.genders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gender.fields.id') }}
                        </th>
                        <td>
                            {{ $gender->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gender.fields.name') }}
                        </th>
                        <td>
                            {{ $gender->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.genders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#gender_assignments" role="tab" data-toggle="tab">
                {{ trans('cruds.assignment.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#gender_voters" role="tab" data-toggle="tab">
                {{ trans('cruds.voter.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="gender_assignments">
            @includeIf('admin.genders.relationships.genderAssignments', ['assignments' => $gender->genderAssignments])
        </div>
        <div class="tab-pane" role="tabpanel" id="gender_voters">
            @includeIf('admin.genders.relationships.genderVoters', ['voters' => $gender->genderVoters])
        </div>
    </div>
</div>

@endsection