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
            <div class="text-center m-5 p-5"><i class="fas fa-check fa-10x"></i></div>
            <div class=" p-4 text-center h2">ご予約が完了しました</div>
            <div class="p-5 text-center">
                <p>この度はご予約いただき、誠にありがとうございます。</p>
                <p>お客様のメールアドレスへ予約完了通知メールを送信しましたのでご確認ください。<br>（本アプリでは実際に送信はしません）</p>
                <br>
                <p>予約のキャンセル・変更はお店までご連絡ください。</p>
            </div>
            <div class="text-center">
                <a class="btn btn-lg btn-secondary p-2 mt-5" href="<?php echo e(route('r.index')); ?>">トップページにもどる</a>
            </div>
        </div>
    </div>
</body><?php /**PATH /Applications/MAMP/htdocs/restaurant/resources/views/reserve/reserved.blade.php ENDPATH**/ ?>