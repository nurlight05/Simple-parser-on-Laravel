@extends('admin.base')

@section('title', 'News')

@section('subtitle', 'News')

@section('icon', 'pe-7s-paper-plane')

@section('active-news', 'mm-active')

@section('content')
    @livewire('news')
@endsection
