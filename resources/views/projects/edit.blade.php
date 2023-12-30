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

<body class="mx-auto bg-white text-black w-[360px]">
    <main>
        <div class="top-0 w-[360px] bg-white shadow-lg rounded-lg">
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
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                    <title>back_2_fill</title>
                    <g id="back_2_fill" fill='none' fill-rule='nonzero'>
                        <path
                            d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                        <path fill='#0F766EFF'
                            d='M7.16 10.972A7 7 0 0 1 19.5 15.5a1.5 1.5 0 1 0 3 0c0-5.523-4.477-10-10-10a9.973 9.973 0 0 0-7.418 3.295L4.735 6.83a1.5 1.5 0 1 0-2.954.52l1.042 5.91c.069.391.29.74.617.968.403.282.934.345 1.385.202l5.644-.996a1.5 1.5 0 1 0-.52-2.954l-2.788.491Z' />
                    </g>
                </svg>
                <span class="ms-2"> 戻る</span>
            </a>

        </div>

        <form action="{{ route('projects.update', ['no' => $project->no]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-5 flex flex-col justify-center"
                style="max-width: 100%;aspect-ratio: 8/11; position: relative;text-align: center;">
                <img id="imagePreview" src="{{ asset($project->image ?? 'images/no-image.png') }}" alt="画像がありません">
                <input type="file" class="mt-2" id="imageInput" name="image" accept="image/*">
            </div>

            <input name="title"
                class="text-xl font-light transform scaleY-120 my-0 mb-6 font-serif bg-gray-200 focus:bg-sky-100 p-2 w-full"
                value="{{ $project->title }}" style="font-family: 'Dela Gothic One', sans-serif;">

            <textarea name="body" class="my-5 font-medium font-serif p-1 w-full h-36 min-h-48 bg-gray-200 focus:bg-sky-100"
                style="font-family: 'Zen Maru Gothic', serif;">{!! nl2br($project->body) !!}</textarea>

            @auth
                <div class="flex justify-center py-5">
                    <button type="submit"
                        class="bg-teal-700 text-white w-36 py-2 px-4 rounded-md font-bold flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" class="text-teal-700" height="24"
                            viewBox="0 0 24 24">
                            <path
                                d="M5 2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h3v-2H5V4h12v4h2V4a2 2 0 0 0-2-2H5Zm3 5a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H8Zm7.949 3.811a3 3 0 0 1 4.242 4.243l-5.656 5.657a1 1 0 0 1-.707.293h-2.829a1 1 0 0 1-1-1v-2.829a1 1 0 0 1 .293-.707l5.657-5.657Zm2.828 1.414a1 1 0 0 0-1.414 0l1.414 1.415a1 1 0 0 0 0-1.415Zm-1.414 2.829-1.414-1.414-3.95 3.95v1.414h1.414l3.95-3.95Z" />
                        </svg>
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
