@extends('../layouts/admin_layout')
@section('content')

<div class="container">
    <h4 class="text-center mt-5 mb-5">管理画面</h4>
    <div class="calendar_border border pt-5 pb-5">
        <div class="row mb-5">
            <div class="col-1 d-flex align-items-center justify-content-center">
                <a href="calendar?year= {{ $sub_year }} &&month= {{ $sub_month }}" class="h1 text-secondary">
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
                            @for($i=1; $i<=$days_in_month; $i++) {{-- 1日が月曜じゃない場合はcospanでその分あける --}} @if($i==1)
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
                                <a href={{ url('admin/edit', $date) }}>
                                    <span class="h5">{{ $date->day}}</span>
                                    <br>
                                    @php
                                    // 予約数
                                    $rsv_cnt = App\Reservation::whereDate('date', $date)
                                    ->whereNotNull('name')
                                    ->count();
                                    @endphp
                                    {{ $rsv_cnt}}組
                                    <br>
                                    @php
                                    // 合計予約人数
                                    $total_ppl = App\Reservation::whereDate('date', $date)
                                    ->get()
                                    ->sum('ppl');
                                    @endphp
                                    {{ $total_ppl }}名
                                </a>
                            </td>
                            {{-- 日曜だったら赤字  --}}
                            @elseif($date->format('N') == 7)
                            <td class="sun"><a href={{ url('admin/edit', $date) }}>
                                    <span class="h5">{{ $date->day}}</span>
                                    <br>
                                    @php
                                    // 予約組数
                                    $rsv_cnt = App\Reservation::whereDate('date', $date)
                                    ->whereNotNull('name')
                                    ->count();
                                    @endphp
                                    {{ $rsv_cnt}}組
                                    <br>
                                    @php
                                    // 合計予約人数
                                    $total_ppl = App\Reservation::whereDate('date', $date)
                                    ->get()
                                    ->sum('ppl');
                                    @endphp
                                    {{ $total_ppl }}名
                                </a>
                            </td>
                            {{-- その他の日の表示  --}}
                            @else
                            <td class="day"><a href={{ url('admin/edit', $date) }}>
                                    <span class="h5">{{ $date->day}}</span>
                                    <br>
                                    @php
                                    // 予約数
                                    $rsv_cnt = App\Reservation::whereDate('date', $date)
                                    ->whereNotNull('name')
                                    ->count();
                                    @endphp
                                    {{ $rsv_cnt}}組
                                    <br>
                                    @php
                                    // 合計予約人数
                                    $total_ppl = App\Reservation::whereDate('date', $date)
                                    ->get()
                                    ->sum('ppl');
                                    @endphp
                                    {{ $total_ppl }}名
                                </a>
                            </td>
                            @endif

                            @php
                            $date->addDay();
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
                                    <a href={{ url('admin/edit', $date) }}>
                                        <span class="h5">{{ $date->day}}</span>
                                        <br>
                                        @php
                                        // 予約数
                                        $rsv_cnt = App\Reservation::whereDate('date', $date)
                                        ->whereNotNull('name')
                                        ->count();
                                        @endphp
                                        {{ $rsv_cnt}}組
                                        <br>
                                        @php
                                        // 合計予約人数
                                        $total_ppl = App\Reservation::whereDate('date', $date)
                                        ->get()
                                        ->sum('ppl');
                                        @endphp
                                        {{ $total_ppl }}名
                                    </a>
                                </td>
                                {{-- 日曜だったら赤字  --}}
                                @elseif($date->format('N') == 7)
                                <td class="sun"><a href={{ url('admin/edit', $date) }}>
                                        <span class="h5">{{ $date->day}}</span>
                                        <br>
                                        @php
                                        // 予約組数
                                        $rsv_cnt = App\Reservation::whereDate('date', $date)
                                        ->whereNotNull('name')
                                        ->count();
                                        @endphp
                                        {{ $rsv_cnt}}組
                                        <br>
                                        @php
                                        // 合計予約人数
                                        $total_ppl = App\Reservation::whereDate('date', $date)
                                        ->get()
                                        ->sum('ppl');
                                        @endphp
                                        {{ $total_ppl }}名
                                    </a>
                                </td>
                                {{-- その他の日の表示  --}}
                                @else
                                <td class="day"><a href={{ url('admin/edit', $date) }}>
                                        <span class="h5">{{ $date->day}}</span>
                                        <br>
                                        @php
                                        // 予約数
                                        $rsv_cnt = App\Reservation::whereDate('date', $date)
                                        ->whereNotNull('name')
                                        ->count();
                                        @endphp
                                        {{ $rsv_cnt}}組
                                        <br>
                                        @php
                                        // 合計予約人数
                                        $total_ppl = App\Reservation::whereDate('date', $date)
                                        ->get()
                                        ->sum('ppl');
                                        @endphp
                                        {{ $total_ppl }}名
                                    </a>
                                </td>
                                @endif

                                @php
                                $date->addDay();
                                @endphp
                                @endfor
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center">
                <a href="calendar?year= {{ $add_year }} &&month= {{ $add_month }}" class="h1 text-secondary"><i
                        class="fas fa-chevron-circle-right"></i></a>
            </div>
        </div>
        <p class="text-center">各日付をクリックして予約の編集をしてください</p>
    </div>
</div>
@endsection