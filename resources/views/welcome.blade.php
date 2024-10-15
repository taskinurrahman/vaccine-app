<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vaccine app</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
<header class="">
    <div>

    </div>
    @if (Route::has('login'))
        <nav class="-mx-3 flex justify-between bg-zinc-50 px-10">
            <div class="logo mt-2">
                <a href="/">
                    <x-application-logo class="size-10"/>
                </a>
            </div>

            <div class="auth py-5">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:focus-visible:ring-white"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:focus-visible:ring-white"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </div>

        </nav>
    @endif
</header>
<main style="background-image: url({{asset('/images/vaccine-landing.jpg') }})"
      class="relative h-[700px] overflow-hidden bg-cover bg-[100%] bg-no-repeat">
    <div
        class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-black/60 bg-fixed">
        <div class="flex h-full items-center justify-center">
            <div class="px-6 text-center text-white md:px-12">
                <h1 class="mb-6 text-5xl font-bold">Stay Safe, Stay Vaccinated</h1>
                <h2 class="font-bold text-3xl">Your health, our priority.
                </h2>
                <h2 class="font-bold text-xl mt-4">Check Your Vaccine Schedule By Entering Your
                    NID Number Below.
                </h2>

                <form id="nidForm">
                    @csrf
                    <div>
                        <input id="nid"
                               class="mt-5 w-1/2 h-10 px-5 text-black border"
                               type="text"
                               name="nid"
                               value="{{ old('nid') }}"
                               placeholder="NID"
                               oninput="clearError()"
                        />
                        <div id="errorMessage" class="text-white mt-2"></div>
                    </div>
                    <button type="submit" class="mt-2 bg-blue-600 hover:bg-blue-800 text-white rounded px-4 py-2">Search
                        Schedule
                    </button>
                </form>
                <div id="profileDisplay" class="mt-10 text-white text-center"></div>
            </div>
        </div>
    </div>

</main>


<footer class="bg-white dark:bg-gray-800">
    <div class="w-full mx-auto h-10 p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">Vaccne App™</a>. All Rights Reserved.
    </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="#" class="hover:underline me-4 md:me-6">About</a>
            </li>
            <li>
                <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
            </li>
            <li>
                <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
            </li>
            <li>
                <a href="#" class="hover:underline">Contact</a>
            </li>
        </ul>
    </div>
</footer>


</body>
</html>
<script>
    document.getElementById('nidForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const nidInput = document.getElementById('nid');
        const errorMessage = document.getElementById('errorMessage');
         errorMessage.textContent = '';
        if (!nidInput.value) {
            errorMessage.textContent = 'NID is required.';
        }else {
            console.log(nidInput.value)
            axios.post('/search-schedule', {
                nid: nidInput.value
            })
                .then(response => {
                    if (response.data.success) {
                        displayUserProfile(response.data.user);
                    } else {
                        errorMessage.textContent = response.data.message || 'User not found.';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    errorMessage.textContent = 'An error occurred while fetching the user profile.';
                });
        }
    });

    function displayUserProfile(user) {
        const profileDisplay = document.getElementById('profileDisplay');
        profileDisplay.innerHTML = `
                <h2>VaccineSchedule</h2>
                <p><strong>Name:</strong> ${user.name}</p>
                <p><strong>Email:</strong> ${user.email}</p>
            `;
    }

    function clearError() {
        document.getElementById('errorMessage').textContent = '';
    }
</script>
