@extends('layouts.main')

@section('script')
    <script src="{{ mix('/js/main.js') }}" defer></script>
@endsection

@section('content')
    <div id="app">
        <registration></registration>
    </div>
@endsection