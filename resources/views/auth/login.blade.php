@extends('layouts.guest')
@section('title')
    <title>CHRONEX - Login</title>
@endsection
@section('css')
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/login.css'])
@endsection
@section('body_class', 'relative min-h-screen')

@section('content')
@if (session('success'))
    <div class="alert alert-success succssnote" id="errornote">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
          <div class="alert alert-danger error-session"  id="errornote">
            {{session('error')}}
          </div>
      @endif
    <!-- Main Container -->
    <div class="flex items-center justify-center min-h-screen px-4 py-20">
        
        <!-- Login Container -->
        <div class="w-full max-w-md p-8 shadow-2xl glass-morphism rounded-3xl animate-slide-in">
            
            <!-- Logo Section -->
            <div class="mb-8 text-center">
                <a href="#" class="inline-flex items-center gap-3 mb-6">
                    <div class="flex items-center justify-center w-12 h-12 shadow-lg bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl animate-pulse-glow">
                        <i class="text-xl text-white bi bi-calendar-week"></i>
                    </div>
                    <span class="text-3xl font-bold tracking-wide text-white">CHRONEX</span>
                </a>
                <h2 class="mb-2 text-2xl font-bold text-white">Welcome Back</h2>
                <p class="text-white/80">Sign in to your account to continue</p>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="hidden p-4 mb-6 border glass-morphism rounded-xl border-green-300/30">
                <div class="flex items-center text-green-300">
                    <i class="mr-2 bi bi-check-circle"></i>
                    <span id="statusText"></span>
                </div>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" id="loginForm" class="space-y-6">
                @csrf
                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-white/90">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <i class="text-lg bi bi-envelope text-white/70"></i>
                        </div>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="w-full py-4 pl-12 pr-4 text-white transition-all duration-300 glass-input rounded-2xl placeholder-white/60 focus:outline-none"
                            placeholder="Enter your email"
                            required 
                            autofocus
                            value="{{ old('email') }}"
                        >
                    </div>
                    <span id="emailError" class="hidden text-sm text-red-300"></span>
                     @error('email')
                      <span class="invalid-feedback errorhadle mt-4 " role="alert">
                          <strong>{!! $message !!}</strong>
                      </span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-white/90">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <i class="text-lg bi bi-lock text-white/70"></i>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="w-full py-4 pl-12 pr-12 text-white transition-all duration-300 glass-input rounded-2xl placeholder-white/60 focus:outline-none"
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                            value="{{ old('email') }}"
                        >
                        <button 
                            type="button" 
                            id="togglePassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-4 transition-colors duration-200 text-white/70 hover:text-white">
                            <i id="toggleIcon" class="text-lg bi bi-eye"></i>
                        </button>
                    </div>
                    <span id="passwordError" class="hidden text-sm text-red-300"></span>
                    @error('password')
                      <span class="invalid-feedback errorhadle mt-4 " role="alert">
                          <strong>{!! $message !!}</strong>
                      </span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        name="remember"
                        class="w-4 h-4 text-blue-600 rounded bg-white/20 border-white/30 focus:ring-blue-500 focus:ring-2"
                    >
                    <label for="remember_me" class="ml-3 text-sm text-white/90">
                        Remember me
                    </label>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    id="submitBtn"
                    class="w-full py-4 px-6 gradient-button text-white font-semibold rounded-2xl transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-1 focus:outline-none focus:ring-4 focus:ring-white/20 disabled:opacity-50 disabled:cursor-not-allowed">
                    <span id="buttonText" class="flex items-center justify-center">
                        <i class="mr-2 bi bi-box-arrow-in-right"></i>
                        Sign In
                    </span>
                    <div id="loadingSpinner" class="items-center justify-center flex-1 hidden">
                        <div class="w-5 h-5 mr-2 border-b-2 border-white rounded-full animate-spin"></div>
                        Signing in...
                    </div>
                </button>
            </form>

            <!-- Forgot Password -->
            <div class="mt-4 text-center">
                <a href="#" class="text-sm font-medium text-blue-300 transition-colors duration-200 hover:text-blue-200">
                    Forgot your password?
                </a>
            </div>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-white/20"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-3 bg-transparent text-white/70">or continue with</span>
                </div>
            </div>

            <!-- Social Login Buttons -->
            <div class="grid grid-cols-2 gap-3">
                <button
                    type="button"
                    onclick="socialLogin('google')"
                    class="flex items-center justify-center px-4 py-3 text-sm font-medium text-white transition-all duration-300 glass-button rounded-xl hover:-translate-y-1 hover:shadow-lg">
                    <i class="mr-2 text-lg text-red-400 bi bi-google"></i>
                    Google
                </button>

                <button
                    type="button"
                    onclick="socialLogin('microsoft')"
                    class="flex items-center justify-center px-4 py-3 text-sm font-medium text-white transition-all duration-300 glass-button rounded-xl hover:-translate-y-1 hover:shadow-lg">
                    <i class="mr-2 text-lg text-blue-400 bi bi-microsoft"></i>
                    Microsoft
                </button>
            </div>

            <!-- Sign Up Link -->
            <div class="pt-4 mt-6 text-center border-t border-white/20">
                <p class="text-sm text-white/80">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-semibold text-blue-300 transition-colors duration-200 hover:text-blue-200">
                        Sign up here
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Toast Notifications -->
    <div id="successToast" class="fixed z-50 hidden p-4 transition-all duration-300 transform border top-4 right-4 glass-morphism rounded-xl border-green-300/30">
        <div class="flex items-center text-green-300">
            <i class="mr-3 text-xl bi bi-check-circle"></i>
            <span>Successfully signed in!</span>
        </div>
    </div>

    <div id="errorToast" class="fixed z-50 hidden p-4 transition-all duration-300 transform border top-4 right-4 glass-morphism rounded-xl border-red-300/30">
        <div class="flex items-center text-red-300">
            <i class="mr-3 text-xl bi bi-exclamation-circle"></i>
            <span id="errorText">Invalid credentials!</span>
        </div>
    </div>

    <script>
        // Form elements
        const form = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const togglePasswordBtn = document.getElementById('togglePassword');
        const toggleIcon = document.getElementById('toggleIcon');
        const submitBtn = document.getElementById('submitBtn');
        const buttonText = document.getElementById('buttonText');
        const loadingSpinner = document.getElementById('loadingSpinner');

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            setupEventListeners();
            
            // Simulate Laravel session status
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('status')) {
                showStatusMessage(urlParams.get('status'));
            }
        });

        function setupEventListeners() {
            // Password visibility toggle
            togglePasswordBtn.addEventListener('click', togglePasswordVisibility);

            // Form validation
            emailInput.addEventListener('input', validateEmail);
            passwordInput.addEventListener('input', validatePassword);
            emailInput.addEventListener('blur', validateEmail);
            passwordInput.addEventListener('blur', validatePassword);

            // Clear errors on focus
            emailInput.addEventListener('focus', () => clearFieldError('email'));
            passwordInput.addEventListener('focus', () => clearFieldError('password'));

            // Form submission
            form.addEventListener('submit', handleFormSubmit);
        }

        function togglePasswordVisibility() {
            const isPassword = passwordInput.type === 'password';
            
            if (isPassword) {
                passwordInput.type = 'text';
                toggleIcon.className = 'bi bi-eye-slash text-lg';
            } else {
                passwordInput.type = 'password';
                toggleIcon.className = 'bi bi-eye text-lg';
            }
        }

        function validateEmail() {
            const email = emailInput.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!email) {
                showFieldError('email', 'Email is required');
                return false;
            } else if (!emailRegex.test(email)) {
                showFieldError('email', 'Please enter a valid email address');
                return false;
            } else {
                clearFieldError('email');
                return true;
            }
        }

        function validatePassword() {
            const password = passwordInput.value;
            
            if (!password) {
                showFieldError('password', 'Password is required');
                return false;
            } else if (password.length < 8) {
                showFieldError('password', 'Password must be at least 8 characters');
                return false;
            } else {
                clearFieldError('password');
                return true;
            }
        }

        function showFieldError(fieldName, message) {
            const errorElement = document.getElementById(fieldName + 'Error');
            const inputElement = document.getElementById(fieldName);
            
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
            
            // Add red border effect
            inputElement.style.borderColor = 'rgba(239, 68, 68, 0.5)';
            inputElement.style.boxShadow = '0 0 0 2px rgba(239, 68, 68, 0.2)';
        }

        function clearFieldError(fieldName) {
            const errorElement = document.getElementById(fieldName + 'Error');
            const inputElement = document.getElementById(fieldName);
            
            errorElement.textContent = '';
            errorElement.classList.add('hidden');
            
            // Remove red border effect
            inputElement.style.borderColor = 'rgba(255, 255, 255, 0.2)';
            inputElement.style.boxShadow = '';
        }

        function handleFormSubmit(event) {
            event.preventDefault();
            
            // Validate all fields
            const isEmailValid = validateEmail();
            const isPasswordValid = validatePassword();
            
            if (!isEmailValid || !isPasswordValid) {
                showErrorToast('Please fix the errors above');
                return;
            }

           /*  // Show loading state
            setLoadingState(true);

            // Simulate Laravel authentication
            simulateLogin(); */
        }

        function simulateLogin() {
            const email = emailInput.value.trim();
            const password = passwordInput.value;

            // Simulate server response after 2 seconds
            setTimeout(() => {
                // Demo authentication scenarios
                if (email === 'admin@chronex.com' && password === 'password123') {
                    // Success - admin account
                    showSuccessToast();
                    setTimeout(() => {
                        console.log('Redirecting to dashboard...');
                        // In Laravel: window.location.href = "{{ route('dashboard') }}";
                    }, 1500);
                    
                } else if (email === 'user@chronex.com' && password === 'user123') {
                    // Success - regular user
                    showSuccessToast();
                    setTimeout(() => {
                        console.log('Redirecting to home...');
                        // In Laravel: window.location.href = "";
                    }, 1500);
                    
                } else if (email.includes('@') && password.length >= 6) {
                    // Invalid credentials but format is correct
                    showFieldError('email', 'These credentials do not match our records.');
                    setLoadingState(false);
                    
                } else {
                    // Format errors are already handled by validation
                    showErrorToast('Please check your email and password format');
                    setLoadingState(false);
                }
            }, 2000);
        }

        function setLoadingState(isLoading) {
            if (isLoading) {
                submitBtn.disabled = true;
                buttonText.classList.add('hidden');
                loadingSpinner.classList.remove('hidden');
                submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            } else {
                submitBtn.disabled = false;
                buttonText.classList.remove('hidden');
                loadingSpinner.classList.add('hidden');
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
            }
        }

        function showSuccessToast() {
            const successToast = document.getElementById('successToast');
            successToast.classList.remove('hidden');
            successToast.style.transform = 'translateX(0)';
            
            setTimeout(() => {
                successToast.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    successToast.classList.add('hidden');
                }, 300);
            }, 3000);
        }

        function showErrorToast(message) {
            const errorToast = document.getElementById('errorToast');
            const errorText = document.getElementById('errorText');
            
            errorText.textContent = message;
            errorToast.classList.remove('hidden');
            errorToast.style.transform = 'translateX(0)';
            
            setTimeout(() => {
                errorToast.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    errorToast.classList.add('hidden');
                }, 300);
            }, 5000);
        }

        function showStatusMessage(status) {
            const statusMessage = document.getElementById('statusMessage');
            const statusText = document.getElementById('statusText');
            
            // Simulate Laravel session status messages
            const statusMessages = {
                'verification-link-sent': 'A new verification link has been sent to your email address.',
                'password-reset': 'Your password has been reset successfully.',
                'logout': 'You have been logged out successfully.'
            };
            
            if (statusMessages[status]) {
                statusText.textContent = statusMessages[status];
                statusMessage.classList.remove('hidden');
                
                setTimeout(() => {
                    statusMessage.classList.add('hidden');
                }, 10000);
            }
        }

        function socialLogin(provider) {
            console.log(`${provider} login initiated`);
            
            // Show loading effect
            showErrorToast(`Redirecting to ${provider.charAt(0).toUpperCase() + provider.slice(1)}...`);
            
            // In Laravel, you would redirect to:
            // window.location.href = `/auth/${provider}`;
            setTimeout(() => {
                console.log(`${provider} OAuth would be implemented here`);
            }, 1500);
        }
    </script>

@endsection