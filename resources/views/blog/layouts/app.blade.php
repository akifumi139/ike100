<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>IKEBlog</title>
  <link type="image/png" href="{{ asset('/favicon.png') }}" rel="icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Noto+Serif+JP:wght@200&display=swap"
    rel="stylesheet">
</head>

<div class="bg-blue-200"></div>

<body class='w-full max-w-page mx-auto'>
  <nav class="mb-2">
    <div @class([
        'flex justify-center items-center md:gap-2 ',
        'bg-blue-300' => Auth::id(),
    ])>
      <a class="p-2 text-lg font-medium text-gray-700 hover:text-blue-500" href="{{ route('projects.index') }}">
        <span>IKE100</span>
      </a>
      <a href="{{ route('top') }}">
        <img class="w-24 md:w-32" src="{{ asset('images/ike-log.png') }}">
      </a>
      <a class="p-2 text-lg font-medium text-gray-700 hover:text-blue-500" href="">
        <span>プロフィール</span>
      </a>
    </div>
    @auth
      <div class="flex justify-end md:-mt-12">
        <form method="POST" action="{{ route('auth.logout') }}">
          @csrf
          <button class=" bg-gray-600 hover:bg-gray-800 text-white font-bold py-1 md:py-3 px-5 rounded-sm shadow-md"
            href="{{ route('blog.editor.index') }}">
            編集モードを閉じる
          </button>
        </form>
      </div>
    @endauth
  </nav>
  @yield('content')
</body>

</html>
