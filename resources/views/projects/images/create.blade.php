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

        <form action="{{ route('projects.images.add', ['no' => $project->no]) }}" method="POST"
            enctype="multipart/form-data" class="w-full">
            @csrf
            <div class="my-3">
                <img id="imagePreview" src="">
                <input type="file" class="mb-6" id="imageInput" name="image" accept="image/*">
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
    const initFacePath = @js($project->image);
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
