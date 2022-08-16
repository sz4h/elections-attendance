@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.assignment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assignments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="committee_id">{{ trans('cruds.assignment.fields.committee') }}</label>
                <select class="form-control select2 {{ $errors->has('committee') ? 'is-invalid' : '' }}" name="committee_id" id="committee_id" required>
                    @foreach($committees as $id => $entry)
                        <option value="{{ $id }}" {{ old('committee_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('committee'))
                    <span class="text-danger">{{ $errors->first('committee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.committee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="area_id">{{ trans('cruds.assignment.fields.area') }}</label>
                <select class="form-control select2 {{ $errors->has('area') ? 'is-invalid' : '' }}" name="area_id" id="area_id" required>
                    @foreach($areas as $id => $entry)
                        <option value="{{ $id }}" {{ old('area_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('area'))
                    <span class="text-danger">{{ $errors->first('area') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gender_id">{{ trans('cruds.assignment.fields.gender') }}</label>
                <select class="form-control select2 {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender_id" id="gender_id" required>
                    @foreach($genders as $id => $entry)
                        <option value="{{ $id }}" {{ old('gender_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from">{{ trans('cruds.assignment.fields.from') }}</label>
                <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="number" name="from" id="from" value="{{ old('from', '0') }}" step="1" required>
                @if($errors->has('from'))
                    <span class="text-danger">{{ $errors->first('from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="to">{{ trans('cruds.assignment.fields.to') }}</label>
                <input class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}" type="number" name="to" id="to" value="{{ old('to', '0') }}" step="1" required>
                @if($errors->has('to'))
                    <span class="text-danger">{{ $errors->first('to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.to_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="letters">{{ trans('cruds.assignment.fields.letter') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('letters') ? 'is-invalid' : '' }}" name="letters[]" id="letters" multiple required>
                    @foreach($letters as $id => $letter)
                        <option value="{{ $id }}" {{ in_array($id, old('letters', [])) ? 'selected' : '' }}>{{ $letter }}</option>
                    @endforeach
                </select>
                @if($errors->has('letters'))
                    <span class="text-danger">{{ $errors->first('letters') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.letter_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection