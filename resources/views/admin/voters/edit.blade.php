@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.voter.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.voters.update", [$voter->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="circuit_no">{{ trans('cruds.voter.fields.circuit_no') }}</label>
                <input class="form-control {{ $errors->has('circuit_no') ? 'is-invalid' : '' }}" type="number" name="circuit_no" id="circuit_no" value="{{ old('circuit_no', $voter->circuit_no) }}" step="1" required>
                @if($errors->has('circuit_no'))
                    <span class="text-danger">{{ $errors->first('circuit_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.circuit_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parlmaint_no">{{ trans('cruds.voter.fields.parlmaint_no') }}</label>
                <input class="form-control {{ $errors->has('parlmaint_no') ? 'is-invalid' : '' }}" type="number" name="parlmaint_no" id="parlmaint_no" value="{{ old('parlmaint_no', $voter->parlmaint_no) }}" step="1">
                @if($errors->has('parlmaint_no'))
                    <span class="text-danger">{{ $errors->first('parlmaint_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.parlmaint_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parlmaint_name">{{ trans('cruds.voter.fields.parlmaint_name') }}</label>
                <input class="form-control {{ $errors->has('parlmaint_name') ? 'is-invalid' : '' }}" type="text" name="parlmaint_name" id="parlmaint_name" value="{{ old('parlmaint_name', $voter->parlmaint_name) }}">
                @if($errors->has('parlmaint_name'))
                    <span class="text-danger">{{ $errors->first('parlmaint_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.parlmaint_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="parlmaint_type">{{ trans('cruds.voter.fields.parlmaint_type') }}</label>
                <input class="form-control {{ $errors->has('parlmaint_type') ? 'is-invalid' : '' }}" type="number" name="parlmaint_type" id="parlmaint_type" value="{{ old('parlmaint_type', $voter->parlmaint_type) }}" step="1" required>
                @if($errors->has('parlmaint_type'))
                    <span class="text-danger">{{ $errors->first('parlmaint_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.parlmaint_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gender_id">{{ trans('cruds.voter.fields.gender') }}</label>
                <select class="form-control select2 {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender_id" id="gender_id" required>
                    @foreach($genders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('gender_id') ? old('gender_id') : $voter->gender->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="letter_id">{{ trans('cruds.voter.fields.letter') }}</label>
                <select class="form-control select2 {{ $errors->has('letter') ? 'is-invalid' : '' }}" name="letter_id" id="letter_id" required>
                    @foreach($letters as $id => $entry)
                        <option value="{{ $id }}" {{ (old('letter_id') ? old('letter_id') : $voter->letter->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('letter'))
                    <span class="text-danger">{{ $errors->first('letter') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.letter_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="register_number">{{ trans('cruds.voter.fields.register_number') }}</label>
                <input class="form-control {{ $errors->has('register_number') ? 'is-invalid' : '' }}" type="number" name="register_number" id="register_number" value="{{ old('register_number', $voter->register_number) }}" step="1" required>
                @if($errors->has('register_number'))
                    <span class="text-danger">{{ $errors->first('register_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.register_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="register_date">{{ trans('cruds.voter.fields.register_date') }}</label>
                <input class="form-control date {{ $errors->has('register_date') ? 'is-invalid' : '' }}" type="text" name="register_date" id="register_date" value="{{ old('register_date', $voter->register_date) }}" required>
                @if($errors->has('register_date'))
                    <span class="text-danger">{{ $errors->first('register_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.register_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="moi_reference">{{ trans('cruds.voter.fields.moi_reference') }}</label>
                <input class="form-control {{ $errors->has('moi_reference') ? 'is-invalid' : '' }}" type="number" name="moi_reference" id="moi_reference" value="{{ old('moi_reference', $voter->moi_reference) }}" step="1" required>
                @if($errors->has('moi_reference'))
                    <span class="text-danger">{{ $errors->first('moi_reference') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.moi_reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="full_name">{{ trans('cruds.voter.fields.full_name') }}</label>
                <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" name="full_name" id="full_name" value="{{ old('full_name', $voter->full_name) }}" required>
                @if($errors->has('full_name'))
                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.full_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_1">{{ trans('cruds.voter.fields.name_1') }}</label>
                <input class="form-control {{ $errors->has('name_1') ? 'is-invalid' : '' }}" type="text" name="name_1" id="name_1" value="{{ old('name_1', $voter->name_1) }}">
                @if($errors->has('name_1'))
                    <span class="text-danger">{{ $errors->first('name_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.name_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_2">{{ trans('cruds.voter.fields.name_2') }}</label>
                <input class="form-control {{ $errors->has('name_2') ? 'is-invalid' : '' }}" type="text" name="name_2" id="name_2" value="{{ old('name_2', $voter->name_2) }}">
                @if($errors->has('name_2'))
                    <span class="text-danger">{{ $errors->first('name_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.name_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_3">{{ trans('cruds.voter.fields.name_3') }}</label>
                <input class="form-control {{ $errors->has('name_3') ? 'is-invalid' : '' }}" type="text" name="name_3" id="name_3" value="{{ old('name_3', $voter->name_3) }}">
                @if($errors->has('name_3'))
                    <span class="text-danger">{{ $errors->first('name_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.name_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_4">{{ trans('cruds.voter.fields.name_4') }}</label>
                <input class="form-control {{ $errors->has('name_4') ? 'is-invalid' : '' }}" type="text" name="name_4" id="name_4" value="{{ old('name_4', $voter->name_4) }}">
                @if($errors->has('name_4'))
                    <span class="text-danger">{{ $errors->first('name_4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.name_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birth_day">{{ trans('cruds.voter.fields.birth_day') }}</label>
                <input class="form-control date {{ $errors->has('birth_day') ? 'is-invalid' : '' }}" type="text" name="birth_day" id="birth_day" value="{{ old('birth_day', $voter->birth_day) }}">
                @if($errors->has('birth_day'))
                    <span class="text-danger">{{ $errors->first('birth_day') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.birth_day_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job">{{ trans('cruds.voter.fields.job') }}</label>
                <input class="form-control {{ $errors->has('job') ? 'is-invalid' : '' }}" type="text" name="job" id="job" value="{{ old('job', $voter->job) }}">
                @if($errors->has('job'))
                    <span class="text-danger">{{ $errors->first('job') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.job_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.voter.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $voter->address) }}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="register_status">{{ trans('cruds.voter.fields.register_status') }}</label>
                <input class="form-control {{ $errors->has('register_status') ? 'is-invalid' : '' }}" type="text" name="register_status" id="register_status" value="{{ old('register_status', $voter->register_status) }}">
                @if($errors->has('register_status'))
                    <span class="text-danger">{{ $errors->first('register_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.register_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.voter.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $voter->phone) }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('attended') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="attended" value="0">
                    <input class="form-check-input" type="checkbox" name="attended" id="attended" value="1" {{ $voter->attended || old('attended', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="attended">{{ trans('cruds.voter.fields.attended') }}</label>
                </div>
                @if($errors->has('attended'))
                    <span class="text-danger">{{ $errors->first('attended') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.attended_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('targeted') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="targeted" value="0">
                    <input class="form-check-input" type="checkbox" name="targeted" id="targeted" value="1" {{ $voter->targeted || old('targeted', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="targeted">{{ trans('cruds.voter.fields.targeted') }}</label>
                </div>
                @if($errors->has('targeted'))
                    <span class="text-danger">{{ $errors->first('targeted') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.targeted_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="area_id">{{ trans('cruds.voter.fields.area') }}</label>
                <select class="form-control select2 {{ $errors->has('area') ? 'is-invalid' : '' }}" name="area_id" id="area_id" required>
                    @foreach($areas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('area_id') ? old('area_id') : $voter->area->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('area'))
                    <span class="text-danger">{{ $errors->first('area') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="committee_id">{{ trans('cruds.voter.fields.committee') }}</label>
                <select class="form-control select2 {{ $errors->has('committee') ? 'is-invalid' : '' }}" name="committee_id" id="committee_id" required>
                    @foreach($committees as $id => $entry)
                        <option value="{{ $id }}" {{ (old('committee_id') ? old('committee_id') : $voter->committee->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('committee'))
                    <span class="text-danger">{{ $errors->first('committee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.committee_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="admin_id">{{ trans('cruds.voter.fields.admin') }}</label>
                <select class="form-control select2 {{ $errors->has('admin') ? 'is-invalid' : '' }}" name="admin_id" id="admin_id">
                    @foreach($admins as $id => $entry)
                        <option value="{{ $id }}" {{ (old('admin_id') ? old('admin_id') : $voter->admin->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('admin'))
                    <span class="text-danger">{{ $errors->first('admin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.voter.fields.admin_helper') }}</span>
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