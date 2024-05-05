<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IKE100</title>
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Zen+Maru+Gothic:wght@500&display=swap"
    rel="stylesheet">

  @vite(['resources/css/app.css'])
</head>

<body class="mx-auto bg-white text-black max-w-[360px]">
  <main>
    <div class="top-0 max-w-[360px] bg-white shadow-lg rounded-lg">
      <div class="flex items-center mx-auto">
        <div>
          <img class="w-28 flex-1" src="{{ asset('images/ike-log.png') }}">
        </div>
        <div class="col-1 flex justify-end font-bold text-lg">
          やりたいことNo.{{ $project->no }}
        </div>
      </div>
      <div class="col-1 text-center font-bold text-lg">
        プロジェクト写真の追加・削除
      </div>
    </div>

    <div class="pt-2 flex justify-between me-2">
      <a class="text-lg  text-teal-700 py-1 px-1 rounded-md font-bold flex items-center"
        href="{{ route('projects.edit', ['no' => $project->no]) }}">
        <i class="fa-solid fa-arrow-rotate-left ms-4 me-2"></i>編集ページに戻る
      </a>
    </div>
    <div class="flex justify-end me-5 mb-4 font-bold text-2xl">枚数：{{ $project->images->count() }}/6</div>

    <div>
      <div class="grid grid-flow-row grid-cols-2 grid-rows-auto">
        @foreach ($project->images as $image)
          <div class="min-h-[140px] py-2" style="position: relative;">
            <form action="{{ route('projects.images.destroy', ['no' => $project->no, 'imageNo' => $image->id]) }}"
              method="POST">
              @csrf
              @method('DELETE')
              <button class="bg-red-500 text-white font-normal rounded-full text-sm m-2"
                style="position: absolute; top: 0; right: 12px; padding: 4px;">
                <i class="fa-solid fa-trash">消す</i>
              </button>
            </form>
            <img class="m-auto" src="{{ asset($image->name) }}" alt="Image 1" width="140">
          </div>
        @endforeach

        @if ($project->images->count() < 6)
          <a class="w-28 h-28 mt-10 m-auto text-center bg-slate-400 rounded-full text-gray-100"
            href="{{ route('projects.images.create', ['no' => $project->no]) }}">
            <i class="fa-solid fa-plus text-5xl pt-5"></i>
            <div class="text-base">画像追加</div>
          </a>
        @endif
      </div>
    </div>
  </main>
</body>

</html>
