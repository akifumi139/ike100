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

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</head>

<body class="mx-auto bg-white text-black" style="max-width:400px;">
    <div style="max-width: 100%;aspect-ratio: 8/11; position: relative;text-align: center;">
        <img style="width: 100%;position: absolute;" src="{{ asset('images/top-header.jpg') }}">
        <img style="width: 52%;position: absolute;top: 50px;left: 50%;transform: translateX(-50%);"
            src="{{ asset('images/IKELog.png') }}">
    </div>

    <main class="mx-4 mt-2 pb-10">
        <h1 class="text-2xl font-light transform scaleY-120 my-0 mb-6 font-serif"
            style="font-family: 'Dela Gothic One', sans-serif;">
            バカで、アホで、面白い、<br>
            死ぬまでにしたい100のこと！
        </h1>

        <div style="font-family: 'Noto Serif JP', serif;">
            <div class="my-2 font-medium font-serif">
                明確な目標がなくてもいい。<br>
                誰に否定されることでもいい。<br>
                どれだけくだらないことでもいい。<br>
                <br>
                自分が少しでもやりたいと思ったことを100個集めれば、
                きっとそれは、1つに結果になり、1つの肯定になり、1つの価値になると思う。
            </div>

            <div class="text-lg mt-6 pr-8 text-right font-serif">
                by ike
            </div>
        </div>
        <div class="mt-8 flex flex-col gap-5">
            <div class="flex justify-center items-center">
                <a href="{{ route('projects.index') }}"
                    class="w-64 text-center bg-sky-200 shadow-md shadow-sky-400 hover:bg-sky-400 text-gray-800 font-bold tracking-widest py-2 px-5 rounded">
                    <i class="fa-solid fa-list-check text-lg me-2"></i> やりたいリストを見る
                </a>
            </div>

            <div class="flex justify-center items-center">
                <a href="https://youtube.com/@IKE-zy8pb?si=j2igaAkI6yHo3hEf" target="_blank" rel="noopener noreferrer"
                    class="w-64 text-center bg-red-200 shadow-md shadow-red-400 hover:bg-red-400 text-gray-800 font-bold py-2 px-3 rounded">
                    <i class="fa-brands fa-youtube text-lg me-2"></i>IKEログのYouTubeを見る
                </a>
            </div>

            <div class="flex justify-center items-center">
                <a href="https://www.instagram.com/ikelog_travel/" target="_blank" rel="noopener noreferrer"
                    class="w-64 text-center bg-yellow-300 shadow-md shadow-yellow-500 hover:bg-yellow-500 text-gray-800 font-bold py-2 px-3 rounded">
                    <i class="fa-brands fa-instagram me-2"></i>IKEログのInstagramを見る
                </a>
            </div>
        </div>
    </main>
</body>

</html>
