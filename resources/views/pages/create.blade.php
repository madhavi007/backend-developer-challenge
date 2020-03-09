@extends('layouts.app')

@php
$page_title = 'Create Quote';
if(isset($quote)) $page_title = 'Edit Quote';
@endphp

@section('page-title')
{{ $page_title }}
@endsection


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-header__title-wrap float-left">
                    <h5>{{ $page_title }}</h5>
                </div>
            </div>
            <div class="card-body">
                @if(isset($quote))
                <form method="POST" action="{{ route('quote.update', ['id' => $id]) }}" enctype='multipart/form-data'>
                @else
                <form method="POST" action="{{ route('quote.store') }}" enctype='multipart/form-data'>
                @endif
                    @csrf
                    <h5>Basic Details</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="season_number">Season Number<span class="required-field">*</span></label>
                            <input type="text" class="form-control{{ $errors->has('season_number') ? ' is-invalid' : '' }}" id="season_number" name="season_number" placeholder="1" value="{{ isset($quote) ? $quote->season_number : old('season_number') }}" required pattern="^[0-9]+$" autocomplete="off">
                            @if ($errors->has('season_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('season_number') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="episode">Episode<span class="required-field">*</span></label>
                            <input type="text" class="form-control{{ $errors->has('episode') ? ' is-invalid' : '' }}" id="episode" name="episode" placeholder="107" value="{{ isset($quote) ? $quote->episode : old('episode') }}" pattern="^[0-9]+$" autocomplete="off" required>
                            @if ($errors->has('episode'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('episode') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="quote">Quote<span class="required-field">*</span></label>
                            <input type="text" class="form-control{{ $errors->has('quote') ? ' is-invalid' : '' }}" id="quote" name="quote" placeholder="To live is the rarest thing in the world. Most people exist,that is all." value="{{isset($quote) ? $quote->quote : old('quote') }}" required>
                            @if ($errors->has('quote'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('quote') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-rounded shadow-1 float-right mr-0">Save</button>
                        <a href="{{ route('quote.all') }}" class="btn btn-warning btn-rounded shadow-1 float-right" style="margin-right:10px">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
