<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

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
                                <h4>来店日　　　　：　<?php echo e($date); ?></h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>予約時間　　　：　<?php echo e($time); ?></h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>お名前　　　　：　<?php echo e($name); ?></h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>電話番号　　　：　<?php echo e($tel); ?></h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>メールアドレス：　<?php echo e($mail); ?></h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>人数　　　　　：　<?php echo e($ppl); ?>名様</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>コース　　　　：　<?php echo e($course_name); ?></h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>金額（税込）　：　<?php echo e(number_format($amt)); ?>円</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <h4>備考　　　　　：　<?php echo e($comment); ?></h4>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="text-center mt-5">
                                    <a href="<?php echo e(route('r.store')); ?>" role="button" class="btn btn-block btn-lg btn-primary text-light d-flex align-items-center
                                        justify-content-center p-3">ご予約を確定する</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="text-center mt-5">
                                    <a class="btn btn-block btn-lg btn-danger text-light d-flex align-items-center justify-content-center p-3"
                                        href="<?php echo e(route('r.index')); ?>" type="submit">キャンセル</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body><?php /**PATH /Applications/MAMP/htdocs/restaurant/resources/views/reserve/confirm.blade.php ENDPATH**/ ?>