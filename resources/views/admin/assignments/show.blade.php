@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assignment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assignments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.id') }}
                        </th>
                        <td>
                            {{ $assignment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.committee') }}
                        </th>
                        <td>
                            {{ $assignment->committee->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.area') }}
                        </th>
                        <td>
                            {{ $assignment->area->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.gender') }}
                        </th>
                        <td>
                            {{ $assignment->gender->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.from') }}
                        </th>
                        <td>
                            {{ $assignment->from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.to') }}
                        </th>
                        <td>
                            {{ $assignment->to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.letter') }}
                        </th>
                        <td>
                            @foreach($assignment->letters as $key => $letter)
                                <span class="label label-info">{{ $letter->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assignments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection