<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>IKE100ダッシュボード</title>
    @vite(['resources/css/reset.css','resources/css/app.css'])

</head>
<body class="bg-gray-100 font-sans  text-black">
    <div class="container mx-auto mt-8 flex">
        <main class="w-3/4 ml-auto">
            <div class="bg-white">
                <h2 class="text-xl font-semibold mb-4">ブログ用の編集エリア</h2>

            </div>
        </main>
        <aside class="w-1/4 bg-gray-300 p-4 fixed bottom-0 left-0 h-full overflow-y-auto">
            <ul>
                @foreach ($projects as  $project)
                <li class="mb-4"><a href="#" class="hover:text-gray-300">{{$project->title}}</a></li>
                @endforeach
            </ul>
        </aside>

    </div>

</body>
</html>