@extends('layouts.main')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center items-center">
            <div class="border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10 w-5/6">
                <h1 class="text-center text-2xl font-bold">Registration Form</h1>
                <form class="justify-center" action="#">
                    <div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10">
                            <h2 class="col-span-1 lg:col-span-2 text-xl font-bold"> Login Credentials </h2>
                            <div>
                                <h3 class="text-base font-medium">Username</h3>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Username" /> <br><br>
                            </div>
                            
                            <div>
                                <h3 class="text-base font-medium">Email</h3>
                                <input type="email" class="form-input border border-gray-300 rounded w-full" placeholder="Email" /> <br><br>
                            </div>
                            
                            <div>
                                <h3 class="text-base font-medium">Password</h3>
                                <input type="password" class="form-input border border-gray-300 rounded w-full" placeholder="Password" /> <br><br>
                            </div>
                            
                            <div>
                                <h3 class="text-base font-medium">Confirm Password</h3>
                                <input type="password" class="form-input border border-gray-300 rounded w-full" placeholder="Re-enter Password"/> <br><br>
                            </div>
                        </div>
                        <hr>
                        <div class="grid grid-cols-6 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10">
                            <h2 class="col-span-6 text-xl font-bold"> Basic Information </h2>
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-medium">First Name</h2>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Juan" /> <br><br>
                            </div>
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-medium">Middle Name</h2>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Martinez" /> <br><br>
                            </div>
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-medium">Surname</h2>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Dela Cruz" /> <br><br>
                            </div>
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-medium">Sex</h2>
                                <select class="form-input border border-gray-300 rounded text-black mr-1 py-2 px-3 w-full">
                                    <option value="0">----</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <h2 class="text-base font-medium">Birthdate</h2>
                                <input type="date" class="form-input w-full border border-gray-300 rounded" /> <br><br>
                            </div>
                            
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-medium">Civil Status</h2>
                                <select class="form-input border border-gray-300 rounded text-black mr-1 py-2 px-3 w-full">
                                    <option value="0">----</option>
                                    <option value="1">Single</option>
                                    <option value="2">Married</option>
                                    <option value="3">Widowed</option>
                                </select>
                            </div>
                            
                            <div class="col-span-3">
                                <h2 class="text-base font-medium">Citizenship</h2>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Citizenship" /> <br><br>
                            </div>
                            
                            <div class="col-span-3">
                                <h2 class="text-base font-medium">Contact Number</h2>
                                <input type="tel" class="form-input border border-gray-300 rounded w-full" placeholder="09xxxxxxxxx" /> <br><br>
                            </div>
                        </div>
                        <hr>
                        <div class="grid grid-cols-6 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10">
                            <h2 class="col-span-6 text-xl font-bold"> Address </h2>
                            <!-- Addresses -->
                            
                        </div>
                        <hr>
                        <div class="grid grid-cols-6 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10">
                            <h2 class="col-span-6 text-xl font-bold"> Education </h2>

                            <div class="col-span-6">
                                <h2 class="text-base font-medium">School Attended</h2>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="School Attended" /> <br><br>
                            </div>

                            <div class="col-span-2">
                                <h2 class="text-base font-medium">Year Level</h2>
                                    <select class="form-input border border-gray-300 rounded text-black mr-1 py-2 px-3 w-full">
                                    <option value="0">----</option>
                                    <option value="1">Elementary</option>
                                    <option value="2">Secondary</option>
                                    <option value="3">Vocational</option>
                                    <option value="4">Tertiary</option>
                                    <option value="5">Postgraduate/Masteral</option>
                                    <option value="6">Doctoral</option>
                                    <option value="7">Postdoctoral</option>
                                </select>
                            </div>
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-medium">Degree Earned</h2>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Degree Earned" /> <br><br>
                            </div>
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-medium">Units Earned</h2>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Units Earned" /> <br><br>
                            </div>
                            
                            <div class="align-middle">Year Attended:</p>
                            <div class="col-span-2">
                                <h2 class="text-base font-medium">From</h2>
                                <input type="number" class="form-input border border-gray-300 rounded w-full" placeholder="Year Attended From" /> <br><br>
                            </div>
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-medium">To</h2>
                                <input type="number" class="form-input border border-gray-300 rounded w-full" placeholder="Year Attended Until" /> <br><br>
                            </div>
                            
                            <div class="col-span-2">
                                <h2 class="text-base font-medium">Honors</h2>
                                <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Honors" /> <br><br>
                            </div>
                            
                            <button>Add New Education</button>
                        </div>
                    
                    <hr>
                    <!-- Work Experiences -->
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">Company</h2>
                        <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Company" /> <br><br>
                    </div>
                    
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">Position</h2>
                        <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Position" /> <br><br>
                    </div>
                    
                    Years Work***:
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">To</h2>
                        <input type="date" class="form-input border border-gray-300 rounded w-full" /> <br><br>
                    </div>
                    
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">From</h2>
                        <input type="date" class="form-input border border-gray-300 rounded w-full" /> <br><br>
                    </div>
                    
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">Monthly Salary</h2>
                        <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Monthly Salary" /> <br><br>
                    </div>
                    
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">Salary Grade Step</h2>
                        <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Salary Grade Step" /> <br><br>
                    </div>
                    
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">Status of Employment***</h2>
                        <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Status of Employment" /> <br><br>
                    </div>						
                    
                    <button>Add New Work Experience</button>
                    
                    <hr>
                    <!-- Eligibilities -->
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">Eligibility</h2>
                        <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Eligibility" /> <br><br>
                    </div>
                    
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">Rating</h2>
                        <input type="number" class="form-input border border-gray-300 rounded w-full" placeholder="Rating" /> <br><br>
                    </div>
                    
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">Date of Examination</h2>
                        <input type="date" class="form-input border border-gray-300 rounded w-full" /> <br><br>
                    </div>
                    
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">Place of Examination</h2>
                        <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Place of Examination" /> <br><br>
                    </div>
                    
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">License Number</h2>
                        <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="License Number" /> <br><br>
                    </div>
                    
                    <div class="col-span-2">
                        <h2 class="text-base font-medium">Date of Release</h2>
                        <input type="date" class="form-input border border-gray-300 rounded w-full" /> <br><br>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
@endsection