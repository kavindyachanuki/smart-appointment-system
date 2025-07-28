@extends('layouts.guest')
    @section('title')
    <title>CHRONEX - Sign Up</title>
    @endsection

  @section('css')
     @vite(['resources/css/register.css'])
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @endsection

    @section('body_class', 'min-h-screen gradient-bg')
<body>
@section('content')
<!-- Background decorative elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-64 h-64 rounded-full top-1/4 left-1/4 bg-white/10 blur-3xl floating-animation"></div>
        <div class="absolute rounded-full bottom-1/4 right-1/4 w-96 h-96 bg-blue-300/20 blur-3xl floating-animation" style="animation-delay: -1s;"></div>
        <div class="absolute w-32 h-32 rounded-full top-3/4 left-1/2 bg-purple-300/30 blur-2xl floating-animation" style="animation-delay: -2s;"></div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4 py-8 sm:px-6 lg:px-8">
        
        <!-- Registration Card -->
        <div class="w-full max-w-lg p-8 space-y-8 shadow-2xl glass-effect rounded-3xl slide-in">
            
            <!-- Logo Section -->
            <div class="mb-8 text-center">
                <div class="flex items-center justify-center w-24 h-24 mx-auto mb-6 rounded-full shadow-lg bg-gradient-to-r from-blue-500 to-purple-600 pulse-glow floating-animation">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <h1 class="mb-2 text-4xl font-bold text-transparent bg-gradient-to-r from-white to-blue-100 bg-clip-text">
                    Join Us Today
                </h1>
                <p class="text-lg text-white/80">Create your account in seconds</p>
            </div>

            <!-- Progress Indicator -->
            <div class="flex justify-center mb-8">
                <div class="flex space-x-2">
                    <div id="step-indicator-1" class="w-3 h-3 transition-all duration-300 bg-white rounded-full"></div>
                    <div id="step-indicator-2" class="w-3 h-3 transition-all duration-300 rounded-full bg-white/30"></div>
                    <div id="step-indicator-3" class="w-3 h-3 transition-all duration-300 rounded-full bg-white/30"></div>
                </div>
            </div>

            <!-- Registration Form -->
            <form class="space-y-6" id="registrationForm" action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Personal Information Section -->
                <div id="step-1" class="space-y-5 step-section active">
                    <h3 class="flex items-center pb-2 text-lg font-semibold text-white border-b border-white/30">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Personal Information
                    </h3>
                    
                    <!-- Username -->
                    <div class="group">
                        <label for="username" class="block mb-2 text-sm font-semibold text-white/90">Username</label>
                        <div class="relative">
                            <input id="username" name="name" type="text" value="{{ old('name') }}"
                                   class="w-full px-5 py-4 pl-12 text-white transition-all duration-300 border-2 border-white/20 rounded-2xl focus:ring-4 focus:ring-blue-200/50 focus:border-white/50 group-hover:border-white/40 bg-white/10 placeholder-white/60 input-glow"
                                   placeholder="Enter your username">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div id="nameError" class="text-red-500 text-sm mt-1"></div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="group">
                        <label for="email" class="block mb-2 text-sm font-semibold text-white/90">Email Address</label>
                        <div class="relative">
                            <input id="email" name="email" type="email"  value="{{ old('email') }}" 
                                   class="w-full px-5 py-4 pl-12 text-white transition-all duration-300 border-2 border-white/20 rounded-2xl focus:ring-4 focus:ring-blue-200/50 focus:border-white/50 group-hover:border-white/40 bg-white/10 placeholder-white/60 input-glow"
                                   placeholder="your@email.com">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <div id="emailError" class="text-red-500 text-sm mt-1"></div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="group">
                        <label for="phone" class="block mb-2 text-sm font-semibold text-white/90">Phone Number</label>
                        <div class="relative">
                            <input id="phone" name="phone" type="tel"  value="{{ old('phone') }}" 
                                   class="w-full px-5 py-4 pl-12 text-white transition-all duration-300 border-2 border-white/20 rounded-2xl focus:ring-4 focus:ring-blue-200/50 focus:border-white/50 group-hover:border-white/40 bg-white/10 placeholder-white/60 input-glow"
                                   placeholder="+1 (555) 123-4567">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div id="phoneError" class="text-red-500 text-sm mt-1"></div>
                        </div>
                    </div>

                    <button type="button" id="next-step-1" 
                            class="w-full flex justify-center items-center py-4 px-6 border border-transparent rounded-2xl shadow-lg text-lg font-semibold text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 focus:outline-none focus:ring-4 focus:ring-white/20 transform transition-all duration-200 hover:scale-[1.02] active:scale-[0.98]">
                        Continue
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>
                </div>

                <!-- Account Type Section -->
                <div id="step-2" class="space-y-5 step-section">
                    <h3 class="flex items-center pb-2 text-lg font-semibold text-white border-b border-white/30">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Account Type
                    </h3>
                    
                    <!-- Role Selection Cards -->
                    <div class="grid grid-cols-1 gap-4">
                        <div class="relative">
                            <input type="radio" id="customer" name="role" value="customer" class="sr-only" checked  value="{{ old('role') }}">
                            <label for="customer" id="customer-label" class="flex items-center p-6 transition-all duration-300 border-2 border-white shadow-lg cursor-pointer rounded-2xl hover:scale-105 bg-white/20">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-white/30">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-white">Customer</h4>
                                        <p class="text-sm text-white/70">Book appointments with service providers</p>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <div class="relative">
                            <input type="radio" id="provider" name="role" value="provider" class="sr-only"  value="{{ old('role') }}">
                            <label for="provider" id="provider-label" class="flex items-center p-6 transition-all duration-300 border-2 cursor-pointer rounded-2xl hover:scale-105 border-white/30 bg-white/10 hover:border-white/50">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-white/20">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-white">Service Provider</h4>
                                        <p class="text-sm text-white/70">Offer services and manage appointments</p>
                                    </div>
                                </div>
                            </label>
                        </div>

                    </div>

                    <!-- Provider-specific fields -->
                    <div id="provider-fields" class="hidden p-6 space-y-5 border bg-white/10 rounded-2xl border-white/20 backdrop-blur-sm">
                        <h4 class="flex items-center mb-4 font-semibold text-white">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m8 0H8m8 0v6a2 2 0 01-2 2H10a2 2 0 01-2-2V6m8 0V4a2 2 0 00-2-2H8a2 2 0 00-2 2v2"></path>
                            </svg>
                            Provider Details
                        </h4>
                        
                        <!-- Organization Name -->
                        <div class="group">
                            <label for="organization_name" class="block mb-2 text-sm font-semibold text-white/90">Organization Name</label>
                            <div class="relative">
                                <input id="organization_names" name="organization_name" type="text"  value="{{ old('organization_name') }}"
                                       class="w-full px-5 py-4 pl-12 text-white transition-all duration-300 border-2 border-white/20 rounded-2xl focus:ring-4 focus:ring-blue-200/50 focus:border-white/50 group-hover:border-white/40 bg-white/10 placeholder-white/60 input-glow"
                                       placeholder="Your Business Name">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Service Type -->
                        <div class="group">
                            <label for="service_type" class="block mb-2 text-sm font-semibold text-white/90">Service Type</label>
                            <div class="relative">
                                <select id="service_types" name="service_type"
                                        class="w-full px-5 py-4 pl-12 text-white transition-all duration-300 border-2 appearance-none border-white/20 rounded-2xl focus:ring-4 focus:ring-blue-200/50 focus:border-white/50 group-hover:border-white/40 bg-white/10 input-glow">
                                    <option value="" class="bg-gray-800">Select service type</option>
                                    <option value="medical" class="bg-gray-800">Medical Services</option>
                                    <option value="dental" class="bg-gray-800">Dental Services</option>
                                    <option value="beauty" class="bg-gray-800">Beauty & Wellness</option>
                                    <option value="consulting" class="bg-gray-800">Consulting</option>
                                    <option value="other" class="bg-gray-800">Other</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </div>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <button type="button" id="prev-step-2" 
                                class="flex-1 flex justify-center items-center py-4 px-6 border-2 border-white/30 rounded-2xl text-lg font-semibold text-white hover:bg-white/10 focus:outline-none focus:ring-4 focus:ring-white/20 transform transition-all duration-200 hover:scale-[1.02] active:scale-[0.98]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                            </svg>
                            Back
                        </button>
                        <button type="button" id="next-step-2" 
                                class="flex-1 flex justify-center items-center py-4 px-6 border border-transparent rounded-2xl shadow-lg text-lg font-semibold text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 focus:outline-none focus:ring-4 focus:ring-white/20 transform transition-all duration-200 hover:scale-[1.02] active:scale-[0.98]">
                            Continue
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Security Section -->
                <div id="step-3" class="space-y-5 step-section">
                    <h3 class="flex items-center pb-2 text-lg font-semibold text-white border-b border-white/30">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Security
                    </h3>
                    
                    <!-- Password -->
                    <div class="group">
                        <label for="password" class="block mb-2 text-sm font-semibold text-white/90">Password</label>
                        <div class="relative">
                            <input id="passwords" name="password" type="password" value="{{ old('password') }}"
                                   class="w-full px-5 py-4 pl-12 pr-12 text-white transition-all duration-300 border-2 border-white/20 rounded-2xl focus:ring-4 focus:ring-blue-200/50 focus:border-white/50 group-hover:border-white/40 bg-white/10 placeholder-white/60 input-glow"
                                   placeholder="Create a strong password">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 flex items-center pr-4 hover:text-white/80">
                                <svg id="show-password-icon" class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="hide-password-icon" class="hidden w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878l4.242 4.242" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Password Strength Indicator -->
                        <div id="password-strength" class="hidden mt-3">
                            <div class="flex items-center mb-2 space-x-3">
                                <div class="flex-1 bg-white/20 rounded-full h-2.5 overflow-hidden">
                                    <div id="strength-bar" class="h-full transition-all duration-500 ease-out bg-red-400 rounded-full" style="width: 0%"></div>
                                </div>
                                <span id="strength-text" class="text-sm font-semibold text-red-300"></span>
                            </div>
                            <div class="grid grid-cols-2 gap-2 text-xs">
                                <span id="check-length" class="flex items-center text-white/50">
                                    <span class="mr-1">○</span> 8+ characters
                                </span>
                                <span id="check-uppercase" class="flex items-center text-white/50">
                                    <span class="mr-1">○</span> Uppercase
                                </span>
                                <span id="check-lowercase" class="flex items-center text-white/50">
                                    <span class="mr-1">○</span> Lowercase
                                </span>
                                <span id="check-number" class="flex items-center text-white/50">
                                    <span class="mr-1">○</span> Number
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="group">
                        <label for="password_confirmation" class="block mb-2 text-sm font-semibold text-white/90">Confirm Password</label>
                        <div class="relative">
                            <input id="password_confirmations" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}"
                                   class="w-full px-5 py-4 pl-12 pr-12 text-white transition-all duration-300 border-2 border-white/20 rounded-2xl focus:ring-4 focus:ring-blue-200/50 focus:border-white/50 group-hover:border-white/40 bg-white/10 placeholder-white/60 input-glow"
                                   placeholder="Confirm your password">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <button type="button" id="toggle-confirm-password" class="absolute inset-y-0 right-0 flex items-center pr-4 hover:text-white/80">
                                <svg id="show-confirm-password-icon" class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="hide-confirm-password-icon" class="hidden w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878l4.242 4.242" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Password Match Indicator -->
                        <div id="password-match" class="hidden mt-2">
                            <p id="match-message" class="text-sm font-medium">
                                <span id="match-icon" class="mr-1"></span>
                                <span id="match-text"></span>
                            </p>
                        </div>
                    </div>

                    <!-- Terms & Privacy -->
                    <div class="flex items-start p-4 space-x-3 border bg-white/10 rounded-xl border-white/20">
                        <input id="terms" name="terms" type="checkbox" required
                               class="w-5 h-5 mt-1 text-blue-600 rounded focus:ring-blue-500 border-white/30 bg-white/20">
                        <label for="terms" class="text-sm leading-relaxed text-white/90">
                            I agree to the <a href="#" class="font-semibold text-blue-300 underline transition-colors hover:text-blue-200 decoration-blue-300/50 hover:decoration-blue-200">Terms of Service</a> 
                            and <a href="#" class="font-semibold text-blue-300 underline transition-colors hover:text-blue-200 decoration-blue-300/50 hover:decoration-blue-200">Privacy Policy</a>
                        </label>
                    </div>

                    <div class="flex space-x-4">
                        <button type="button" id="prev-step-3" 
                                class="flex-1 flex justify-center items-center py-4 px-6 border-2 border-white/30 rounded-2xl text-lg font-semibold text-white hover:bg-white/10 focus:outline-none focus:ring-4 focus:ring-white/20 transform transition-all duration-200 hover:scale-[1.02] active:scale-[0.98]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                            </svg>
                            Back
                        </button>
                        
                        <!-- Submit Button -->
                        <button type="submit" id="submit-btn" 
                                class="flex-1 flex justify-center items-center py-4 px-6 border border-transparent rounded-2xl shadow-lg text-lg font-semibold text-white bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 focus:outline-none focus:ring-4 focus:ring-white/20 disabled:opacity-50 disabled:cursor-not-allowed transform transition-all duration-200 hover:scale-[1.02] active:scale-[0.98] disabled:hover:scale-100">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Create Account
                        </button>
                    </div>
                </div>
            </form>
            <!-- Login Link -->
            <div id="login-link" class="pt-6 text-center border-t border-white/30">
                <p class="text-white/80">
                    Already have an account? 
                    <a href="{{route('login')}}" class="font-semibold text-blue-300 underline transition-colors duration-200 hover:text-blue-200 decoration-blue-300/50 hover:decoration-blue-200">
                        Sign in here
                    </a>
                </p>
            </div>

            <!-- Success Message -->
            <!-- <div id="success-modal" class="fixed inset-0 z-50 items-center justify-center hidden bg-black/50 backdrop-blur-sm">
                <div class="max-w-md p-8 mx-4 text-center bg-white shadow-2xl rounded-3xl">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-green-500 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-2xl font-bold text-gray-800">Account Created!</h3>
                    <p class="mb-6 text-gray-600">Welcome to our platform. You can now start using all features.</p>
                    <button id="close-success" 
                            class="w-full px-6 py-3 font-semibold text-white transition-all duration-200 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl hover:from-blue-600 hover:to-purple-700">
                        Get Started
                    </button>
                </div>
            </div> -->
        </div>
    </div>

    <script>
        
        // Form state
        let currentStep = 1;
        let formData = {
            username: '',
            email: '',
            phone: '',
            role: 'customer',
            organization_name: '',
            service_type: '',
            password: '',
            password_confirmation: '',
            terms: false
        };

        // Password strength checker
        let passwordChecks = {
            length: false,
            uppercase: false,
            lowercase: false,
            number: false
        };

        // Initialize form
        document.addEventListener('DOMContentLoaded', function() {
            setupEventListeners();
            updateStepIndicators();
        });

        function setupEventListeners() {
            // Step navigation
            document.getElementById('next-step-1').addEventListener('click', () => nextStep());
            document.getElementById('next-step-2').addEventListener('click', () => nextStep());
            document.getElementById('prev-step-2').addEventListener('click', () => prevStep());
            document.getElementById('prev-step-3').addEventListener('click', () => prevStep());

            // Role selection
            document.getElementById('customer').addEventListener('change', handleRoleChange);
            document.getElementById('provider').addEventListener('change', handleRoleChange);

            // Password visibility toggles
            document.getElementById('toggle-password').addEventListener('click', () => togglePasswordVisibility('passwords'));
            document.getElementById('toggle-confirm-password').addEventListener('click', () => togglePasswordVisibility('password_confirmations'));

            // Password validation
            document.getElementById('passwords').addEventListener('input', checkPasswordStrength);
            document.getElementById('password_confirmations').addEventListener('input', checkPasswordMatch);

            // Form validation
            document.getElementById('terms').addEventListener('change', validateForm);

            // Form submission
            document.getElementById('registrationForm').addEventListener('submit', handleSubmit);

            // Success modal
            document.getElementById('close-success').addEventListener('click', closeSuccessModal);
        }

        function nextStep() {
            if (validateCurrentStep()) {
                if (currentStep < 3) {
                    currentStep++;
                    showStep(currentStep);
                    updateStepIndicators();
                }
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
                updateStepIndicators();
            }
        }

        function showStep(step) {
            // Hide all steps
            document.querySelectorAll('.step-section').forEach(section => {
                section.classList.remove('active');
            });

            // Show current step
            document.getElementById(`step-${step}`).classList.add('active');
            document.getElementById(`step-${step}`).classList.add('fade-in');

            // Show/hide login link
            if (step === 1) {
                document.getElementById('login-link').style.display = 'block';
            } else {
                document.getElementById('login-link').style.display = 'none';
            }
        }

        function updateStepIndicators() {
            for (let i = 1; i <= 3; i++) {
                const indicator = document.getElementById(`step-indicator-${i}`);
                if (i <= currentStep) {
                    indicator.className = 'w-3 h-3 transition-all duration-300 rounded-full bg-white';
                } else {
                    indicator.className = 'w-3 h-3 transition-all duration-300 rounded-full bg-white/30';
                }
            }
        }

        function validateCurrentStep() {
            switch (currentStep) {
                case 1:
                    const username = document.getElementById('username').value.trim();
                    const email = document.getElementById('email').value.trim();
                    const phone = document.getElementById('phone').value.trim();

                    if (!username || !email || !phone) {
                        alert('Please fill in all required fields in Step 1.');
                        return false;
                    }
                    return true;

                case 2:
                    const role = document.querySelector('input[name="role"]:checked').value;
                    if (role === 'provider') {
                        const orgName = document.getElementById('organization_names').value.trim();
                        const serviceType = document.getElementById('service_types').value;
                        if (!orgName || !serviceType) {
                            alert('Please fill in all provider details.');
                            return false;
                        }
                    }
                    return true;

                case 3:
                    return validateFinalStep();
            }
            return true;
        }

        function validateFinalStep() {
            const password = document.getElementById('passwords').value;
            const confirmPassword = document.getElementById('password_confirmations').value;
            const terms = document.getElementById('terms').checked;

            if (!password || !confirmPassword) {
                alert('Please fill in both password fields.');
                return false;
            }

            if (!Object.values(passwordChecks).every(Boolean)) {
                alert('Please ensure your password meets all requirements.');
                return false;
            }

            if (password !== confirmPassword) {
                alert('Passwords do not match.');
                return false;
            }

            if (!terms) {
                alert('Please accept the terms and conditions.');
                return false;
            }

            return true;
        }

        function handleRoleChange(event) {
            const role = event.target.value;
            const customerLabel = document.getElementById('customer-label');
            const providerLabel = document.getElementById('provider-label');
            const providerFields = document.getElementById('provider-fields');

            // Update label styles
            if (role === 'customer') {
                customerLabel.className = 'flex items-center p-6 transition-all duration-300 border-2 cursor-pointer rounded-2xl hover:scale-105 border-white bg-white/20 shadow-lg';
                providerLabel.className = 'flex items-center p-6 transition-all duration-300 border-2 cursor-pointer rounded-2xl hover:scale-105 border-white/30 bg-white/10 hover:border-white/50';
                providerFields.classList.add('hidden');
            } else {
                providerLabel.className = 'flex items-center p-6 transition-all duration-300 border-2 cursor-pointer rounded-2xl hover:scale-105 border-white bg-white/20 shadow-lg';
                customerLabel.className = 'flex items-center p-6 transition-all duration-300 border-2 cursor-pointer rounded-2xl hover:scale-105 border-white/30 bg-white/10 hover:border-white/50';
                providerFields.classList.remove('hidden');
            }

            // Update icon background
            const customerIcon = customerLabel.querySelector('.rounded-full');
            const providerIcon = providerLabel.querySelector('.rounded-full');
            
            if (role === 'customer') {
                customerIcon.className = 'flex items-center justify-center w-12 h-12 rounded-full bg-white/30';
                providerIcon.className = 'flex items-center justify-center w-12 h-12 rounded-full bg-white/20';
            } else {
                providerIcon.className = 'flex items-center justify-center w-12 h-12 rounded-full bg-white/30';
                customerIcon.className = 'flex items-center justify-center w-12 h-12 rounded-full bg-white/20';
            }
        }

        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const showIcon = document.getElementById(`show-${fieldId.replace('_', '-')}-icon`);
            const hideIcon = document.getElementById(`hide-${fieldId.replace('_', '-')}-icon`);

            if (field.type === 'password') {
                field.type = 'text';
                showIcon.classList.add('hidden');
                hideIcon.classList.remove('hidden');
            } else {
                field.type = 'password';
                showIcon.classList.remove('hidden');
                hideIcon.classList.add('hidden');
            }
        }

        function checkPasswordStrength() {
            const password = document.getElementById('passwords').value;
            const strengthDiv = document.getElementById('password-strength');
            const strengthBar = document.getElementById('strength-bar');
            const strengthText = document.getElementById('strength-text');

            if (password.length > 0) {
                strengthDiv.classList.remove('hidden');
            } else {
                strengthDiv.classList.add('hidden');
                return;
            }

            // Check individual requirements
            passwordChecks.length = password.length >= 8;
            passwordChecks.uppercase = /[A-Z]/.test(password);
            passwordChecks.lowercase = /[a-z]/.test(password);
            passwordChecks.number = /\d/.test(password);

            // Update check indicators
            updatePasswordCheck('check-length', passwordChecks.length);
            updatePasswordCheck('check-uppercase', passwordChecks.uppercase);
            updatePasswordCheck('check-lowercase', passwordChecks.lowercase);
            updatePasswordCheck('check-number', passwordChecks.number);

            // Calculate strength
            const strength = Object.values(passwordChecks).filter(Boolean).length;
            let width, text, colorClass, textClass;

            switch(strength) {
                case 1:
                    width = 25;
                    text = 'Weak';
                    colorClass = 'bg-red-400';
                    textClass = 'text-red-300';
                    break;
                case 2:
                    width = 50;
                    text = 'Fair';
                    colorClass = 'bg-orange-400';
                    textClass = 'text-orange-300';
                    break;
                case 3:
                    width = 75;
                    text = 'Good';
                    colorClass = 'bg-yellow-400';
                    textClass = 'text-yellow-300';
                    break;
                case 4:
                    width = 100;
                    text = 'Strong';
                    colorClass = 'bg-green-400';
                    textClass = 'text-green-300';
                    break;
                default:
                    width = 0;
                    text = '';
                    colorClass = 'bg-red-400';
                    textClass = 'text-red-300';
            }

            strengthBar.style.width = width + '%';
            strengthBar.className = `h-full transition-all duration-500 ease-out rounded-full ${colorClass}`;
            strengthText.textContent = text;
            strengthText.className = `text-sm font-semibold ${textClass}`;

            checkPasswordMatch();
            validateForm();
        }

        function updatePasswordCheck(elementId, isValid) {
            const element = document.getElementById(elementId);
            const icon = element.querySelector('span');
            
            if (isValid) {
                element.className = 'flex items-center text-green-300';
                icon.textContent = '✓';
            } else {
                element.className = 'flex items-center text-white/50';
                icon.textContent = '○';
            }
        }

        function checkPasswordMatch() {
            const password = document.getElementById('passwords').value;
            const confirmPassword = document.getElementById('password_confirmations').value;
            const matchDiv = document.getElementById('password-match');
            const matchIcon = document.getElementById('match-icon');
            const matchText = document.getElementById('match-text');
            const matchMessage = document.getElementById('match-message');

            if (confirmPassword.length > 0) {
                matchDiv.classList.remove('hidden');
                const isValid = password === confirmPassword;
                
                if (isValid) {
                    matchIcon.textContent = '✓';
                    matchText.textContent = 'Passwords match';
                    matchMessage.className = 'text-sm font-medium text-green-300';
                } else {
                    matchIcon.textContent = '✗';
                    matchText.textContent = 'Passwords do not match';
                    matchMessage.className = 'text-sm font-medium text-red-300';
                }
            } else {
                matchDiv.classList.add('hidden');
            }

            validateForm();
        }

        function validateForm() {
            const submitBtn = document.getElementById('submit-btn');
            
            if (currentStep === 3) {
                const passwordValid = Object.values(passwordChecks).every(Boolean);
                const password = document.getElementById('passwords').value;
                const confirmPassword = document.getElementById('password_confirmations').value;
                const passwordsMatch = password === confirmPassword && password.length > 0;
                const terms = document.getElementById('terms').checked;
                
                const isValid = passwordValid && passwordsMatch && terms;
                submitBtn.disabled = !isValid;
            }
        }

      /*   function handleSubmit(event) {
            event.preventDefault();
            
            if (validateFinalStep()) {
                // Show success modal
                document.getElementById('success-modal').classList.remove('hidden');
                document.getElementById('success-modal').classList.add('flex');
                
                // Here you would normally submit to your backend
                console.log('Form submitted successfully');
                
                // Reset form after 3 seconds (optional)
                setTimeout(() => {
                    resetForm();
                }, 3000);
            }
        }
 */
        /* function closeSuccessModal() {
            document.getElementById('success-modal').classList.add('hidden');
            document.getElementById('success-modal').classList.remove('flex');
        } */

        function resetForm() {
            currentStep = 1;
            showStep(currentStep);
            updateStepIndicators();
            document.getElementById('registrationForm').reset();
            document.getElementById('customer').checked = true;
            handleRoleChange({ target: { value: 'customer' } });
            document.getElementById('password-strength').classList.add('hidden');
            document.getElementById('password-match').classList.add('hidden');
        }

         document.addEventListener('DOMContentLoaded', function () {
    const nextBtn = document.getElementById('next-step-1');
    const form = document.getElementById('registrationForm');
        console.log(nextBtn);
    if (!nextBtn || !form) {
        console.error('Form or button not found');
        return;
    }

    nextBtn.addEventListener('click', async function () {
        document.getElementById('nameError').textContent = '';
        document.getElementById('emailError').textContent = '';
        document.getElementById('phoneError').textContent = '';
        const formData = new FormData(form);

        try {
            const response = await fetch("{{ route('register') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                alert('Step 1 validated successfully!');
                // Go to next step here (if using steps)
                // document.getElementById('step1').classList.add('hidden');
                // document.getElementById('step2').classList.remove('hidden');
            } else if (response.status === 422) {
                const errors = data.errors;
                if (errors.name) {
                    document.getElementById('nameError').textContent = errors.name[0];
                }
                if (errors.email) {
                    document.getElementById('emailError').textContent = errors.email[0];
                }
                 if (errors.phone) {
                    document.getElementById('phoneError').textContent = errors.phone[0];
                }
                // Add more fields like email, phone here
            } else {
                console.error('Unexpected error:', data);
            }
        } catch (error) {
            console.error('AJAX error:', error);
        }
    });
});
const selectedRole = $('input[name="role"]:checked').val(); // for radio
console.log('Selected role:', selectedRole);

    </script>
<!-- @section('js')
     @vite(['resources/js/register.js'])
    @endsection -->
@endsection
