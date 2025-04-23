@extends('layout')

@section('content')
    <div class="text-center">
        <span class="lg:text-3xl text-xl font-bold">Every tool you need to make your work easier</span>
    </div>
    <div class="mt-12 lg:grid lg:grid-cols-4 gap-3">
        <a href="{{route('qr-generator')}}">
            <div class="p-5 bg-white">
                <div>
                    Logo
                </div>
                <div class="my-2">
                    <span class="text-lg font-bold">QR Generator</span>
                </div>
                <div>
                    <span class="text-sm text-gray-600">Fitur untuk membuat QR code secara otomatis dari data yang Anda masukkan</span>
                </div>
            </div>
        </a>
    </div>
@endsection