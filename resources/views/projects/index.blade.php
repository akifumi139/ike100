<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKE100</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Noto+Serif+JP:wght@200&display=swap"
        rel="stylesheet">

    @vite(['resources/css/reset.css', 'resources/css/app.css'])
</head>

<body class="text-black bg-white">
    <div class="mx-auto w-[360px] bg-white rounded-lg ">
        <div class="fixed top-0 w-[360px] p-3 bg-white shadow-lg rounded-lg">
            <div class="flex items-center justify-between">
                <div class="text-lg font-semibold tracking-wide text-gray-900">
                    @auth
                        <form action="{{ route('auth.logout') }}" class="inline-block text-black" method="POST">
                            @csrf

                            <button type="submit" class="bg-sky-200 py-1 px-2 text-3xl font-bold me-2 rounded-md">
                                僕
                            </button>
                        </form>
                    @else
                        <a href="{{ route('auth.login') }}"
                            class="bg-green-200 py-1 ps-3 pe-1 text-3xl font-bold rounded-md me-2">
                            IKE
                        </a>
                    @endauth
                    がやりたい<span class="text-3xl mx-2 border-black border-b-2 px-1 text-black">100</span>のこと
                </div>
            </div>
        </div>
        <main class="pt-8 pb-24 ps-2 bg-white">
            <div class="container mx-auto pt-14 flex flex-col gap-4">
                @foreach ($projects as $project)
                    <div class="flex items-center">
                        <div class="mx-1 me-2">
                            @auth
                                <form action="{{ route('projects.check', ['id' => $project->id]) }}" class="inline-block"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="">
                                        @if ($project->completed)
                                            <img class="w-8" src="{{ asset('images/project/check.png') }}">
                                        @else
                                            <img class="w-8" src="{{ asset('images/project/no-check.png') }}">
                                        @endif
                                    </button>
                                </form>
                            @else
                                @if ($project->completed)
                                    <img class="w-8" src="{{ asset('images/project/check.png') }}">
                                @else
                                    <img class="w-8" src="{{ asset('images/project/no-check.png') }}">
                                @endif
                            @endauth
                        </div>
                        <a href="{{ route('projects.show', ['no' => $project->no]) }}"
                            class="ps-2 text-lg rounded-sm hover:bg-blue-100 py-1 w-full">
                            {{ $project->title }}
                        </a>
                    </div>
                @endforeach
            </div>
        </main>
        <div class="fixed bottom-0 left-0 right-0 bg-white pt-1 flex justify-center items-center shadow-lg">
            @auth
                <a href="{{ route('projects.create') }}" type="submit"
                    class="bg-blue-500 text-white rounded-t-2xl pt-1 px-8 shadow-lg flex flex-col items-center">
                    <svg xmlns='http://www.w3.org/2000/svg' width='26' height='27' viewBox="0 0 26 26">
                        <title>追加ボタン</title>
                        <g id="file_new_line" fill='none' fill-rule='nonzero'>
                            <path
                                d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                            <path fill='#FFFFFFFF'
                                d='M13.586 2a2 2 0 0 1 1.284.467l.13.119L19.414 7a2 2 0 0 1 .578 1.238l.008.176V20a2 2 0 0 1-1.85 1.995L18 22H6a2 2 0 0 1-1.995-1.85L4 20V4a2 2 0 0 1 1.85-1.995L6 2h7.586ZM12 4H6v16h12V10h-4.5A1.5 1.5 0 0 1 12 8.5V4Zm0 7.5a1 1 0 0 1 1 1V14h1.5a1 1 0 1 1 0 2H13v1.5a1 1 0 1 1-2 0V16H9.5a1 1 0 1 1 0-2H11v-1.5a1 1 0 0 1 1-1Zm2-7.086V8h3.586L14 4.414Z' />
                        </g>
                    </svg>
                    <div class="text-base">追加する</div>
                </a>
            @endauth
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollPosition = sessionStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
        }
    });

    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY;
        sessionStorage.setItem('scrollPosition', scrollPosition);
    });
</script>

</html>
