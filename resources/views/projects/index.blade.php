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
    <div class="mx-auto w-[360px] bg-white">
        <div class="fixed top-0 w-[360px] px-1 py-3 bg-white shadow-lg rounded-lg">
            <div class="flex items-center justify-between">
                <div class="text-lg font-semibold text-gray-900">
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
                    がやりたい
                    <span
                        class="text-3xl mx-2 border-black border-b-2 px-1 text-black">{{ $projects->count() <= 100 ? $projects->count() . '/100' : $projects->count() }}</span>のこと
                </div>
            </div>
        </div>
        <div class="mt-20 py-2">
            <a href="{{ route('top.index') }}" class="text-lg text-teal-700 py-1 px-1 rounded-md font-bold">
                <i class="fa-solid fa-arrow-rotate-left ms-4 me-2"></i>トップページに戻る
            </a>
        </div>
        <main class="mt-2 pb-24 ps-2 bg-white">
            <div class="container mx-auto flex flex-col gap-2">
                @foreach ($projects as $project)
                    <a href="{{ route('projects.show', ['no' => $project->no]) }}"
                        class="flex items-center hover:bg-blue-100 p-2 rounded-sm">
                        @auth
                            <form action="{{ route('projects.check', ['id' => $project->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="">
                                    @if ($project->completed)
                                        <i class="fa-regular fa-square-check text-[30px] me-2"></i>
                                    @else
                                        <i class="fa-regular fa-square text-[30px] me-2"></i>
                                    @endif
                                </button>
                            </form>
                        @else
                            @if ($project->completed)
                                <i class="fa-regular fa-square-check text-[30px] me-2"></i>
                            @else
                                <i class="fa-regular fa-square text-[30px] me-2"></i>
                            @endif
                        @endauth
                        {{ $project->title }}
                    </a>
                @endforeach
            </div>
        </main>
        <div class="fixed bottom-0 left-0 right-0 bg-white pt-1 flex justify-center items-center shadow-lg">
            @auth
                <a href="{{ route('projects.create') }}" type="submit"
                    class="bg-blue-500 text-white rounded-2xl text-center py-2 px-4 mb-8">
                    <i class="fa-solid fa-file-circle-plus text-3xl"></i>
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
