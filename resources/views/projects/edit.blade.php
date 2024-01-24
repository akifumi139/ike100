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
        <div class="top-0 max-w-[360px] bg-white shadow-lg rounded-lg">
            <div class="flex items-center mx-auto">
                <div>
                    <img class="w-28 flex-1" src="{{ asset('images/IKELog.png') }}">
                </div>
                <div class="col-1 flex justify-end font-bold text-lg">
                    やりたいことNo.{{ $project->no }}
                </div>
            </div>
        </div>
        <div class="py-2 flex justify-between me-2">
            <a href="{{ route('projects.show', ['no' => $project->no]) }}"
                class="text-lg  text-teal-700 w-24 py-1 px-1 rounded-md font-bold flex items-center">
                <i class="fa-solid fa-arrow-rotate-left ms-4 me-2"></i>戻る
            </a>

        </div>

        <form action="{{ route('projects.update', ['no' => $project->no]) }}" method="POST"
            enctype="multipart/form-data" class="w-full">
            @csrf
            <div class="my-3" style="max-width: 300px; position: relative; text-align: center; align-items: center;">
                <img id="imagePreview" src="{{ asset($project->image ?? 'images/no-image.png') }}" alt="画像がありません">
                <input type="file" class="mb-6" id="imageInput" name="image" accept="image/*">
            </div>

            <label for="title" class="ms-1 text-lg font-bold">成し遂げたいこと</label>
            <input id="title" name="title"
                class="mt-1 text-xl font-light transform scaleY-120 my-0 mb-6 font-serif bg-gray-200 focus:bg-sky-100 p-2 w-full"
                value="{{ $project->title }}" style="font-family: 'Dela Gothic One', sans-serif;">

            <label for="body" class="ms-1 text-lg font-bold">詳しく</label>
            <textarea id="body" name="body"
                class="mt-1 mb-5 font-medium font-serif p-1 w-full h-36 min-h-48 bg-gray-200 focus:bg-sky-100"
                style="font-family: 'Zen Maru Gothic', serif;">{{ $project->body }}</textarea>

            <label for="body" class="ms-1 text-lg font-bold">難易度</label>
            <div class="ms-5 mb-5 text-xl flex gap-6">
                <label>
                    <input type="radio" name="level" value="大"
                        @if ($project->level == '大') checked @endif> 大
                </label>

                <label>
                    <input type="radio" name="level" value="中"
                        @if ($project->level == '中') checked @endif>
                    中
                </label>

                <label>
                    <input type="radio" name="level" value="小"
                        @if ($project->level == '小') checked @endif>
                    小
                </label>
                <label>
                    <input type="radio" name="level" value=""
                        @if ($project->level == '') checked @endif>
                    なし
                </label>
            </div>
            <label for="body" class="ms-1 text-lg font-bold">難易度について</label>
            <textarea name="hurdle" class="mt-1 mb-5 font-medium font-serif p-1 w-full h-36 min-h-48 bg-gray-200 focus:bg-sky-100"
                style="font-family: 'Zen Maru Gothic', serif;">{{ $project->hurdle }}</textarea>

            <label for="body" class="ms-1 text-lg font-bold">感想</label>
            <textarea name="review" class="mt-1 mb-5 font-medium font-serif p-1 w-full h-36 min-h-48 bg-gray-200 focus:bg-sky-100"
                style="font-family: 'Zen Maru Gothic', serif;">{{ $project->review }}</textarea>

            <label for="link" class="ms-1 text-lg font-bold">YouTubeのリンク（共有リンク）</label>
            <input id="link" name="link"
                class="mt-1 transform scaleY-120 my-0 mb-6 font-serif bg-gray-200 focus:bg-sky-100 p-2 w-full"
                value="{{ $project->link }}">
            @auth
                <div class="flex justify-center py-5">
                    <button type="submit" class="bg-teal-700 text-white w-36 py-2 px-4 rounded-md font-bold">
                        <i class="fa-regular fa-floppy-disk me-1"></i>
                        保存する
                    </button>
                </div>
            </form>
        @endauth
    </main>

</body>
<script>
    const initFacePath = @js($project->image);
    const imageForm = document.getElementById("imageForm");
    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");

    imageInput.addEventListener("change", function() {
        const file = imageInput.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            imagePreview.src = initFacePath;
        }
    });
</script>

</html>
