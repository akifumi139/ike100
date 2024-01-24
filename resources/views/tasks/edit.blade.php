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
                <i class="fa-solid fa-arrow-rotate-left ms-4 me-2"></i>戻る
            </a>
        </div>
        <main class="pt-4 ps-2 bg-white">
            <div class="text-2xl font-light transform scaleY-120 my-0 mb-6 font-serif bg-gray-200 p-2 w-full"
                style="font-family: 'Dela Gothic One', sans-serif;">{{ $project->title }}</div>
            <form action="{{ route('tasks.update', ['projectId' => $project->id, 'taskId' => $task->id]) }}"
                method="POST" class="mt-12">
                @csrf
                <div class="">
                    <input type="text" id="name" name="name"
                        class="w-full border rounded-md p-2 bg-sky-100 font-bold" value="{{ $task->name }}"
                        placeholder="君の目標を...">
                </div>
                <div class="text-sm mt-1 ms-3">※空欄にすると目標を消せます</div>
                <div class="text-center mt-10">
                    <button type="submit" class="bg-orange-600 text-white w-28 py-2 px-6 rounded-md font-bold">
                        更新する
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>
