@extends('layout')

@section('content')
    <div class="text-center">
        <span class="lg:text-3xl text-xl font-bold">Every tool you need to make your work easier</span>
    </div>
    <div class="mt-12 lg:grid lg:grid-cols-4 gap-3">
        <a href="{{route('qr-generator')}}">
            <div class="p-5 bg-white shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-100 text-indigo-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                        <path
                            d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                        <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                        <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                        <path
                            d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
                        <path d="M12 9h2V8h-2z" />
                    </svg>
                </div>
                <div class="text-left">
                    <div class="text-lg font-semibold text-gray-800">QR Generator</div>
                    <div class="text-sm text-gray-500 mt-1">Fitur untuk membuat QR code secara otomatis dari data yang Anda masukkan</div>
                </div>
            </div>            
        </a>
    </div>
@endsection