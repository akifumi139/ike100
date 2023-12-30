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
                    <span class="bg-sky-200 py-1 ps-3 pe-2 text-3xl font-bold me-2 rounded-md text-center">
                        僕
                    </span>
                    の目標
                </div>
            </div>
        </div>
        <div class="pt-16 flex me-2">
            <a href="{{ route('projects.show', ['no' => $project->no]) }}"
                class="text-lg  text-teal-700 py-1 px-1 rounded-md font-bold flex items-center">
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                    <title>back_2_fill</title>
                    <g id="back_2_fill" fill='none' fill-rule='nonzero'>
                        <path
                            d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                        <path fill='#0F766EFF'
                            d='M7.16 10.972A7 7 0 0 1 19.5 15.5a1.5 1.5 0 1 0 3 0c0-5.523-4.477-10-10-10a9.973 9.973 0 0 0-7.418 3.295L4.735 6.83a1.5 1.5 0 1 0-2.954.52l1.042 5.91c.069.391.29.74.617.968.403.282.934.345 1.385.202l5.644-.996a1.5 1.5 0 1 0-.52-2.954l-2.788.491Z' />
                    </g>
                </svg>
                <span class="ms-2">戻る</span>
            </a>
        </div>
        <main class="pt-4 ps-2 bg-white">
            <div class="text-2xl font-light transform scaleY-120 my-0 mb-6 font-serif bg-gray-200 p-2 w-full"
                style="font-family: 'Dela Gothic One', sans-serif;">{{ $project->title }}</div>
            <form action="{{ route('tasks.store', ['projectId' => $project->id]) }}" method="POST" class="mt-10">
                @csrf
                <div class="mb-4">
                    <input type="text" id="name" name="name"
                        class="w-full border rounded-md p-2 bg-sky-100 font-bold" placeholder="君の目標を..." required>
                </div>
                <div class="text-center mt-10">
                    <button type="submit" class="bg-blue-600 text-white w-28 py-2 px-6 rounded-md font-bold">
                        追加する
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>
