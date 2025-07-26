@include('backend.header');

<body>
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a href="#" class="logo-login d-flex align-items-center w-auto">
                                    <img src="{{ asset('images/logo.png') }}" alt="">
                                </a>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Enter Your 4 Digit OTP</h5>
                                    </div>
                                    <form method="POST" action="{{ route('otp.verify') }}" class="row g-3">
                                        @csrf
                                        @method('POST')
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif
                                        @if (Session::has('error'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('error') }}
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <label for="otp" class="form-label">Login OTP</label>
                                            <input type="number" class="form-control" id="otp" name="otp" required>
                                        </div>
                                        @error('otp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    
                                        <!-- Countdown Timer -->
                                        <div class="col-md-12">
                                            <span>Time Remaining: <span id="timer">2:00</span></span>
                                        </div>
                                    
                                        <!-- Buttons -->
                                        <div class="col-12 text-end">
                                            <button id="submitBtn" class="btn btn-primary w-50" type="submit">Submit</button>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('otp.resend') }}" class="row g-3">
                                        @csrf
                                        <div class="col-12 pb-4 text-end">
                                            <button id="resendOtpBtn" class="btn btn-secondary w-50 d-none" type="submit">Resend OTP</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <footer class="footer">
        <div class="copyright text-center">
            &copy; Copyright <strong><span>Bangladesh Air Force Museum</span></strong>. All Rights Reserved <strong><a href="https://exebd.com/" target="_blank"><span>Powered by Execution</span></a></strong>
        </div>
    </footer>

    @include('backend.footer');
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let timerElement = document.getElementById('timer');
        let resendBtn = document.getElementById('resendOtpBtn');
        let submitBtn = document.getElementById('submitBtn');
        let inputField = document.getElementById('otp');

        // Try to get the countdown state from localStorage
        let countdown = localStorage.getItem('countdown') ? parseInt(localStorage.getItem('countdown')) : 120; // Default to 2 minutes (120 seconds)
        
        function startCountdown() {
            const interval = setInterval(() => {
                let minutes = Math.floor(countdown / 60);
                let seconds = countdown % 60;

                timerElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                countdown--;

                // Save the countdown time in localStorage every second
                localStorage.setItem('countdown', countdown);

                if (countdown < 0) {
                    clearInterval(interval);
                    submitBtn.disabled = true;
                    inputField.disabled = true;
                    resendBtn.classList.remove('d-none');
                    submitBtn.classList.add('d-none');  // Hide submit button
                }
            }, 1000);
        }

        startCountdown();

        resendBtn.addEventListener('click', function () {
            // Reset timer and buttons
            countdown = 120; // Reset to 2 minutes
            submitBtn.disabled = false;
            inputField.disabled = false;
            resendBtn.classList.add('d-none');
            submitBtn.classList.remove('d-none');  // Show submit button
            timerElement.textContent = '2:00';
            
            // Reset countdown in localStorage
            localStorage.setItem('countdown', countdown);

            startCountdown();
        });
    });
</script>



</html>
