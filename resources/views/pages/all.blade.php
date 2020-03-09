@extends('layouts.app')

@section('page-title')
Branches
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Quote</li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header clearfix">
                <div class="card-header__title-wrap float-left mr-5">
                    <h5>Quotes</h5>
                </div>
                    <a href="{{ route('quote.create') }}" class="btn btn-primary btn-addon btn-rounded mb-0 mr-0 float-right"><i class="fa fa-plus" style="margin-right: 10px;"></i>Create Quote</a>
            </div>

            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width:20%">Thumbnail</th>
                                <th style="width:15%">Season Number</th>
                                <th>Episode</th>
                                <th style="text-align: center">Quote</th>
                                <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($quotes as $quote)
                            <tr>
                                <td>
                                    @if(isset($quote->file))
                                        <img src="/data/images/{{$quote->id}}/icon/random.jpg" height="120px" width="120px">
                                    @else
                                        <img src="/img/default.jpg" height="120px" width="120px">
                                    @endif
                                </td>
                                <td>{{ $quote->season_number }}</td>
                                <td>{{ $quote->episode }}</td>
                                <td>{{ $quote->quote }}</td>
                                <td class="table-actions">
                                    @if(\Auth::id() == $quote->user_id)
                                        <a href="{{ route('quote.edit', ['id' => $quote->id]) }}"><i class="fa fa-edit"></i></a>
                                    @endif
                                    @if(\Auth::id() == $quote->user_id)
                                        <a href="javascript:void(0);" class="delete remove-quote" data-id="{{ $quote->id }}"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <!-- use paginator -->
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
