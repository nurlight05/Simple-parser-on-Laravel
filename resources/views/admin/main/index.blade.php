@extends('admin.base')

@section('title', 'Statistics')

@section('subtitle', 'Dashboard')

@section('icon', 'pe-7s-graph2')

@section('active-main', 'mm-active')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">News</div>
                        <div class="widget-subheading">Total count</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $newsCount ?? '' }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Logs</div>
                        <div class="widget-subheading">Total count</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $logsCount ?? '' }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection