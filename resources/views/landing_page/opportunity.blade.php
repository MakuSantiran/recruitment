@extends('layouts.main')

@section('script')
    <script src="{{ mix('/js/main.js') }}" defer></script>
@endsection

@section('style')
<style>
    .bold-marker > ol > li::marker {
        font-weight: bold;
    }
</style>
@endsection

@section('content')
    <div class="border border-accent bg-white p-5 rounded-lg shadow-lg mt-10 mb-3 w-9/12 mx-auto">
        <h1 class="font-bold text-center">{{ $opportunity->title }}</h1>
        <hr class="my-4 border-secondary">
        <div class="px-4 grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div>
                <span class="text-lg font-semibold">Position: </span>
                <span class="text-lg">{{ $opportunity->position }}</span> <br>
            </div>
            <div>
                <span class="text-lg font-semibold">Type: </span>
                <span class="text-lg">{{ $opportunity->type ?? '----' }}</span> <br>
            </div>
            <div>
                <span class="text-lg font-semibold">Description: </span>
                <div class="px-5 bold-marker">{!! $opportunity->description !!}</div>
            </div>
            <div>
                <span class="text-lg font-semibold">Qualifications: </span>
                <div class="px-5 bold-marker">{!! $opportunity->qualifications !!}</div>
            </div>
            <div>
                <div class="text-lg font-semibold">Required Documents:</div>
                <div class="px-5">
                    @foreach ($required as $req)
                    <li>{{ $req }}</li>
                    @endforeach
                </div>
            </div>
            <div>
                <div class="text-lg font-semibold">Optional Documents:</div>
                <div class="px-5">
                    @foreach ($optional as $opt)
                    <li>{{ $opt }}</li>
                    @endforeach
                </div>
            </div>
            <div class='col-span-1 lg:col-span-2 mt-2'>
                <span class="text-lg font-semibold">Deadline of Submissions: </span>
                <span class="text-lg">{{ date("D, F d, Y h:i a", strtotime($opportunity->submission_deadline)) }}</span> <br>
            <div>
        </div>
        <div class="w-full grid pt-4">
            <div class="place-self-end">
                <a href="/login" class="btn btn-primary">Apply</a>
            </div>
        </div>
    </div>

@endsection