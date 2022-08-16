@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.result.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.results.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="votes">{{ trans('cruds.result.fields.votes') }}</label>
                <input class="form-control {{ $errors->has('votes') ? 'is-invalid' : '' }}" type="number" name="votes" id="votes" value="{{ old('votes', '0') }}" step="1">
                @if($errors->has('votes'))
                    <span class="text-danger">{{ $errors->first('votes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.result.fields.votes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="committee_id">{{ trans('cruds.result.fields.committee') }}</label>
                <select class="form-control select2 {{ $errors->has('committee') ? 'is-invalid' : '' }}" name="committee_id" id="committee_id" required>
                    @foreach($committees as $id => $entry)
                        <option value="{{ $id }}" {{ old('committee_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('committee'))
                    <span class="text-danger">{{ $errors->first('committee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.result.fields.committee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="candidate_id">{{ trans('cruds.result.fields.candidate') }}</label>
                <select class="form-control select2 {{ $errors->has('candidate') ? 'is-invalid' : '' }}" name="candidate_id" id="candidate_id" required>
                    @foreach($candidates as $id => $entry)
                        <option value="{{ $id }}" {{ old('candidate_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('candidate'))
                    <span class="text-danger">{{ $errors->first('candidate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.result.fields.candidate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="admin_id">{{ trans('cruds.result.fields.admin') }}</label>
                <select class="form-control select2 {{ $errors->has('admin') ? 'is-invalid' : '' }}" name="admin_id" id="admin_id" required>
                    @foreach($admins as $id => $entry)
                        <option value="{{ $id }}" {{ old('admin_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('admin'))
                    <span class="text-danger">{{ $errors->first('admin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.result.fields.admin_helper') }}</span>
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