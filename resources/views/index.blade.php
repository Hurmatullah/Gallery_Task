@extends('layout.master')
@section('content')
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <div class="border-b mb-5 flex justify-between text-sm">
        <div class="text-indigo-600 flex items-center pb-2 pr-2 capitalize">
            <span>
                <a href="{{ url('/') }}" class="font-semibold inline-block">Главная</a>
                <a href="{{ url('/uploads') }}" class="pl-2 font-semibold inline-block">Загрузка</a>
            </span>
        </div>
        <span>
            <a href="{{ url('/zipImage') }}" class="pr-2">Скачать файл</a>
            <a href="#" onclick="toggleDropdown()">Сортировка</a>
            <div id="dropdown" class="hidden absolute bg-white rounded-lg shadow-md mt-2">
                <a href="{{ url('/sort/name') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Название файла</a>
                <a href="{{ url('/sort/date') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Дата загрузки</a>
                <a href="{{ url('/sort/time') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Время загрузки</a>
            </div>
        </span>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
        @foreach ($data as $data)
        <div class="rounded overflow-hidden shadow-lg flex flex-col">
            <span onclick="showPreview('{{ $data->id }}')"></span>
            <div class="relative">
                <span onclick="showPreview('{{ $data->id }}')">
                    <img class="w-full"
                        src="{{ url('/images/low_quality/'. $data->name) }}"
                        alt="Sunset in the mountains" id="img{{ $data->id }}">
                    <div
                        class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                    </div>
                </span>
            </div>
            <div class="px-6 py-4 mb-auto">
                <h3 class="font-medium text-lg inline-block mb-2">{{ Str::before($data->name, '_') }} - </h3>
                <span onclick="previewOriginal('{{ $data->id }}')" id="oimg{{ $data->id }}" data-src="{{ url('images/'. $data->name) }}">Просмотр оригинальное</span>
            </div>
            <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <svg height="13px" width="13px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                        y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                        xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-1">{{ $data->time_created }}</span>
                </span>
                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <span class="ml-1">{{ $data->date_created }}</span>
                </span>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div id="image-preview">
    <span id="close-btn" onclick="closePreview()">&times;</span>
    <img id="preview-image" src="" alt="Preview">
</div>
<div id="originalImage-preview" class="preview-container" style="display: none;">
    <span id="close-btn" onclick="closeOriginalImagePreview()">&times;</span>
    <img id="preview-originalImage" src="" alt="Preview">
</div>
@endsection
