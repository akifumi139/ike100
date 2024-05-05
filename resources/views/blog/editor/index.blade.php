@extends('blog.layouts.app')

@section('content')
  <div class="px-2 md:px-8 mx-auto md:pb-5">
    <div class="mx-auto md:max-w-screen-md">
      <div class="flex justify-between">
        <a class="py-2 px-6 text-gray-800 border-2 border-gray-300 rounded-full shadow-xl transition duration-500 ease-in-out hover:bg-black hover:text-white hover:border-black"
          href="{{ route('blog.index') }}">
          <span class="tracking-widest font-bold">一覧に戻る</span>
        </a>
        <a class="py-2 px-6 bg-green-500 border-2 text-white border-green-500 rounded-full shadow-xl hover:bg-white hover:text-green-500 hover:border-green-500"
          href="{{ route('blog.editor.create') }}">
          <span class="tracking-widest">新規作成</span>
        </a>
      </div>
      <div class="mt-8">
        {{ $articles->links('blog.layouts.pagination') }}
      </div>
      <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
          <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
              <thead>
                <tr>
                  <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Title</th>
                  <th
                    class="md:px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider md:w-32">
                    Status
                  </th>
                  <th class="md:px-6 py-3 border-b border-gray-200 bg-gray-50 md:w-28"></th>
                </tr>
              </thead>

              <tbody>
                @foreach ($articles as $article)
                  <tr>
                    <td class="ps-2 md:px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                      <div class="text-sm leading-5 text-gray-900">{{ $article->title }}</div>
                    </td>
                    <td class="md:px-6 py-2 border-b border-gray-200 ">
                      <span
                        class="p-1 md:px-4 py-1 font-semibold rounded-full bg-green-100 text-green-800 flex justify-center">
                        {{ $article->status }}
                      </span>
                    </td>
                    <td class="pe-2 py-2 border-b flex justify-end">
                      <a class="text-indigo-600  hover:text-white hover:bg-indigo-600 p-2 rounded-full px-4 flex justify-center items-center"
                        href="{{ route('blog.editor.edit', ['id' => $article->id]) }}">
                        <i class="fa-solid fa-pen-to-square md:text-2xl me-1"></i>Edit
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {{ $articles->links('blog.layouts.pagination') }}
    </div>
  @endsection
