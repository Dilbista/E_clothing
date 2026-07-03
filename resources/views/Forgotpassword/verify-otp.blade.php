<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP | E_Clothing</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md text-center">
        <!-- Icon -->
        <div class="mx-auto bg-yellow-100 w-20 h-20 rounded-full flex items-center justify-center mb-4">
            <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-2">OTP Verification</h2>
        <p class="text-gray-500 text-sm mb-6">
            One Time Password (OTP) has been sent via Email to <br>
            <span class="font-semibold text-gray-700">{{ session('email') }}</span>.
        </p>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded-lg mb-4 text-sm">{{ session('error') }}</div>
        @endif

        {{-- <p class="text-gray-500 text-sm mb-6">Resend OTP in <span id="timer" class="font-bold text-gray-700">01:00</span></p> --}}

        <form action="{{ route('verify.otp') }}" method="POST">
            @csrf
            <!-- Hidden field for controller -->
            <input type="hidden" name="otp" id="otp-hidden">

            <div class="flex justify-center gap-2 mb-6" id="otp-inputs">
                <input type="text" maxlength="1" class="w-12 h-12 border-2 border-gray-300 rounded-lg text-center text-xl font-bold focus:border-blue-500 focus:outline-none otp-field">
                <input type="text" maxlength="1" class="w-12 h-12 border-2 border-gray-300 rounded-lg text-center text-xl font-bold focus:border-blue-500 focus:outline-none otp-field">
                <input type="text" maxlength="1" class="w-12 h-12 border-2 border-gray-300 rounded-lg text-center text-xl font-bold focus:border-blue-500 focus:outline-none otp-field">
                <input type="text" maxlength="1" class="w-12 h-12 border-2 border-gray-300 rounded-lg text-center text-xl font-bold focus:border-blue-500 focus:outline-none otp-field">
                <input type="text" maxlength="1" class="w-12 h-12 border-2 border-gray-300 rounded-lg text-center text-xl font-bold focus:border-blue-500 focus:outline-none otp-field">
                <input type="text" maxlength="1" class="w-12 h-12 border-2 border-gray-300 rounded-lg text-center text-xl font-bold focus:border-blue-500 focus:outline-none otp-field">
            </div>

            <button type="submit" class="w-full bg-slate-800 text-white py-3 rounded-xl font-semibold hover:bg-slate-900 transition">Verify OTP</button>
        </form>
    </div>

    <script>
        const inputs = document.querySelectorAll('.otp-field');
        const hiddenInput = document.getElementById('otp-hidden');
        const timerSpan = document.getElementById('timer');

        // Handle Input Logic
        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                // Only allow numbers
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
                
                if (e.target.value.length === 1) {
                    if (inputs[index + 1]) inputs[index + 1].focus();
                }
                updateHiddenInput();
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value) {
                    if (inputs[index - 1]) inputs[index - 1].focus();
                }
            });
        });

        function updateHiddenInput() {
            let val = "";
            inputs.forEach(i => val += i.value);
            hiddenInput.value = val;
        }

        // Timer Logic with LocalStorage
        let time = localStorage.getItem('otp_timer') || 60;

        const countdown = setInterval(() => {
            time--;
            localStorage.setItem('otp_timer', time);

            let mins = Math.floor(time / 60).toString().padStart(2, '0');
            let secs = (time % 60).toString().padStart(2, '0');
            timerSpan.innerText = `${mins}:${secs}`;

            if (time <= 0) {
                clearInterval(countdown);
                localStorage.removeItem('otp_timer');
                timerSpan.innerHTML = '<a href="#" class="text-blue-600 font-bold" onclick="resetTimer()">Resend</a>';
            }
        }, 1000);

        function resetTimer() {
            localStorage.removeItem('otp_timer');
            location.reload(); // Reload to restart timer
        }
    </script>
</body>
</html>