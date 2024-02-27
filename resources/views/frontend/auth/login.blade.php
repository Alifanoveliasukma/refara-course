<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .login-container img {
            margin-left: 20px; 
        }
        .login-container {
            margin-left: 20px;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="justify-center h-screen flex items-center">
    <script src="{{ asset('js/app.js') }}"></script>
        <div class="w-[1124.73px] h-[611.22px] bg-white rounded-[43.43px] shadow-lg justify-center items-center gap-2.5 inline-flex">
            <div class="h-[100%]">
                <img src="{{ asset ('img/gambar-register.png') }}">
            </div>
            <div class="w-[600px] h-[611px] relative bg-orange-500 flex-col justify-start items-start flex rounded-r-[43.43px] justify-center flex items-center wi">
                <div class="centered-text">
                    <div class="text-white text-[40px] font-bold font-sans ">Hello!</div>
                    <div class="text-white text-lg font-normal font-['Inter']">Welcome Learners</div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <form action="/proses-login" method="POST">
                    @csrf
                    <div >
                        <input class="w-[352.83px] h-[55.37px] pl-[37.09px] pr-10 bg-white rounded-[30px] justify-center items-start gap-[144.78px] inline-flex mt-4" 
                        type="text" 
                        name="email" 
                        id="email" 
                        placeholder="Masukkan email" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div >
                        <input class="w-[352.83px] h-[55.37px] pl-[37.09px] pr-10 bg-white rounded-[30px] justify-center items-start gap-[144.78px] inline-flex mt-4" 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Masukkan Password" />                        
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="w-[352.83px] h-[55.37px] pt-[14.31px] pb-[15.05px] bg-orange-600 rounded-[30px] justify-center items-center inline-flex mt-5">
                        <button class="text-white text-[21.71px] font-bold font-['Inter']" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>
