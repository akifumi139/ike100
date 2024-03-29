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
            <div class="flex justify-end me-3 mb-6">
                <a href="{{ route('projects.images.show', ['no' => $project->no]) }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 rounded-full">
                    画像の入れ替え
                </a>
            </div>

            @if ($project->images->isEmpty())
                <img class="w-64 h-auto mr-4" src="{{ asset('/images/no-image.png') }}" alt="画像がありません">
            @endif
            <div class="flex overflow-x-auto p-4 gap-2">
                @foreach ($project->images as $image)
                    <img class="mx-auto object-contain" style="width: 90%; height: auto; max-width: none;"
                        src="{{ asset($image->name) }}">
                @endforeach
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
            <div class="grid place-items-center pt-2 pb-6">
                <div class="grid grid-cols-4 gap-2 rounded-xl bg-gray-200 p-2">
                    <div>
                        <input type="radio" name="level" id="大" value="大" class="peer hidden"
                            checked />
                        <label for="大"
                            class="block cursor-pointer select-none rounded-xl py-2 px-5 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">
                            大
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="level" id="中" value="中" class="peer hidden" />
                        <label for="中"
                            class="block cursor-pointer select-none rounded-xl py-2 px-5 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">
                            中
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="level" id="小" value="小" class="peer hidden" />
                        <label for="小"
                            class="block cursor-pointer select-none rounded-xl py-2 px-5 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">
                            小
                        </label>
                    </div>

                    <div>
                        <input type="radio" name="level" id="なし" value="なし" class="peer hidden" />
                        <label for="なし"
                            class="block cursor-pointer select-none rounded-xl py-2 px-5 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">
                            なし
                        </label>
                    </div>
                </div>
            </div>
            <label for="body" class="ms-1 text-lg font-bold">難易度について</label>
            <textarea name="hurdle" class="mt-1 mb-5 font-medium font-serif p-1 w-full h-36 min-h-48 bg-gray-200 focus:bg-sky-100"
                style="font-family: 'Zen Maru Gothic', serif;">{{ $project->hurdle }}</textarea>

            <label for="body" class="ms-1 text-lg font-bold">感想</label>
            <textarea name="review" class="mt-1 mb-5 font-medium font-serif p-1 w-full h-36 min-h-48 bg-gray-200 focus:bg-sky-100"
                style="font-family: 'Zen Maru Gothic', serif;">{{ $project->review }}</textarea>

            <div class="mt-3">
                <div class="flex justify-end me-3 -mb-6">
                    <button id="toggleBtn" type="button"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 rounded-full">
                        切り替え
                    </button>
                </div>
                <div id="uiContainer">
                    <div id="ui1" class="">
                        <label for="link" class="ms-1 text-lg font-bold">YouTubeのリンク（共有リンク）</label>
                        <input id="link" name="link"
                            class="mt-1 transform scaleY-120 my-0 mb-6 font-serif bg-gray-200 focus:bg-sky-100 p-2 w-full"
                            value="{{ strpos($project->link, 'https://www.youtube.com/') === 0 ? $project->decodeYouTubeLink() : '' }}">
                    </div>
                    <div id="ui2" class="hidden">
                        <label for="link" class="ms-1 text-lg font-bold">エンドカード</label>
                        <img id="imageLinkPreview" class="max-h-64"
                            src="{{ asset($project->link ?? 'images/no-image.png') }}" alt="画像がありません">
                        <input type="file" class="mb-6" id="imageLinkInput" name="link" accept="image/*">

                    </div>
                </div>
            </div>

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
    const toggleBtn = document.getElementById('toggleBtn');
    const ui1 = document.getElementById('ui1');
    const ui2 = document.getElementById('ui2');
    let currentUI = 1;

    const switchLinkArea = () => {
        if (currentUI === 1) {
            ui1.classList.add('hidden');
            ui2.classList.remove('hidden');
            currentUI = 2;
        } else {
            ui1.classList.remove('hidden');
            ui2.classList.add('hidden');
            currentUI = 1;
        }
    }

    const link = @js($project->link);

    if (link && !link.startsWith("https://youtu.be/")) {
        switchLinkArea();
    }

    toggleBtn.addEventListener('click', switchLinkArea);
</script>
<script>
    const initLinkPath = @js(asset($project->image ?? './images/no-image.png'));
    const imageLinkInput = document.getElementById("imageLinkInput");
    const imageLinkPreview = document.getElementById("imageLinkPreview");

    imageLinkInput.addEventListener("change", function() {
        const file = imageLinkInput.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imageLinkPreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            imageLinkPreview.src = initLinkPath;
        }
    });
</script>

</html>
