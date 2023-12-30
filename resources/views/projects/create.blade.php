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
                    が新しくやりたいこと
                </div>
            </div>
        </div>
        <main class="pt-16 pb-24 ps-2 bg-white">
            <form action="{{ route('projects.store') }}" method="POST" class="mt-20">
                @csrf
                <div class="mb-4">
                    <input type="text" id="title" name="title"
                        class="w-full border rounded-md p-2 bg-sky-100 font-bold" placeholder="君のやりたいを...">
                </div>
                <div class="text-center mt-10">
                    <button type="submit" class="bg-blue-600 text-white w-28 py-2 px-6 rounded-md font-bold">
                        作成する
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>
