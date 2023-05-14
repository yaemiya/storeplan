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
  <div class="container m-5 p-2 mx-auto">

    <h3 class="text-center m-4 p-4">RESTAURANT</h3>
    <div
      class="navbar navbar-expand-lg navbar-light bg-secondary text-white mt-5 mb-5 p-3 justify-content-center border">
      <ul class="navbar-nav h5">
        <li class="nav-item">
          <a class="nav-link" href="#">　　　トップ　　　</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#course_menu">　　　コースメニュー　　　</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#r_calendar">　　　ご予約　　　</a>
        <li class="nav-item">
          <a class="nav-link" href="#details">　　　店舗詳細　　　</a>
        </li>
      </ul>
    </div>

    <div class="course mt-5 mb-5 p-3 border" id="course_menu">
      <div class="yaki m-4 p-5 border">
        <h3>焼鳥三昧コース　3000円／人</h3>
        <h4 class="text-right"><a href="{{ route('r.create',['course' => '1']) }}">このコースを予約する</a></h4>
      </div>
      <div class="m-4 p-5 border">
        <h3>串カツフルコース　4000円／人</h3>
        <h4 class="text-right"><a href="{{ route('r.create', ['course' => '2']) }}">このコースを予約する</a></h4>
      </div>
      <div class="m-4 p-5 border">
        <h3>お刺身舟盛コース　5000円／人</h3>
        <h4 class="text-right"><a href="{{ route('r.create', ['course' => '3']) }} ">このコースを予約する</a></h4>
      </div>
    </div>

    <div class="calendar_border border pt-5 pb-5" id="r_calendar">
      <h4 class="text-center p-4 m-4">予約状況</h4>
      <div class="row mb-5">
        <div class="col-1 d-flex align-items-center justify-content-center">
          <a href="?year= {{ $sub_year }} &&month= {{ $sub_month }}" class="h1 text-secondary">
            <i class="fas fa-chevron-circle-left"></i>
          </a>
        </div>
        <div class="this_month col-5">
          <div class="h5 text-center mb-3">
            {{ $date->format('Y年m月') }}
          </div>

          <table class="table text-center calendar">
            <thead>
              @foreach($days_of_week as $day_of_week)
              @if($day_of_week === "土")
              <th class="sat">{{$day_of_week}}</th>
              @elseif($day_of_week === "日")
              <th class="sun">{{$day_of_week}}</th>
              @else
              <th class="day">{{$day_of_week}}</th>
              @endif
              @endforeach
            </thead>
            <tbody class="border=1">
              <tr>
                @for($i=1; $i<=$days_in_month; $i++) {{-- 1日が月曜じゃない場合はcospanでその分あける --}} @if($i==1) @if($date->
                  format('N')
                  != 1)
                  <td colspan={{ $date->format('N')-1 }}></td>
                  @endif
                  @endif

                  {{-- 月曜日だったら改行 --}}
                  @if($date->format('N') == 1)
              </tr>
              <tr>
                @endif

                {{-- 土曜だったら青字  --}}
                @if($date->format('N') == 6)
                <td class="sat">
                  <a href={{ route('r.create', ['date' => $date->format('Y年m月d日')]) }}>
                    <span class="h5">{{ $date->day}}</span>
                    <br>
                    @php
                    // 予約数
                    $rsv_cnt = App\Reservation::whereDate('date', $date)
                    ->whereNotNull('name')
                    ->count();
                    @endphp
                    @if($rsv_cnt <= 9) {{ '○' }} @elseif($rsv_cnt <=11) {{ '△'}} @else {{ '×'}} @endif </a> </td>
                      {{-- 日曜だったら赤字  --}} @elseif($date->format('N')
                      ==
                      7)
                <td class="sun"><a href={{ route('r.create', ['date' => $date->format('Y年m月d日')]) }}>
                    <span class="h5">{{ $date->day}}</span>
                    <br>
                    @php
                    // 予約組数
                    $rsv_cnt = App\Reservation::whereDate('date', $date)
                    ->whereNotNull('name')
                    ->count();
                    @endphp
                    @if($rsv_cnt <= 9) {{ '○' }} @elseif($rsv_cnt <=11) {{ '△'}} @else {{ '×'}} @endif </a> </td>
                      {{-- その他の日の表示  --}} @else <td class="day"><a
                        href={{ route('r.create', ['date' => $date->format('Y年m月d日')]) }}>
                        <span class="h5">{{ $date->day}}</span>
                        <br>
                        @php
                        // 予約数
                        $rsv_cnt = App\Reservation::whereDate('date', $date)
                        ->whereNotNull('name')
                        ->count();
                        @endphp
                        @if($rsv_cnt <= 9) {{ '○' }} @elseif($rsv_cnt <=11) {{ '△'}} @else {{ '×'}} @endif </a> </td>
                          @endif @php $date->addDay();
                          @endphp
                          @endfor
              </tr>
            </tbody>
          </table>
        </div>

        <div class="next_month col-5">
          <div class="h5 text-center mb-3">
            {{ $date->format('Y年m月') }}
          </div>

          <table class="table text-center calendar">
            <thead>
              @foreach($days_of_week as $day_of_week)
              @if($day_of_week === " 土") <th class="sat">{{$day_of_week}}</th>
              @elseif($day_of_week === "日")
              <th class="sun">{{$day_of_week}}</th>
              @else
              <th class="day">{{$day_of_week}}</th>
              @endif
              @endforeach
            </thead>
            <tbody>
              @for($i=1; $i<=$days_in_add_month; $i++) {{-- 1日が月曜じゃない場合はcospanでその分あける --}} @if($i==1) <tr>
                @if($date->format('N') != 1)
                <td colspan={{ $date->format('N')-1 }}></td>
                @endif
                @endif

                {{-- 月曜日だったら改行 --}}
                @if($date->format('N') == 1)
                </tr>
                <tr>
                  @endif

                  {{-- 土曜だったら青字  --}}
                  @if($date->format('N') == 6)
                  <td class="sat">
                    <a href={{ route('r.create', ['date' => $date->format('Y年m月d日')]) }}>
                      <span class="h5">{{ $date->day}}</span>
                      <br>
                      @php
                      // 予約数
                      $rsv_cnt = App\Reservation::whereDate('date', $date)
                      ->whereNotNull('name')
                      ->count();
                      @endphp
                      @if($rsv_cnt <= 9) {{ '○' }} @elseif($rsv_cnt <=11) {{ '△'}} @else {{ '×'}} @endif </a> </td>
                        {{-- 日曜だったら赤字  --}} @elseif($date->format('N') == 7)
                  <td class="sun"><a href={{ route('r.create', ['date' => $date->format('Y年m月d日')]) }}>
                      <span class="h5">{{ $date->day}}</span>
                      <br>
                      @php
                      // 予約組数
                      $rsv_cnt = App\Reservation::whereDate('date', $date)
                      ->whereNotNull('name')
                      ->count();
                      @endphp
                      @if($rsv_cnt <= 9) {{ '○' }} @elseif($rsv_cnt <=11) {{ '△'}} @else {{ '×'}} @endif </a> </td>
                        {{-- その他の日の表示  --}} @else <td class="day"><a
                          href={{ route('r.create', ['date' => $date->format('Y年m月d日')]) }}>
                          <span class="h5">{{ $date->day}}</span>
                          <br>
                          @php
                          // 予約数
                          $rsv_cnt = App\Reservation::whereDate('date', $date)
                          ->whereNotNull('name')
                          ->count();
                          @endphp
                          @if($rsv_cnt <= 9) {{ '○' }} @elseif($rsv_cnt <=11) {{ '△'}} @else {{ '×'}} @endif </a> </td>
                            @endif @php $date->addDay();
                            @endphp
                            @endfor
                </tr>
            </tbody>
          </table>
        </div>
        <div class="col-1 d-flex align-items-center justify-content-center">
          <a href="?year= {{ $add_year }} &&month= {{ $add_month }}" class="h1 text-secondary"><i
              class="fas fa-chevron-circle-right"></i></a>
        </div>
      </div>
      <p class="text-center">○：予約可　△：残りわずか　×：満席</p>
    </div>

    <div class="info mt-5 mb-5 p-3 border" id="details">
      <h4 class="text-center m-4 p-3">RESTAURANTの地図</h4>

      <iframe class="d-block mx-auto"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.2537677612854!2d135.49722731523204!3d34.698778780434914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e6ec55495f25%3A0x889efa2836d9630a!2z5aSn6Ziq6aeF5YmN56ysM-ODk-ODqw!5e0!3m2!1sja!2sjp!4v1615211403501!5m2!1sja!2sjp"
        width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      <br>
      <div class="table-responsive-lg">
        <table class="table mx-auto mt-3 mb-4 table-bordered" style="width:800px;">
          <tr>
            <td>店名</td>
            <td>RESTAURANT</td>
          </tr>
          <tr>
            <td>電話番号</td>
            <td>06-6346-xxxx</td>
          </tr>
          <tr>
            <td>住所</td>
            <td>〒530-0001
              大阪市北区梅田1-1-3</td>
          </tr>
          <tr>
            <td>アクセス</td>
            <td>JR東西線「北新地駅」より徒歩約2分</td>
          </tr>
          <tr>
            <td>駐車場</td>
            <td>地下及び近隣に有料P有り</td>
          </tr>
          <tr>
            <td>営業時間</td>
            <td>10:00〜23:00</td>
          </tr>
          <tr>
            <td>定休日</td>
            <td>年中無休</td>
          </tr>
        </table>
      </div>
    </div>


  </div>
</body>

</html>