<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IKE100</title>
  <link type="image/png" href="{{ asset('/favicon.png') }}" rel="icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Noto+Serif+JP:wght@200&display=swap"
    rel="stylesheet">
  @vite(['resources/css/app.css'])

  <!-- PWA  -->
  <meta name="theme-color" content="#ffffff" />
  <link href="{{ asset('logo.PNG') }}" rel="apple-touch-icon">
  <link href="{{ asset('/manifest.json') }}" rel="manifest">
  <link type="image/png" href="{{ asset('/favicon.png') }}" rel="icon">
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
  <div style="max-width: 100%;aspect-ratio: 7/8; position: relative;text-align: center;">
    <img id="top-image" style="width: 100%;position: absolute;">
    <img id="icon-image" src="{{ asset('images/ike-log.png') }}"
      style="width: 42%;position: absolute;top: 32px;left: 50%;transform: translateX(-50%);">
    <menu class="flex gap-16 text-center" style="position: absolute;top:32%;left: 50%;transform: translateX(-50%);">
      <a href="{{ route('blog.index') }}">
        <i class="fa-solid fa-book text-3xl"></i>
      </a>
      <a href="https://youtube.com/@IKE-zy8pb?si=j2igaAkI6yHo3hEf">
        <i class="fa-brands fa-youtube text-3xl"></i>
      </a>
      <a href="https://www.instagram.com/ikelog_travel/">
        <i class="fa-brands fa-instagram text-3xl"></i>
      </a>
    </menu>
  </div>
  <main class="mx-4 mt-2 pb-10">
    <h1 class="text-xl md:text-2xl font-light transform scaleY-120 my-0 mb-4 font-serif"
      style="font-family: 'Dela Gothic One', sans-serif;">
      バカで、アホで、面白い、<br>
      死ぬまでにしたい100のこと！
    </h1>
    <div style="font-family: 'Noto Serif JP', serif;">
      <div class="font-medium font-serif">
        <div>
          明確な目標がなくてもいい。<br>
          誰に否定されることでもいい。<br>
          どれだけくだらないことでもいい。<br>
        </div>
        <div class="mt-2">
          自分が少しでもやりたいと思ったことを100個集めれば、
          きっとそれは、1つに結果になり、1つの肯定になり、1つの価値になると思う。
        </div>
      </div>

      <div class="text-lg mt-4 pr-6 text-right font-serif">
        by ike
      </div>
    </div>
    <div class="mt-6 flex flex-col gap-5">
      <div class="flex justify-center items-center">
        <a class="w-72 ps-4 bg-sky-200 shadow-md shadow-sky-400  hover:shadow-none hover:bg-sky-400 text-gray-800 font-bold tracking-widest py-2 px-5 rounded"
          href="{{ route('projects.index') }}">
          <i class="fa-solid fa-list-check text-lg me-2"></i> やりたいリストを見る。
        </a>
      </div>
      <div class="flex justify-center items-center">
        <a class="w-72 ps-4 bg-lime-200 shadow-md shadow-lime-400 hover:shadow-none hover:bg-lime-400 text-gray-800 font-bold tracking-widest py-2 px-5 rounded"
          href="{{ route('blog.index') }}">
          <i class="fa-solid  fa-book text-lg me-2"></i> 日常をのぞく。
        </a>
      </div>
      {{-- <div class="flex justify-center items-center">
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
            </div> --}}
    </div>
  </main>
</body>
<script>
  const icon = document.getElementById("icon-image");
  const image = document.getElementById("top-image");
  let imageCount = -1;
  window.addEventListener("load", changeTopImage);

  icon.addEventListener("click", changeTopImage);

  function changeTopImage() {
    imageCount = imageCount + 1;
    const nextImageNo = imageCount % 4 + 1;
    const nextSrc = "./images/top/" + nextImageNo + ".jpg?version=2";

    image.setAttribute("src", nextSrc);
  }
</script>

</html>
