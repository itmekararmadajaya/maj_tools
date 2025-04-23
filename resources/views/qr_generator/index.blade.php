@extends('layout')

@section('content')
    <div class="p-5 bg-white w-full lg:w-1/2 mx-auto mb-5">
        <div class="flex gap-6 justify-center items-center text-gray-700 text-lg font-medium">
            <a href="{{route('qr-generator')}}" class="underline text-blue-600">QR General</a>
            <span class="text-gray-400">|</span>
            <a href="{{route('security-patroli-qr-generator')}}" class="hover:underline hover:text-green-600 transition">QR For Security Patroli</a>
        </div>
    </div>
    <div class="p-5 bg-white w-full lg:w-1/2 mx-auto">
        <form action="{{route('generate-qr')}}" method="post">
            @csrf
            <div class="mb-2 w-full">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Teks atau URL untuk QR Code</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="text">
                @error('text')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full cursor-pointer">Generate</button>
            </div>
        </form>
    </div>
@endsection