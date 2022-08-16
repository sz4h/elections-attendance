@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.letter.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.letters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.letter.fields.id') }}
                        </th>
                        <td>
                            {{ $letter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.letter.fields.name') }}
                        </th>
                        <td>
                            {{ $letter->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.letters.index') }}">
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
            <a class="nav-link" href="#letter_voters" role="tab" data-toggle="tab">
                {{ trans('cruds.voter.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#letter_assignments" role="tab" data-toggle="tab">
                {{ trans('cruds.assignment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="letter_voters">
            @includeIf('admin.letters.relationships.letterVoters', ['voters' => $letter->letterVoters])
        </div>
        <div class="tab-pane" role="tabpanel" id="letter_assignments">
            @includeIf('admin.letters.relationships.letterAssignments', ['assignments' => $letter->letterAssignments])
        </div>
    </div>
</div>

@endsection