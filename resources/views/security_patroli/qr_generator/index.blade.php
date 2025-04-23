@extends('layout')

@section('content')
    <div class="p-5 bg-white w-full lg:w-1/2 mx-auto mb-5">
        <div class="flex gap-6 justify-center items-center text-gray-700 text-lg font-medium">
            <a href="{{route('qr-generator')}}" class="hover:underline hover:text-blue-600 transition">QR General</a>
            <span class="text-gray-400">|</span>
            <a href="{{route('security-patroli-qr-generator')}}" class="underline text-green-600">QR For Security Patroli</a>
        </div>
    </div>
    <div class="p-5 bg-white w-full lg:w-1/2 mx-auto">
        <form action="{{route('security-patroli-generate-qr')}}" method="get" target="_blank">
            @csrf
            <div class="mb-3 w-full">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="pos">
                    <option value="">Pilih POS</option>
                    @foreach ($checkpoints as $item)
                    <option value="{{$item['value']}}">{{$item['description']}}</option>
                    @endforeach
                </select>
                @error('pos')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full cursor-pointer">Generate</button>
            </div>
        </form>
    </div>
@endsection