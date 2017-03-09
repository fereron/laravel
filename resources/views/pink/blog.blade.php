@extends('pink.layouts.site')

@section('navigation')
    {!! $navigation  !!}
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('sidebar')
    {!! $sidebar or '' !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection

