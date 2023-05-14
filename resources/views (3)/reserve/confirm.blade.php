<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>
    <div class="row">
        <div class="container col-8 p-5 mx-auto">
            <h4>RESTAURANT</h4>
            <div class="card">
                <div class="card-header p-4 text-center bg-secondary text-light h3">予約確認</div>
                <div class="cart_container">
                    <div class="card-body create">
                        <div class="row mt-5">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>来店日　　　　：　{{ $date }}</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>予約時間　　　：　{{ $time }}</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>お名前　　　　：　{{ $name }}</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>電話番号　　　：　{{ $tel }}</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>メールアドレス：　{{ $mail }}</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>人数　　　　　：　{{ $ppl }}名様</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>コース　　　　：　{{ $course_name }}</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>金額（税込）　：　{{ number_format($amt) }}円</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>備考　　　　　：　{{ $comment }}</h4>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="text-center mt-5">
                                    <a href="{{ route('r.store') }}" role="button" class="btn btn-block btn-lg btn-primary text-light d-flex align-items-center
                                        justify-content-center p-3">ご予約を確定する</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="text-center mt-5">
                                    <a class="btn btn-block btn-lg btn-danger text-light d-flex align-items-center justify-content-center p-3"
                                        href="{{ route('r.index') }}" type="submit">キャンセル</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>