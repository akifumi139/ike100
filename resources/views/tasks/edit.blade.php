<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IKE100</title>
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Noto+Serif+JP:wght@200&display=swap"
    rel="stylesheet">

  @vite(['resources/css/app.css'])
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
      <a class="text-lg  text-teal-700 py-1 px-1 rounded-md font-bold flex items-center"
        href="{{ route('projects.show', ['no' => $project->no]) }}">
        <i class="fa-solid fa-arrow-rotate-left ms-4 me-2"></i>戻る
      </a>
    </div>
    <main class="py-4 ps-2 bg-white">
      <h1 class="text-xl font-light transform ms-1 mb-4" style="font-family: 'Dela Gothic One', sans-serif;">
        <div>{{ $project->title }}</div>
      </h1>
      <form action="{{ route('projects.tasks.update', ['projectId' => $project->id, 'taskId' => $task->id]) }}"
        method="POST">
        @csrf
        <div class="">
          <input class="w-full border rounded-md p-2 bg-sky-100 font-bold" id="name" name="name" type="text"
            value="{{ $task->name }}" placeholder="君の目標を...">
        </div>
        <div class="text-sm mt-1 ms-3">※空欄にすると目標を消せます</div>
        <div class="text-center mt-10">
          <button class="bg-orange-600 text-white w-28 py-2 px-6 rounded-md font-bold" type="submit">
            更新する
          </button>
        </div>
      </form>
    </main>
  </div>
</body>

</html>
