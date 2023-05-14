<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Reservation;
use DateTime;
use Illuminate\Support\Facades\Validator;

class ReserveController extends Controller
{
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

        return view('reserve/index', compact('days_of_week', 'date', 'days_in_month', 'sub_month', 'sub_year', 'add_month', 'add_year', 'days_in_add_month'));
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

    public function create(Request $request)
    {
        $date = $request->date;
        if (session()->has('course')) {
            $course = session()->get('course');
        } elseif (!empty($request->course)) {
            $course = $request->course;
        } else {
            $course = '';
        }
        // string -> date
        $ppl_disabled[] = '';
        if (!empty($date)) {
            $f_date = DateTime::createFromFormat('Y年m月d日', $date)->format('Y-m-d');
            //1名
            // if (Reservation::where('date', $f_date)
            // ->where('tbl_id', 1)
            // ->where('tbl_id', 2)
            // ->exists()) {
            if (Reservation::where('date', $f_date)
        ->where('tbl_id', 1)
        ->exists() && Reservation::where('date', $f_date)
        ->where('tbl_id', 2)
        ->exists()) {
                $ppl_disabled[] = 1;
            }
            //2名
            // if (Reservation::where('date', $f_date)
            // ->where('tbl_id', 1)
            // ->orWhere('tbl_id', 2)
            // ->orWhere('tbl_id', 3)
            // ->orWhere('tbl_id', 4)
            // ->orWhere('tbl_id', 5)
            // ->orWhere('tbl_id', 6)
            // ->exists()) {

            if (Reservation::where('date', $f_date)
        ->where('tbl_id', 1)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 2)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 3)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 4)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 5)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 6)
        ->exists()) {
                $ppl_disabled[] = 2;
            }
            //3名
            // if (Reservation::where('date', $f_date)
            // ->where('tbl_id', 3)
            // ->orWhere('tbl_id', 4)
            // ->orWhere('tbl_id', 5)
            // ->orWhere('tbl_id', 6)
            // ->orWhere('tbl_id', 7)
            // ->orWhere('tbl_id', 8)
            // ->orWhere('tbl_id', 9)
            // ->exists()) {
            if (Reservation::where('date', $f_date)
        ->where('tbl_id', 3)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 4)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 5)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 6)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 7)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 8)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 9)
        ->exists()) {
                $ppl_disabled[] = 3;
            }
            //4名
            // if (Reservation::where('date', $f_date)
            // ->where('tbl_id', 3)
            // ->orWhere('tbl_id', 4)
            // ->orWhere('tbl_id', 5)
            // ->orWhere('tbl_id', 6)
            // ->orWhere('tbl_id', 7)
            // ->orWhere('tbl_id', 8)
            // ->orWhere('tbl_id', 9)
            // ->orWhere('tbl_id', 10)
            // ->orWhere('tbl_id', 11)
            // ->exists()) {
            if (Reservation::where('date', $f_date)
        ->where('tbl_id', 3)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 4)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 5)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 6)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 7)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 8)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 9)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 10)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 11)
        ->exists()) {
                $ppl_disabled[] = 4;
            }
            //5,6,7名
            // if (Reservation::where('date', $f_date)
            // ->where('tbl_id', 7)
            // ->orWhere('tbl_id', 8)
            // ->orWhere('tbl_id', 9)
            // ->orWhere('tbl_id', 10)
            // ->orWhere('tbl_id', 11)
            // ->exists()) {
            if (Reservation::where('date', $f_date)
        ->where('tbl_id', 7)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 8)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 9)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 10)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 11)
        ->exists()) {
                $ppl_disabled[] = 5;
                $ppl_disabled[] = 6;
                $ppl_disabled[] = 7;
            }
            //6名
            // if (Reservation::where('date', $f_date)
            // ->where('tbl_id', 7)
            // ->orWhere('tbl_id', 8)
            // ->orWhere('tbl_id', 9)
            // ->orWhere('tbl_id', 10)
            // ->orWhere('tbl_id', 11)
            // ->exists()) {
            //     $ppl_disabled[] = 6;
            // }
            //7名
            // if (Reservation::where('date', $f_date)
            // ->where('tbl_id', 7)
            // ->orWhere('tbl_id', 8)
            // ->orWhere('tbl_id', 9)
            // ->orWhere('tbl_id', 10)
            // ->orWhere('tbl_id', 11)
            // ->exists()) {
            //     $ppl_disabled[] = 7;
            // }
            //8,9,10名
            // if (Reservation::where('date', $f_date)
            // ->where('tbl_id', 10)
            // ->orWhere('tbl_id', 11)
            // ->exists()) {
            if (Reservation::where('date', $f_date)
        ->where('tbl_id', 10)
        ->exists() &&
        Reservation::where('date', $f_date)
        ->where('tbl_id', 11)
        ->exists()) {
                $ppl_disabled[] = 8;
                $ppl_disabled[] = 9;
                $ppl_disabled[] = 10;
            }
            //9名
            // if (Reservation::where('date', $f_date)
            // ->where('tbl_id', 10)
            // ->orWhere('tbl_id', 11)
            // ->exists()) {
            //     $ppl_disabled[] = 9;
            // }
            //10名
            // if (Reservation::where('date', $f_date)
            // ->where('tbl_id', 10)
            // ->orWhere('tbl_id', 11)
            // ->exists()) {
            //     $ppl_disabled[] = 10;
            // }
        }
        return view('reserve/create', compact('date', 'course', 'ppl_disabled'));
    }

    // 予約情報の確認表示
    public function confirm(Request $request)
    {
        $date = $request->date;
        $ppl = $request->ppl;
        $time = $request->time;
        $course = $request->course;
        $name = $request->name;
        $tel = $request->tel;
        $mail = $request->mail;
        $comment = $request->comment;

        // バリデーション
        $validator = Validator::make($request->all(), [
            'date' => ['required'],
            'ppl' => ['required'],
            'time' => ['required'],
            'course' =>['required'],
            'name' => ['required', 'max:12'],
            'tel' => ['required', 'string', 'digits_between:10,11'],
            'mail' => ['required', 'string', 'email', 'max:100'],
            'comment' => ['max:200'],
        ]);

        // バリデーションエラーだった場合
        if ($validator->fails()) {
            return redirect()
                ->route('r.create')
                ->withErrors($validator)
                ->withInput();
        }

        // コース名設定と金額計算
        if ($course == "1") {
            $course_name = "焼鳥三昧コース";
            $amt = 3000 * $ppl;
        }
        if ($course == "2") {
            $course_name = "串カツフルコース";
            $amt = 4000 * $ppl;
        }
        if ($course == "3") {
            $course_name = "お刺身舟盛コース";
            $amt = 5000 * $ppl;
        }

        //セッションに保存
        $request->session()->put('date', $date);
        $request->session()->put('ppl', $ppl);
        $request->session()->put('time', $time);
        $request->session()->put('course', $course);
        $request->session()->put('name', $name);
        $request->session()->put('tel', $tel);
        $request->session()->put('mail', $mail);
        $request->session()->put('comment', $comment);


        return view('reserve/confirm', compact('date', 'ppl', 'time', 'course_name', 'name', 'tel', 'mail', 'comment', 'amt'));
    }

    public function store()
    {
        // string -> date
        $date = session('date');
        
        // 予約完了画面でリロードしたら
        if ($date == null) {
            //セッション全削除
            session()->flush();
            return view('reserve/reserved');
        } else {
            $f_date = DateTime::createFromFormat('Y年m月d日', $date)->format('Y-m-d');

            //テーブル自動設定
            $ppl = session('ppl');
            if ($ppl == 1) {
                if (Reservation::where('date', $f_date)->where('tbl_id', 1)->doesntExist()) {
                    $tbl_id = 1;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 2)->doesntExist()) {
                    $tbl_id = 2;
                }
            }
            if ($ppl == 2) {
                if (Reservation::where('date', $f_date)->where('tbl_id', 3)->doesntExist()) {
                    $tbl_id = 3;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 4)->doesntExist()) {
                    $tbl_id = 4;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 5)->doesntExist()) {
                    $tbl_id = 5;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 6)->doesntExist()) {
                    $tbl_id = 6;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 1)->doesntExist()) {
                    $tbl_id = 1;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 2)->doesntExist()) {
                    $tbl_id = 2;
                }
            }
            if ($ppl == 3) {
                if (Reservation::where('date', $f_date)->where('tbl_id', 3)->doesntExist()) {
                    $tbl_id = 3;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 4)->doesntExist()) {
                    $tbl_id = 4;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 5)->doesntExist()) {
                    $tbl_id = 5;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 6)->doesntExist()) {
                    $tbl_id = 6;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 7)->doesntExist()) {
                    $tbl_id = 7;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 8)->doesntExist()) {
                    $tbl_id = 8;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 9)->doesntExist()) {
                    $tbl_id = 9;
                }
            }
            if ($ppl == 4) {
                if (Reservation::where('date', $f_date)->where('tbl_id', 3)->doesntExist()) {
                    $tbl_id = 3;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 4)->doesntExist()) {
                    $tbl_id = 4;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 5)->doesntExist()) {
                    $tbl_id = 5;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 6)->doesntExist()) {
                    $tbl_id = 6;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 7)->doesntExist()) {
                    $tbl_id = 7;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 8)->doesntExist()) {
                    $tbl_id = 8;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 9)->doesntExist()) {
                    $tbl_id = 9;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 10)->doesntExist()) {
                    $tbl_id = 10;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 11)->doesntExist()) {
                    $tbl_id = 11;
                }
            }
            if ($ppl == 5) {
                if (Reservation::where('date', $f_date)->where('tbl_id', 7)->doesntExist()) {
                    $tbl_id = 7;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 8)->doesntExist()) {
                    $tbl_id = 8;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 9)->doesntExist()) {
                    $tbl_id = 9;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 10)->doesntExist()) {
                    $tbl_id = 10;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 11)->doesntExist()) {
                    $tbl_id = 11;
                }
            }
            if ($ppl == 6) {
                if (Reservation::where('date', $f_date)->where('tbl_id', 7)->doesntExist()) {
                    $tbl_id = 7;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 8)->doesntExist()) {
                    $tbl_id = 8;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 9)->doesntExist()) {
                    $tbl_id = 9;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 10)->doesntExist()) {
                    $tbl_id = 10;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 11)->doesntExist()) {
                    $tbl_id = 11;
                }
            }
            if ($ppl == 7) {
                if (Reservation::where('date', $f_date)->where('tbl_id', 7)->doesntExist()) {
                    $tbl_id = 7;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 8)->doesntExist()) {
                    $tbl_id = 8;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 9)->doesntExist()) {
                    $tbl_id = 9;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 10)->doesntExist()) {
                    $tbl_id = 10;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 11)->doesntExist()) {
                    $tbl_id = 11;
                }
            }
            if ($ppl == 8) {
                if (Reservation::where('date', $f_date)->where('tbl_id', 10)->doesntExist()) {
                    $tbl_id = 10;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 11)->doesntExist()) {
                    $tbl_id = 11;
                }
            }
            if ($ppl == 9) {
                if (Reservation::where('date', $f_date)->where('tbl_id', 10)->doesntExist()) {
                    $tbl_id = 10;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 11)->doesntExist()) {
                    $tbl_id = 11;
                }
            }
            if ($ppl == 10) {
                if (Reservation::where('date', $f_date)->where('tbl_id', 10)->doesntExist()) {
                    $tbl_id = 10;
                } elseif (Reservation::where('date', $f_date)->where('tbl_id', 11)->doesntExist()) {
                    $tbl_id = 11;
                }
            }

            $rsv = Reservation::create(
                [
            'date' => $f_date,
            'ppl' => $ppl,
            'time' => session('time'),
            'course_id' => session('course'),
            'name' => session('name'),
            'tel' => session('tel'),
            'mail' => session('mail'),
            'comment' => session('comment'),
            'tbl_id' => $tbl_id
        ]
            );
            $r_id = $rsv->id;

            //セッション全削除
            session()->flush();

            return view('reserve/reserved');
        }
    }
}
