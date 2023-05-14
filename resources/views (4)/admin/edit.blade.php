@extends('../layouts/admin_layout')
@section('content')

<div class="container m-5 p-5">
        <h4 class="text-center mt-3">管理画面</h4>
        <br><br>
        <p class="text-right">{{ date('Y年n月j日', strtotime($date)).$day_of_week }}曜日</p>
        <form method="get" action="{{ route('a.uc') }}">
                <div class="table-responsive">
                        <table class="table table-bordered bg-white border-secondary">
                                <thead class="text-center">
                                        <th class="border" height="40" width="30"><i class="fas fa-check"></i></th>
                                        <th width="60">座席</th>
                                        <th width="90">予約時間</th>
                                        <th width="60">人数</th>
                                        <th width="140">名前</th>
                                        <th width="160">コース</th>
                                        <th width="140">電話番号</th>
                                        <th width="160">メールアドレス</th>
                                        <th width="400">メモ</th>
                                </thead>
                                <tbody class="text-left edit">
                                        @for($i=0; $i<$tbl_cnt; $i++) <tr>
                                                <td height="40">
                                                        {{-- <input type="checkbox" id="check" name="check[]"
                                                                value="{{$i+1}}"> --}}
                                                        {{-- {{dd($rsvs[$i])}} --}}
                                                        @if(!empty($rsvs[$i]['r_id']))
                                                        <a href="{{$rsvs[$i]['r_id']}}"
                                                                class="btn btn-sm btn-outline-danger"
                                                                role="button">Cancel</a> @endif
                                                </td>
                                                <td height="40"><input name="tbl_id[]" type="text" value="{{ $i+1 }}"
                                                                style="border:none;">
                                                </td>
                                                <td><input name="time[]" type="text" @if(!empty($rsvs[$i]['time']))
                                                                value="{{ $rsvs[$i]['time'] }}" style="border:none;">
                                                        @endif
                                                </td>
                                                <td><input name="ppl[]" type="text" @if(!empty($rsvs[$i]['ppl']))
                                                                value="{{ $rsvs[$i]['ppl'] }}" style="border:none;">
                                                        @endif</td>
                                                <td><input name="r_name[]" type="text" @if(!empty($rsvs[$i]['r_name']))
                                                                value="{{ $rsvs[$i]['r_name'] }}" style="border:none;">
                                                        @endif</td>
                                                <td><select name="course_id[]" class="course_select">
                                                                <option></option>
                                                                <option value="1" @if(isset($rsvs[$i]['course_id']) &&
                                                                        $rsvs[$i]['course_id']==1 ) selected @endif>
                                                                        焼鳥三昧コース</option>
                                                                <option value="2" @if(isset($rsvs[$i]['course_id']) &&
                                                                        $rsvs[$i]['course_id']==2 ) selected @endif>
                                                                        串カツフルコース</option>
                                                                <option value="3" @if(isset($rsvs[$i]['course_id']) &&
                                                                        $rsvs[$i]['course_id']==3 ) selected @endif>
                                                                        お刺身舟盛コース</option>
                                                        </select>
                                                </td>

                                                <td><input name="tel[]" type="text" @if(!empty($rsvs[$i]['tel']))
                                                                value="{{ $rsvs[$i]['tel'] }}" style="border:none;">
                                                        @endif</td>
                                                <td><input name="mail[]" type="text" @if(!empty($rsvs[$i]['mail']))
                                                                value="{{ $rsvs[$i]['mail'] }}" style="border:none;">
                                                        @endif</td>
                                                <td><input name="memo[]" type="text" @if(!empty($rsvs[$i]['memo']))
                                                                value="{{ $rsvs[$i]['memo'] }}" style="border:none;">
                                                        @endif</td>
                                                </tr>
                                                @endfor
                                </tbody>
                        </table>
                </div>
                <p class="text-danger">　<i class="fas fa-long-arrow-alt-up"></i>　予約をキャンセルする場合はチェックしてください</p>
                <button type="submit" class="btn btn-primary btn-block btn-lg"
                        onclick="return confirm('予約情報を更新します。よろしいですか？');">
                        {{ "予約更新する" }}
                </button>
        </form>
        <br>
        <form method="get" action="{{ route('a.cal') }}">
                <button type="submit" class="btn btn-secondary btn-block btn-lg">
                        カレンダー画面に戻る
                </button>
        </form>
</div>
@endsection