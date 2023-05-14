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
        <div class="container col-8 mx-auto p-5">
            <h4>RESTAURANT</h4>
            <div class="card">
                <div class="card-header p-4 text-center bg-secondary text-light h3">予約登録</div>
                <div class="cart_container">
                    <form method="post" action="{{ route('r.confirm') }}">
                        @csrf
                        <div class="card-body create">
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="date" class="col-form-label">来店日（必須）　　<a
                                            href="index#r_calendar">カレンダーより選択　<i class="fa fa-calendar"
                                                aria-hidden="true"></i>
                                        </a></label>
                                    <input type="text" class="use_icon form-control bg-light onchange=" calendarFlg();"
                                        @error('date') is-invalid @enderror" name="date" id="date"
                                        value="{{ old('date', $date) }}" autocomplete="date" autofocus
                                        placeholder="カレンダーより予約日を選択してください" readonly>

                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="ppl" class="col-form-label">人数（必須）</label>
                                    <select name="ppl" class="form-control @error('ppl') is-invalid @enderror" id="ppl"
                                        dis>
                                        <option value="" readonly>ご人数を選択してください</option>
                                        <option value="1" @if(in_array(1, $ppl_disabled)) disabled @endif
                                            @if(old('ppl')=='1' ) selected @endif>1名様</option>
                                        <option value="2" @if(in_array(2, $ppl_disabled)) disabled @endif
                                            @if(old('ppl')=='2' ) selected @endif>2名様</option>
                                        <option value="3" @if(in_array(3, $ppl_disabled)) disabled @endif
                                            @if(old('ppl')=='3' ) selected @endif>3名様</option>
                                        <option value="4" @if(in_array(4, $ppl_disabled)) disabled @endif
                                            @if(old('ppl')=='4' ) selected @endif>4名様</option>
                                        <option value="5" @if(in_array(5, $ppl_disabled)) disabled @endif
                                            @if(old('ppl')=='5' ) selected @endif>5名様</option>
                                        <option value="6" @if(in_array(6, $ppl_disabled)) disabled @endif
                                            @if(old('ppl')=='6' ) selected @endif>6名様</option>
                                        <option value="7" @if(in_array(7, $ppl_disabled)) disabled @endif
                                            @if(old('ppl')=='7' ) selected @endif>7名様</option>
                                        <option value="8" @if(in_array(8, $ppl_disabled)) disabled @endif
                                            @if(old('ppl')=='8' ) selected @endif>8名様</option>
                                        <option value="9" @if(in_array(9, $ppl_disabled)) disabled @endif
                                            @if(old('ppl')=='9' ) selected @endif>9名様</option>
                                        <option value="10" @if(in_array(10, $ppl_disabled)) disabled @endif
                                            @if(old('ppl')=='10' ) selected @endif>10名様
                                        </option>
                                    </select>

                                    @error('ppl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="time" class="col-form-label">予約時間（必須）</label>
                                    <select name="time" class="form-control @error('time') is-invalid @enderror"
                                        id="time">
                                        <option value="">予約時間を選択してください</option>
                                        <option value="17:30" @if(old('time')=='17:30' ) selected @endif>17:30</option>
                                        <option value="18:00" @if(old('time')=='18:00' ) selected @endif>18:00</option>
                                        <option value="18:30" @if(old('time')=='18:30' ) selected @endif>18:30</option>
                                        <option value="19:00" @if(old('time')=='19:00' ) selected @endif>19:00</option>
                                        <option value="19:30" @if(old('time')=='19:30' ) selected @endif>19:30</option>
                                        <option value="20:00" @if(old('time')=='20:00' ) selected @endif>20:00</option>
                                    </select>

                                    @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="course" class="col-form-label">コース（必須）</label>
                                    <select name="course" class="form-control @error('course') is-invalid @enderror"
                                        id="course">
                                        <option value="">コースを選択してください</option>
                                        <option value="1" @if($course=='1' ) selected @endif @if(old('course')=='1' )
                                            selected @endif>焼鳥三昧コース</option>
                                        <option value="2" @if($course=='2' ) selected @endif @if(old('course')=='2' )
                                            selected @endif>串カツフルコース</option>
                                        <option value="3" @if($course=='3' ) selected @endif @if(old('course')=='3' )
                                            selected @endif>お刺身舟盛コース</option>
                                    </select>

                                    @error('course')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @php
                            session(['course' => $course]);
                            @endphp

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="name" class="col-form-label">お名前（必須）</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                        placeholder="お名前を入力してください">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="tel" class="col-form-label">電話番号（必須）</label>

                                    <input id="tel" type="string"
                                        class="form-control @error('tel') is-invalid @enderror" name="tel"
                                        value="{{ old('tel') }}" autocomplete="tel" placeholder="例：09012345678（ハイフンなし）"
                                        maxlength="11">

                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="mail" class="col-form-label">メールアドレス（必須）</label>
                                    <input type="text" class="form-control @error('mail') is-invalid @enderror"
                                        name="mail" value="{{ old('mail') }}" autocomplete="mail" autofocus
                                        placeholder="例：abc@def.com">

                                    @error('mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="comment" class="col-form-label">備考</label>
                                    <textarea rows="5" class="form-control @error('comment') is-invalid @enderror"
                                        name="comment" autocomplete="comment" placeholder="ご意見・ご要望など"
                                        autofocus>{{ old('comment') }}</textarea>

                                    @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="text-center mt-5">
                                        <button class="btn btn-block btn-lg btn-primary text-light d-flex align-items-center
                                            justify-content-center p-3" type="submit">ご予約内容を確認する</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</body>