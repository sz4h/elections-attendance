@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.committee.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.committees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.committee.fields.id') }}
                        </th>
                        <td>
                            {{ $committee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.committee.fields.name') }}
                        </th>
                        <td>
                            {{ $committee->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.committees.index') }}">
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
            <a class="nav-link" href="#committee_assignments" role="tab" data-toggle="tab">
                {{ trans('cruds.assignment.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#committee_voters" role="tab" data-toggle="tab">
                {{ trans('cruds.voter.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="committee_assignments">
            @includeIf('admin.committees.relationships.committeeAssignments', ['assignments' => $committee->committeeAssignments])
        </div>
        <div class="tab-pane" role="tabpanel" id="committee_voters">
            @includeIf('admin.committees.relationships.committeeVoters', ['voters' => $committee->committeeVoters])
        </div>
    </div>
</div>

@endsection