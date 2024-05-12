@extends('blog.layouts.app')

@section('content')
  @vite('resources/js/quillEditor.js')
  <div class="px-2 sm:px-8 mx-auto sm:pb-5" id="editer-area">
    <div class="mx-auto sm:max-w-screen-md">
      <a class="py-2 px-6 text-gray-800 border-2 border-gray-300 rounded-full shadow-xl transition duration-500 ease-in-out hover:bg-black hover:text-white hover:border-black"
        href="{{ route('blog.editor.index') }}">
        <span class="tracking-widest font-bold">戻る</span>
      </a>
      <form class="mt-4 sm:mt-6 flex flex-col gap-3" id="editerForm" action="{{ route('blog.editor.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <label class=" text-gray-700 font-semibold mb-4">タイトル
          <input
            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            name="title" type="text" placeholder="記事のタイトル">
        </label>
        <div class="mb-4">
          <span class="text-gray-700 font-semibold mb-2 block">公開状態</span>
          <div class="flex items-center">
            <label class="mr-4">
              <input class="" id="status" name="status" type="radio" value="公開" checked>
              公開
            </label>
            <label>
              <input id="status" name="status" type="radio" value="非公開">
              非公開
            </label>
          </div>
        </div>
        <label class=" text-gray-700 font-semibold mb-4">プロジェクトタグ
          <div class="relative">
            <select
              class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-md leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="project_id" name="project_id">
              <option class="bg-gray-300" value="">つけない</option>
              @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->title }}</option>
              @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
              </svg>
            </div>
          </div>
        </label>

        <label class="text-gray-700 font-semibold">ヘッダー画像
          <input class="block" id="imageLinkInput" name="header_image" type="file" accept="image/*">
          <div class="flex justify-center">
            <img class="max-h-64" id="imageLinkPreview" src="{{ asset('images/no-image.png') }}" alt="画像がありません">
          </div>
        </label>

        <label class="text-gray-700 font-semibold my-4">内容
          <textarea id="content" name="content" hidden></textarea>
          <div
            class="text-xl w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            id="quill_editor">
          </div>
        </label>
        <div class="flex justify-center">
          <button
            class="md:w-48 text-xl border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white font-semibold py-2 px-4 rounded-2xl -mb-6 transition duration-300"
            type="submit">
            投稿する
          </button>
        </div>
      </form>
    </div>
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
  @endsection
