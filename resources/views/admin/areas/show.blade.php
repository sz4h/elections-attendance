@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.area.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.areas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.area.fields.id') }}
                        </th>
                        <td>
                            {{ $area->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.area.fields.name') }}
                        </th>
                        <td>
                            {{ $area->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.areas.index') }}">
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
            <a class="nav-link" href="#area_assignments" role="tab" data-toggle="tab">
                {{ trans('cruds.assignment.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#area_voters" role="tab" data-toggle="tab">
                {{ trans('cruds.voter.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="area_assignments">
            @includeIf('admin.areas.relationships.areaAssignments', ['assignments' => $area->areaAssignments])
        </div>
        <div class="tab-pane" role="tabpanel" id="area_voters">
            @includeIf('admin.areas.relationships.areaVoters', ['voters' => $area->areaVoters])
        </div>
    </div>
</div>

@endsection