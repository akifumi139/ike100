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
    <div class="flex justify-between items-center">
      <a class="text-lg text-teal-700 py-1 px-1 rounded-md font-bold" href="{{ route('projects.index') }}">
        <i class="fa-solid fa-arrow-rotate-left mx-2"></i>リストに戻る
      </a>
      <a href="{{ route('top') }}">
        <img class="w-28 flex-1 pe-3" src="{{ asset('images/ike-log.png') }}">
      </a>
    </div>
    <div class="top-0 max-w-[360px] bg-white shadow-lg rounded-lg py-2">
      <div class="flex justify-start mr-auto">
        <div>
          @if (isset($projectBack))
            <a class="flex-1 flex mr-auto" href="{{ route('projects.show', ['no' => $projectBack->no]) }}">
              <i class="fa-solid fa-circle-left text-xl ms-2"></i>
              <span class="ms-1">{{ $projectBack->title }}</span>
            </a>
          @else
            <i class="fa-regular fa-circle-xmark text-xl ms-2 me-1"></i>
          @endif
        </div>
      </div>
      <div class="mt-1 flex justify-end ml-auto">
        <div>
          @if (isset($projectNext))
            <a class="flex-1 flex ml-auto" href="{{ route('projects.show', ['no' => $projectNext->no]) }}">
              <span class="me-1">{{ $projectNext->title }}</span>
              <i class="fa-solid fa-circle-right text-xl ms-1 me-2"></i>
            </a>
          @else
            <i class="fa-regular fa-circle-xmark text-xl me-2"></i>
          @endif
        </div>
      </div>
    </div>
    @auth
      <div class="py-2 flex justify-end my-3 me-4">
        <a class="text-lg border-2 border-teal-700 text-teal-700 py-1 px-2 rounded-md font-bold"
          href="{{ route('projects.edit', ['no' => $project->no]) }}">
          <i class="fa-solid fa-pen-to-square"></i>
          編集する
        </a>
      </div>
    @endauth
    @if ($project->images->isEmpty())
      <img class="max-h-full  mx-auto" src="{{ asset('/images/no-image.png') }}" alt="画像がありません">
    @endif
    <div class="flex overflow-x-auto p-4 gap-2">
      @foreach ($project->images as $image)
        <img class="mx-auto object-contain" src="{{ asset($image->name) }}"
          style="width: 90%; height: auto; max-width: none;">
      @endforeach
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
          <a class="bg-blue-500 text-white rounded-xl py-1 px-5 shadow-lg" type="submit"
            href="{{ route('projects.tasks.create', ['projectId' => $project->id]) }}">
            <div class="text-base">追加する</div>
          </a>
        @endauth
      </div>
      <div class="flex flex-col gap-1">
        @foreach ($project->tasks as $task)
          <div class="flex text-lg rounded-sm hover:bg-blue-100 px-2 p-1">
            @auth
              <form class="inline-block" action="{{ route('projects.tasks.check', ['id' => $task->id]) }}"
                method="POST">
                @csrf
                <button class="flex items-center" type="submit">
                  @if ($task->completed)
                    <i class="fa-regular fa-circle-check text-[28px] me-2"></i>
                  @else
                    <i class="fa-regular fa-circle text-[28px] me-2"></i>
                  @endif
                </button>
              </form>
              <a class="w-full"
                href="{{ route('projects.tasks.edit', ['projectId' => $project->id, 'taskId' => $task->id]) }}">{{ $task->name }}</a>
            @else
              <div class="inline-block">
                @if ($task->completed)
                  <i class="fa-regular fa-circle-check text-[28px] me-2"></i>
                @else
                  <i class="fa-regular fa-circle text-[28px] me-2"></i>
                @endif
              </div>
              <span class="w-full">{{ $task->name }}</span>
            @endauth
          </div>
        @endforeach
      </div>
    </div>
    <div class="mb-8">
      <div class="flex justify-between me-6 mb-4">
        <h1 class="text-xl font-semibold">達成難易度： {{ $project->level ?? '---' }}</h1>
      </div>
      <div class="ms-1 my-5 font-medium font-serif" style="font-family: 'Zen Maru Gothic', serif;">
        {!! nl2br($project->hurdle) !!}
      </div>
    </div>

    @if (isset($project->review))
      <div>
        <div class="flex justify-between me-6 mb-4">
          <h1 class="text-xl font-semibold">目的達成</h1>
        </div>
        <div class="ms-1 my-5 font-medium font-serif" style="font-family: 'Zen Maru Gothic', serif;">
          {!! nl2br($project->review) !!}
        </div>
      </div>
    @endif

    @if (strpos($project->link, 'https://www.youtube.com/') === 0)
      <iframe class="w-full mt-16" src="{{ $project->link }}" title="YouTube video player" height="280"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen>
      </iframe>
    @elseif($project->link)
      <img class="my-4 mx-auto max-h-64" src="{{ asset($project->link ?? 'images/no-image.png') }}"
        style="max-width: 100%;">
    @endif
    <div class="h-6"></div>
  </main>
  @auth
    <form class="pt-24 pb-10" action="{{ route('projects.destroy', ['id' => $project->id]) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="text-center mt-10">
        <button class="bg-red-400 text-white w-56 py-2 px-8 rounded-md font-bold" id="deleteButton" type="submit">
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
