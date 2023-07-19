@extends('layouts.applicant')

@section('script')
    <script src="{{ mix('/js/main.js') }}" defer></script>
@endsection

@section('content')
    <div id="app">
        <main-app></main-app>
    </div>
@endsection