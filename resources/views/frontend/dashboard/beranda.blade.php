@extends('frontend.layout_dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <script src="{{ asset('js/app.js') }}"></script>
    <div class="w-[1366px] h-[333px] pl-[165px] pr-[164px] pt-[19px] justify-center items-center inline-flex">
        <div class="grow shrink basis-0 self-stretch rounded-[10px] justify-center items-center inline-flex">
            <div class="grow shrink basis-0 h-[400px] justify-end items-center inline-flex">

                <div >
                    <img  src="{{ asset ('img/beranda.png') }}" />
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
