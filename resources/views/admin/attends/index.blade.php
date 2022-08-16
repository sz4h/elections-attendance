@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            التحضير
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.attends.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.voter.fields.register_number') }}</label>
                    <input class="form-control {{ $errors->has('register_number') ? 'is-invalid' : '' }}" type="text"
                           name="register_number"
                           id="name" value="{{ old('register_number', '') }}" required>
                    @if($errors->has('register_number'))
                        <span class="text-danger">{{ $errors->first('register_number') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.voter.fields.register_number_helper') }}</span>
                </div>
                <input type="hidden" name="gender_id" value="{{ auth()->user()->gender_id }}">
                <input type="hidden" name="committee_id" value="{{ auth()->user()->committee_id }}">
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection