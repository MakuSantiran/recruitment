@extends('layouts.main')

@section('script')
    <script src="{{ mix('/js/main.js') }}" defer></script>
@endsection

@section('content')
    <div class="border border-gray-100 bg-white p-5 rounded-lg shadow-lg mt-10 mb-6 w-5/12 mx-auto">
        <form action="{{ route('landingSearch') }}" method="GET">
            <div class="flex flex-col md:flex-row justify-between">
                <span>
                    <label>Filter by&nbsp;</label>
                    <select name="type" class="form-input">
                        <option value="title" {{ ( request()->input('type') == 'title') ? 'selected' : '' }}>Title</option>
                        <option value="position" {{ ( request()->input('type') == 'position') ? 'selected' : '' }}>Position</option>
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
    
    <div class="border border-gray-100 bg-white p-5 rounded-lg shadow-lg mt-10 mb-6 w-11/12 mx-auto">
        <h1 class="font-bold text-center">Recent Opportunities</h1>
        <hr class="my-4 border-secondary">
        <div class="grid gap-x-4 grid-cols-1 md:grid-cols-3">
            
            @foreach ($opportunities as $opp)
                <div class="justify-center items-center w-full">
                    <div class="border bg-white p-5 rounded-lg shadow-lg mt-3 mb-6 border-accent">
                        <h2 class="font-semibold">{{ $opp->title }}</h2>
                        <span class="text-lg font-semibold">Position: </span><span class="text-lg">{{ $opp->position }}</span> <br>
                        {{-- <span class="text-lg font-semibold">Description: </span><span class="text-lg">{{ $opp->description }}</span> <br>
                        <span class="text-lg font-semibold">Qualifications: </span><span class="text-lg">{{ $opp->qualifications }}</span> <br> --}}
                        
                        <span class="text-lg font-semibold">Deadline of Submissions: </span>
                        <div class="text-lg">&emsp;{{ date("M d, Y l h:i a", strtotime($opp->submission_deadline)) }}</div>
                        <span class="text-lg font-semibold">Date of Posting: </span>
                        <div class="text-lg">&emsp;{{ date("M d, Y h:i a", strtotime($opp->created_at)) }}</div>
                        <div class="w-full grid">
                            <div class="place-self-end">
                                <a href="{{ route('opportunity', $opp->slug) }}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr class="mb-3 border-secondary">
        <div class="w-full text-center">
            <a href="{{ route('opportunities') }}" class="btn btn-default">View More</a>
        </div>
    </div>
@endsection
