@extends('./layouts/base')

@section('title')
    <title>MMSU Job Oppurtunities</title>
@endsection

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link href="{{ mix('/css/app.css') }}" />

    <!-- Tailwind -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="h-screen flex justify-center items-center">
            <div>
                <div class="flex gap-3">
                    <div><img class="h-20" src="//mmsu.edu.ph//mmsu_logo/mmsu_logo.png"></div>
                    <div class="flex items-center" style="font-family:'Adobe Garamond Pro';">
                        <div>
                            <span class="font-semibold text-2xl sm:text-3xl text-gray-600">Mariano Marcos State University</span> <br>
                            <span class="text-gray-500">Human Resources and Management Office</span>
                        </div>
                    </div>
                </div>
                <div class="border border-gray-100 bg-white p-5 rounded-lg shadow-md mt-3">
                    <h5>ADMIN ACCOUNT LOGIN</h5>
                    <div class="p-1 px-4 pb-4">
                        <form method="POST" action="/admin/login">
                            @csrf

                            <div class="w-full"><label for="username">Username</label>
                                <div class="w-full"><input id="username" type="text" class="form-input w-full border border-gray-300 rounded" name="username" required="" autocomplete="username" autofocus=""></div>
                            </div>
                            
                            
                            <div class="w-full"><label for="password">Password</label>
                                <div class="w-full"><input id="password" type="password" class="form-input w-full border border-gray-300 rounded" name="password" required="" autocomplete="current-password"></div>
                            </div>
                            <div class="w-full flex my-2">
                                <div class="flex-grow">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="remember" id="remember"><label class="form-check-label" for="remember"> Remember Me </label></div>
                                </div>
                            </div>
                            <div class="w-full grid">
                                <div class="place-self-center"><button class="btn btn-primary" type="submit">Login</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection