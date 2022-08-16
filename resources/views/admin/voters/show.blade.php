@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.voter.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.id') }}
                        </th>
                        <td>
                            {{ $voter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.circuit_no') }}
                        </th>
                        <td>
                            {{ $voter->circuit_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.parlmaint_no') }}
                        </th>
                        <td>
                            {{ $voter->parlmaint_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.parlmaint_name') }}
                        </th>
                        <td>
                            {{ $voter->parlmaint_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.parlmaint_type') }}
                        </th>
                        <td>
                            {{ $voter->parlmaint_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.gender') }}
                        </th>
                        <td>
                            {{ $voter->gender->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.letter') }}
                        </th>
                        <td>
                            {{ $voter->letter->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.register_number') }}
                        </th>
                        <td>
                            {{ $voter->register_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.register_date') }}
                        </th>
                        <td>
                            {{ $voter->register_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.moi_reference') }}
                        </th>
                        <td>
                            {{ $voter->moi_reference }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.full_name') }}
                        </th>
                        <td>
                            {{ $voter->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.name_1') }}
                        </th>
                        <td>
                            {{ $voter->name_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.name_2') }}
                        </th>
                        <td>
                            {{ $voter->name_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.name_3') }}
                        </th>
                        <td>
                            {{ $voter->name_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.name_4') }}
                        </th>
                        <td>
                            {{ $voter->name_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.birth_day') }}
                        </th>
                        <td>
                            {{ $voter->birth_day }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.job') }}
                        </th>
                        <td>
                            {{ $voter->job }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.address') }}
                        </th>
                        <td>
                            {{ $voter->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.register_status') }}
                        </th>
                        <td>
                            {{ $voter->register_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.phone') }}
                        </th>
                        <td>
                            {{ $voter->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.attended') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $voter->attended ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.targeted') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $voter->targeted ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.area') }}
                        </th>
                        <td>
                            {{ $voter->area->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.committee') }}
                        </th>
                        <td>
                            {{ $voter->committee->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voter.fields.admin') }}
                        </th>
                        <td>
                            {{ $voter->admin->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection