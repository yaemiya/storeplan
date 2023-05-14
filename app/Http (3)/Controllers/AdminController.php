<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Reservation;
use App\Table;
use DateTime;
use Date;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // 認証されていないとログイン画面に跳ね返す
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        // monthパラメータ
        if (null !== ($request->get('month'))) {
            $month = $request->input('month');
        } else {
            $month = '';
        }

        // yearパラメータ
        if (null !== ($request->get('year'))) {
            $year = $request->input('year');
        } else {
            $year = '';
        }

        if ($month != '' || $year != '') {
            $date = Carbon::createFromDate($year, $month, 01);
        } else {
            $date = Carbon::createFromDate();
        }
        
        // カレンダーメソッドの戻り値を代入
        $days_of_week = $this->calendar($date)[0];
        $days_in_month = $this->calendar($date)[1];
        $sub_month = $this->calendar($date)[2];
        $sub_year = $this->calendar($date)[3];
        $add_month = $this->calendar($date)[4];
        $add_year = $this->calendar($date)[5];
        $days_in_add_month = $this->calendar($date)[6];

        return view('admin/calendar', compact('days_of_week', 'date', 'days_in_month', 'sub_month', 'sub_year', 'add_month', 'add_year', 'days_in_add_month'));
    }

    // indexメソッドで使うロジックメソッド
    public function calendar($date)
    {
        Carbon::useMonthsOverflow(false); // 月またぎ問題
        $date->startOfMonth(); //今月の最初の日
        $date->timezone = 'Asia/Tokyo'; //日本時刻で表示

        // 曜日の配列作成
        $days_of_week= ['月', '火', '水', '木', '金', '土', '日'];

        //今月の日数
        $days_in_month = $date->daysInMonth;

        // 1ヶ月前
        $sub = Carbon::createFromDate($date->year, $date->month, $date->day);
        $sub_month_data = $sub->subMonth();
        $sub_year = $sub_month_data->year;
        $sub_month = $sub_month_data->month;

        // 1ヶ月後
        $add = Carbon::createFromDate($date->year, $date->month, $date->day);
        $add_month_data = $add->addMonth();
        $add_year = $add_month_data->year;
        $add_month = $add_month_data->month;

        // 翌月の日数
        $days_in_add_month = $add_month_data->daysInMonth;

        return [$days_of_week, $days_in_month, $sub_month, $sub_year, $add_month, $add_year, $days_in_add_month];
    }

    public function edit(Request $request)
    {
        // 予約日
        $date = $request->date;

        // 予約情報
        $rsvs = Reservation::where('date', $date)
        ->leftJoin('courses', 'course_id', '=', 'courses.id')
        ->get(['reservations.id as r_id','date','tbl_id', 'time', 'ppl', 'course_id', 'reservations.name as r_name', 'tel', 'mail', 'memo']);

        // 予約日の曜日
        $datetime = new DateTime($date);
        $week = array("日", "月", "火", "水", "木", "金", "土");
        $w = (int)$datetime->format('w');
        $day_of_week = $week[$w];

        session(['date'=>$date]);

        // テーブル数
        $tbl_cnt = Table::count();

        return view('admin/edit', compact('rsvs', 'date', 'day_of_week', 'tbl_cnt'));
    }

    public function updateOrCreate(Request $request)
    {
        // 予約日
        $date = session('date');
        // テーブル数
        $tbl_cnt = Table::count();
        // dd($request->input('check'));
        // チェックボックス整頓
        // $check = ($request->input('check')) ? 1 : 0;
        // dd($check);
        // 予約テーブル配列化
        $up_rsvs = array(
            // 'check' => $request->input('check'),
            'tbl_id' => $request->input('tbl_id'),
            'time' => $request->input('time'),
            'ppl' => $request->input('ppl'),
            'r_name' => $request->input('r_name'),
            'course_id' => $request->input('course_id'),
            'tel' => $request->input('tel'),
            'mail' => $request->input('mail'),
            'memo' => $request->input('memo')
        );
        for ($i=0; $i<$tbl_cnt; $i++) {
            // テーブルIDが入力情報と合致するときは更新
            if (Reservation::where('date', $date)
            ->where('tbl_id', $up_rsvs['tbl_id'][$i])
            ->exists()) {
                Reservation::where('date', $date)
                ->where('tbl_id', $up_rsvs['tbl_id'][$i])
                ->update(
                    [
                    // 'tbl_id', $up_rsvs['tbl_id'][$i]
                    'time' => $up_rsvs['time'][$i],
                    'ppl' => $up_rsvs['ppl'][$i],
                    'name' => $up_rsvs['r_name'][$i],
                    'course_id' =>$up_rsvs['course_id'][$i],
                    'tel' => $up_rsvs['tel'][$i],
                    'mail' => $up_rsvs['mail'][$i],
                    'memo' => $up_rsvs['memo'][$i]
                ]
                );
            // データが一つでも入力されていたら登録
            } else {
                // if (!empty($up_rsvs['time'][$i])
                // || !empty($up_rsvs['ppl'][$i])
                // || !empty($up_rsvs['r_name'][$i])
                // || !empty($up_rsvs['course_id'][$i])
                // || !empty($up_rsvs['tel'][$i])
                // || !empty($up_rsvs['mail'][$i])
                // || !empty($up_rsvs['memo'][$i])
                // ) {
                Reservation::create([
                        'tbl_id' => $up_rsvs['tbl_id'][$i],
                        'date' => $date,
                        'time' => $up_rsvs['time'][$i],
                        'ppl' => $up_rsvs['ppl'][$i],
                        'name' => $up_rsvs['r_name'][$i],
                        'course_id' => $up_rsvs['course_id'][$i],
                        'tel' => $up_rsvs['tel'][$i],
                        'mail' => $up_rsvs['mail'][$i],
                        'memo' => $up_rsvs['memo'][$i],
                        ]);
                // }
            }
            // チェックボックスにチェックが入っていたら削除
            // if (isset($up_rsvs['check'][$i])) {
            //     Reservation::where('date', $date)
            //     ->where('tbl_id', $up_rsvs['check'][$i])
            //     ->delete();
            // }
        }
        // 予約日の曜日
        $datetime = new DateTime($date);
        $week = array("日", "月", "火", "水", "木", "金", "土");
        $w = (int)$datetime->format('w');
        $day_of_week = $week[$w];
    
            
        // 予約情報
        $rsvs = Reservation::where('date', $date)
                    ->get(['tbl_id', 'date', 'time', 'ppl', 'reservations.name as r_name', 'course_id', 'tel', 'mail', 'memo']);
        return view('admin/edit', compact('date', 'day_of_week', 'rsvs', 'tbl_cnt'));


    public function delete($id)
    {
        //削除対象レコードを検索
        $reservation = Reservation::find($id);
        //削除
        $reservation->delete();
        //リダイレクト
        return redirect()->to('admin/edit');
    }
}
