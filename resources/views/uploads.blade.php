
@extends('layout.master')
@section('content')
    <div class="relative min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
        style="background-image: url(https://images.unsplash.com/photo-1621243804936-775306a8f2e3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="sm:max-w-lg w-full p-10 bg-white rounded-xl z-10">
            <div class="text-center">
                <h2 class="mt-5 text-3xl font-bold text-gray-900">
                    Загрузка файла!
                </h2>
                <p class="mt-2 text-sm text-gray-400">5 изображений, которые вы можете загрузить вместе.</p>
            </div>
            <form class="mt-8 space-y-3" action="/uploadImage" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 space-y-2">
                    <label class="text-sm font-bold text-gray-500 tracking-wide">Прикрепить документ</label>
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                            <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                                <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                    <img class="has-mask h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                                </div>
                                <p class="pointer-none text-gray-500 "><span class="text-sm">Перетаскивайте</span> файлы сюда <br /> или <a href="" id="" class="text-blue-600 hover:underline">выберите файл</a> с вашего компьютера</p>
                            </div>
                            <input type="file" class="hidden" name="images[]" multiple />
                        </label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                            font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                            Загружать
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
