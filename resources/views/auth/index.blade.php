<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IKE100</title>
  @vite(['resources/css/app.css'])
</head>

<body class="bg-white">
  <div class="flex items-center justify-center">
    <div class="p-6 rounded-md w-96">
      <h1 class="text-3xl text-center text-sky-500 font-bold mb-4">
        IKE100
      </h1>
      <form class="flex flex-col gap-3" action="{{ route('auth.login') }}" method="POST">
        @csrf
        <div>
          <label class="block text-gray-700 font-bold mb-1" for="name">
            ID
          </label>
          <input
            class="border rounded-md py-2 px-4 w-full focus:outline-none text-black bg-sky-100 focus:border-sky-400"
            id="name" name="name" type="text" placeholder="ログインID" required>
        </div>
        <div>
          <label class="block text-gray-700 font-bold mb-1" for="password">
            パスワード
          </label>
          <input
            class="border rounded-md py-2 px-4 w-full focus:outline-none text-black bg-sky-100 focus:border-sky-400"
            id="password" name="password" type="password" placeholder="パスワード" required>
        </div>
        @if (session('error'))
          <p class="error-message">{{ session('error') }}</p>
        @endif
        @error('error')
          <p class="error-message">{{ $message }}</p>
        @enderror
        <div class="text-center mt-4">
          <button class="bg-sky-500 py-2 px-5 rounded font-bold text-base hover:bg-sky-800" type="submit">ログイン</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
