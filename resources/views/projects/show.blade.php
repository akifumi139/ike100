<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKE100</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Zen+Maru+Gothic:wght@500&display=swap"
        rel="stylesheet">

    @vite(['resources/css/reset.css', 'resources/css/app.css'])
</head>

<body class="mx-auto bg-white text-black max-w-[360px]">
    <main>
        <div class="flex justify-between items-center">
            <a href="{{ route('projects.index') }}" class="underline ms-3 flex font-semibold">
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                    <title>back_2_fill</title>
                    <g id="back_2_fill" fill='none' fill-rule='nonzero'>
                        <path
                            d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                        <path fill='#0F766EFF'
                            d='M7.16 10.972A7 7 0 0 1 19.5 15.5a1.5 1.5 0 1 0 3 0c0-5.523-4.477-10-10-10a9.973 9.973 0 0 0-7.418 3.295L4.735 6.83a1.5 1.5 0 1 0-2.954.52l1.042 5.91c.069.391.29.74.617.968.403.282.934.345 1.385.202l5.644-.996a1.5 1.5 0 1 0-.52-2.954l-2.788.491Z' />
                    </g>
                </svg>
                <div class="ms-2">やりたいことリストに戻る</div>
            </a>
            <a href="{{ route('projects.index') }}">
                <img class="w-28 flex-1 pe-3" src="{{ asset('images/IKELog.png') }}">
            </a>
        </div>
        <div class="top-0 max-w-[360px] bg-white shadow-lg rounded-lg py-3">
            <div class="flex justify-between items-center mx-auto">
                <div class="col-1">
                    @if (isset($projectBack))
                        <a href="{{ route('projects.show', ['no' => $projectBack->no]) }}" class="flex-1 flex">
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                                <g fill='none' fill-rule='evenodd'>
                                    <path
                                        d='M24 0v24H0V0h24ZM12.594 23.258l-.012.002-.071.035-.02.004-.014-.004-.071-.036c-.01-.003-.019 0-.024.006l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.016-.018Zm.264-.113-.014.002-.184.093-.01.01-.003.011.018.43.005.012.008.008.201.092c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.003-.011.018-.43-.003-.012-.01-.01-.184-.092Z' />
                                    <path fill='#09244BFF'
                                        d='M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm-.005-5.758a1 1 0 0 0 0-1.414L10.168 13h6.076a1 1 0 0 0 0-2h-6.076l1.829-1.829a1 1 0 0 0-1.415-1.414l-3.535 3.536a1 1 0 0 0 0 1.414l3.535 3.535a1 1 0 0 0 1.415 0Z' />
                                </g>
                            </svg>
                            <span class="ms-1">{{ $projectBack->title }}</span>
                        </a>
                    @else
                        <div class="flex-1 flex">
                            <span class="me-1"></span>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                                <g fill='none' fill-rule='nonzero'>
                                    <path
                                        d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                                    <path fill='#09244BFF'
                                        d='M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2Zm0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16ZM9.879 8.464 12 10.586l2.121-2.122a1 1 0 1 1 1.415 1.415l-2.122 2.12 2.122 2.122a1 1 0 0 1-1.415 1.415L12 13.414l-2.121 2.122a1 1 0 0 1-1.415-1.415L10.586 12 8.465 9.879a1 1 0 0 1 1.414-1.415Z' />
                                </g>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="col-1 flex justify-end">
                    @if (isset($projectNext))
                        <a href="{{ route('projects.show', ['no' => $projectNext->no]) }}" class="flex-1 flex ml-auto">
                            <span class="me-1">{{ $projectNext->title }}</span>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                                <g fill='none' fill-rule='evenodd'>
                                    <path
                                        d='M24 0v24H0V0h24ZM12.594 23.258l-.012.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.105.074.014.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.016-.018Zm.264-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.008.201.092c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.092.01-.009.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                                    <path fill='#09244BFF'
                                        d='M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm.005-14.242a1 1 0 0 0 0 1.414L13.833 11H7.757a1 1 0 0 0 0 2h6.076l-1.828 1.829a1 1 0 0 0 1.414 1.414l3.535-3.536a1 1 0 0 0 0-1.414L13.42 7.758a1 1 0 0 0-1.414 0Z' />
                                </g>
                            </svg>
                        </a>
                    @else
                        <div class="flex-1 flex">
                            <span class="me-1 ml-auto"></span>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                                <g fill='none' fill-rule='nonzero'>
                                    <path
                                        d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                                    <path fill='#09244BFF'
                                        d='M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2Zm0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16ZM9.879 8.464 12 10.586l2.121-2.122a1 1 0 1 1 1.415 1.415l-2.122 2.12 2.122 2.122a1 1 0 0 1-1.415 1.415L12 13.414l-2.121 2.122a1 1 0 0 1-1.415-1.415L10.586 12 8.465 9.879a1 1 0 0 1 1.414-1.415Z' />
                                </g>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @auth
            <div class="py-2 flex justify-end me-2">
                <a href="{{ route('projects.edit', ['no' => $project->no]) }}"
                    class="text-lg border-2 border-teal-700 text-teal-700 w-24 py-1 px-3 rounded-md font-bold flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" class="text-teal-700" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M5 2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h3v-2H5V4h12v4h2V4a2 2 0 0 0-2-2H5Zm3 5a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H8Zm7.949 3.811a3 3 0 0 1 4.242 4.243l-5.656 5.657a1 1 0 0 1-.707.293h-2.829a1 1 0 0 1-1-1v-2.829a1 1 0 0 1 .293-.707l5.657-5.657Zm2.828 1.414a1 1 0 0 0-1.414 0l1.414 1.415a1 1 0 0 0 0-1.415Zm-1.414 2.829-1.414-1.414-3.95 3.95v1.414h1.414l3.95-3.95Z" />
                    </svg>
                    編集
                </a>
            </div>
        @endauth
        <div class="my-3"
            style="max-width: 300px; position: relative; text-align: center; display: flex; align-items: center;">
            <img class="mx-auto" src="{{ asset($project->image ?? 'images/no-image.png') }}" style="max-width: 100%;">
        </div>
        <h1 class="text-xl font-light transform scaleY-120 my-0 mb-6 font-serif"
            style="font-family: 'Dela Gothic One', sans-serif;">
            {{ $project->title }}
        </h1>

        <div class="ms-1 my-5 font-medium font-serif" style="font-family: 'Zen Maru Gothic', serif;">
            {!! nl2br($project->body) !!}
        </div>

        <div class="container mx-auto mt-8 pb-8">
            <div class="flex justify-between me-6 mb-4">
                <h1 class="text-xl font-semibold">目標達成項目</h1>
                @auth
                    <a href="{{ route('tasks.create', ['projectId' => $project->id]) }}" type="submit"
                        class="bg-blue-500 text-white rounded-xl py-1 px-5 shadow-lg">
                        <div class="text-base">追加する</div>
                    </a>
                @endauth
            </div>
            @foreach ($project->tasks as $task)
                <div class="flex justify-start items-center text-lg py-1 rounded-sm gap-2">
                    @auth
                        <form action="{{ route('tasks.check', ['id' => $task->id]) }}" class="inline-block" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center">
                                @if ($task->completed)
                                    <img class="w-8" src="{{ asset('images/task/check.png') }}">
                                @else
                                    <img class="w-8 " src="{{ asset('images/task/no-check.png') }}">
                                @endif
                            </button>
                        </form>
                    @else
                        <div class="inline-block">
                            @if ($task->completed)
                                <img class="w-8" src="{{ asset('images/task/check.png') }}">
                            @else
                                <img class="w-8" src="{{ asset('images/task/no-check.png') }}">
                            @endif
                        </div>
                    @endauth
                    <a href="{{ route('tasks.edit', ['projectId' => $project->id, 'taskId' => $task->id]) }}"
                        class="hover:bg-blue-100 p-1 w-full">{{ $task->name }}</a>
                </div>
            @endforeach
        </div>
        <div class="mb-10">
            <div class="flex justify-between me-6 mb-4">
                <h1 class="text-xl font-semibold">達成難易度： {{ $project->level ?? '---' }}</h1>
            </div>
            <div class="ms-1 my-5 font-medium font-serif" style="font-family: 'Zen Maru Gothic', serif;">
                {!! nl2br($project->hurdle) !!}
            </div>
        </div>

        @if (isset($project->review))
            <div class="my-10">
                <div class="flex justify-between me-6 mb-4">
                    <h1 class="text-xl font-semibold">目的達成</h1>
                </div>
                <div class="ms-1 my-5 font-medium font-serif" style="font-family: 'Zen Maru Gothic', serif;">
                    {!! nl2br($project->review) !!}
                </div>
            </div>
        @endif
    </main>
    @auth
        <form action="{{ route('projects.destroy', ['id' => $project->id]) }}" method="POST" class="pt-24 pb-10">
            @csrf
            @method('DELETE')
            <div class="text-center mt-10">
                <button type="submit" id="deleteButton"
                    class="bg-red-400 text-white w-56 py-2 px-8 rounded-md font-bold">
                    やりたいことを削除する
                </button>
            </div>
        </form>
    @endauth
</body>

@auth
    <script>
        document.getElementById('deleteButton').addEventListener('click', function(event) {
            const isConfirmed = window.confirm('やりたい事リストから、削除しますか？');

            if (isConfirmed) {
                return true;
            } else {
                event.preventDefault();
                return false;
            }
        });
    </script>
@endauth

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
