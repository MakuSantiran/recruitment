@extends('layouts.main')

@section('script')
    <script src="{{ mix('/js/main.js') }}" defer></script>
@endsection

@section('content')
    <div class="border border-gray-100 bg-white p-5 rounded-lg shadow-lg mt-10 mb-6 w-5/12 mx-auto">
        <form action="{{ route('landingSearch') }}" method="GET">
            <div class="flex justify-between">
                <span>
                    <label>Filter by&nbsp;</label>
                    <select name="type" class="form-input">
                        <option value="title" {{ ( request()->input('type') == 'title') ? 'selected' : '' }}>Title</option>
                        <option value="position" {{ ( request()->input('type') == 'position') ? 'selected' : '' }}>Position</option>
                        <option value="type" {{ ( request()->input('type') == 'type') ? 'selected' : '' }}>Type</option>
                    </select>
                </span>
                <span>
                    <label>Sort by&nbsp;</label>
                    <select name="order" class="form-input">
                        <option value="latest" {{ ( request()->input('order') == 'latest') ? 'selected' : '' }}>Latest</option>
                        <option value="oldest" {{ ( request()->input('order') == 'oldest') ? 'selected' : '' }}>Oldest</option>
                    </select>
                </span>
                <div class="">
                    <input name="q" type="search" class="border border-gray-300 rounded w-64 px-3 align-middle" placeholder="Search" value="{{ request()->input('q') }}" />
                </div>
                <button type="submit" class="btn">Search</button>
            </div>
        </form>
    </div>

    <div class="border border-gray-100 bg-white p-5 rounded-lg shadow-lg mt-10 mb-3 w-11/12 mx-auto">
        <h1 class="font-bold text-center">Search Result of "{{ $searched }}"</h1>
        <hr class="my-4 border-secondary">
        <div class="grid gap-x-4 grid-cols-1 md:grid-cols-3">

            @foreach ($opportunities as $opp)
                <div class="justify-center items-center w-full">
                    @if(date("Y-m-d") < $opp->submission_deadline)
                        <div class="border bg-white p-5 rounded-lg shadow-lg mt-3 mb-6 border-accent">
                    @else
                        <div class="border bg-white p-5 rounded-lg shadow-lg mt-3 mb-6 border-brightred">
                    @endif
                        <h2 class="font-semibold">{{ $opp->title }}</h2>
                        <span class="text-lg font-semibold">Position: </span><span class="text-lg">{{ $opp->position }}</span> <br>
                        <span class="text-lg font-semibold">Type: </span><span class="text-lg">{{ $opp->type }}</span> <br> <br/>
                        {{-- <span class="text-lg font-semibold">Description: </span><span class="text-lg">{!! $opp->description !!}</span> <br>
                        <span class="text-lg font-semibold">Qualifications: </span><span class="text-lg">{!! $opp->qualifications !!}</span> <br> --}}
                        
                        {{-- <div class="text-lg font-semibold">Required Documents:</div>
                        <div class="px-5">
                            <li v-for="req in required">{{ req }}</li>
                        </div>

                        <div class="text-lg font-semibold">Optional Documents:</div>
                        <div class="px-5">
                            <li v-for="opt in optional">{{ opt }}</li>
                        </div> --}}

                        <span class="text-lg font-semibold">Deadline of Submissions: </span>
                        <div class="text-lg">&emsp;{{ date("l M d, Y h:i a", strtotime($opp->submission_deadline)) }}</div>
                        <span class="text-lg font-semibold">Date of Posting: </span>
                        <div class="text-lg">&emsp;{{ date("M d, Y h:i a", strtotime($opp->created_at)) }}</div>
                        <div class="w-full grid pt-4">
                            <div class="place-self-end">
                                <a href="{{ route('opportunity',  $opp->id ) }}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>

@endsection