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
        <div class="container col-8 mx-auto p-5">
            <h4>RESTAURANT</h4>
            <div class="card">
                <div class="card-header p-4 text-center bg-secondary text-light h3">予約登録</div>
                <div class="cart_container">
                    <form method="post" action="<?php echo e(route('r.confirm')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="card-body create">
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="date" class="col-form-label">来店日（必須）　　<a
                                            href="index#r_calendar">カレンダーより選択　<i class="fa fa-calendar"
                                                aria-hidden="true"></i>
                                        </a></label>
                                    <input type="text" class="use_icon form-control bg-light onchange=" calendarFlg();"
                                        <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date" id="date"
                                        value="<?php echo e(old('date', $date)); ?>" autocomplete="date" autofocus
                                        placeholder="カレンダーより予約日を選択してください" readonly>

                                    <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="ppl" class="col-form-label">人数（必須）</label>
                                    <select name="ppl" class="form-control <?php $__errorArgs = ['ppl'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ppl"
                                        dis>
                                        <option value="" readonly>ご人数を選択してください</option>
                                        <option value="1" <?php if(in_array(1, $ppl_disabled)): ?> disabled <?php endif; ?>
                                            <?php if(old('ppl')=='1' ): ?> selected <?php endif; ?>>1名様</option>
                                        <option value="2" <?php if(in_array(2, $ppl_disabled)): ?> disabled <?php endif; ?>
                                            <?php if(old('ppl')=='2' ): ?> selected <?php endif; ?>>2名様</option>
                                        <option value="3" <?php if(in_array(3, $ppl_disabled)): ?> disabled <?php endif; ?>
                                            <?php if(old('ppl')=='3' ): ?> selected <?php endif; ?>>3名様</option>
                                        <option value="4" <?php if(in_array(4, $ppl_disabled)): ?> disabled <?php endif; ?>
                                            <?php if(old('ppl')=='4' ): ?> selected <?php endif; ?>>4名様</option>
                                        <option value="5" <?php if(in_array(5, $ppl_disabled)): ?> disabled <?php endif; ?>
                                            <?php if(old('ppl')=='5' ): ?> selected <?php endif; ?>>5名様</option>
                                        <option value="6" <?php if(in_array(6, $ppl_disabled)): ?> disabled <?php endif; ?>
                                            <?php if(old('ppl')=='6' ): ?> selected <?php endif; ?>>6名様</option>
                                        <option value="7" <?php if(in_array(7, $ppl_disabled)): ?> disabled <?php endif; ?>
                                            <?php if(old('ppl')=='7' ): ?> selected <?php endif; ?>>7名様</option>
                                        <option value="8" <?php if(in_array(8, $ppl_disabled)): ?> disabled <?php endif; ?>
                                            <?php if(old('ppl')=='8' ): ?> selected <?php endif; ?>>8名様</option>
                                        <option value="9" <?php if(in_array(9, $ppl_disabled)): ?> disabled <?php endif; ?>
                                            <?php if(old('ppl')=='9' ): ?> selected <?php endif; ?>>9名様</option>
                                        <option value="10" <?php if(in_array(10, $ppl_disabled)): ?> disabled <?php endif; ?>
                                            <?php if(old('ppl')=='10' ): ?> selected <?php endif; ?>>10名様
                                        </option>
                                    </select>

                                    <?php $__errorArgs = ['ppl'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="time" class="col-form-label">予約時間（必須）</label>
                                    <select name="time" class="form-control <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="time">
                                        <option value="">予約時間を選択してください</option>
                                        <option value="17:30" <?php if(old('time')=='17:30' ): ?> selected <?php endif; ?>>17:30</option>
                                        <option value="18:00" <?php if(old('time')=='18:00' ): ?> selected <?php endif; ?>>18:00</option>
                                        <option value="18:30" <?php if(old('time')=='18:30' ): ?> selected <?php endif; ?>>18:30</option>
                                        <option value="19:00" <?php if(old('time')=='19:00' ): ?> selected <?php endif; ?>>19:00</option>
                                        <option value="19:30" <?php if(old('time')=='19:30' ): ?> selected <?php endif; ?>>19:30</option>
                                        <option value="20:00" <?php if(old('time')=='20:00' ): ?> selected <?php endif; ?>>20:00</option>
                                    </select>

                                    <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="course" class="col-form-label">コース（必須）</label>
                                    <select name="course" class="form-control <?php $__errorArgs = ['course'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="course">
                                        <option value="">コースを選択してください</option>
                                        <option value="1" <?php if($course=='1' ): ?> selected <?php endif; ?> <?php if(old('course')=='1' ): ?>
                                            selected <?php endif; ?>>焼鳥三昧コース</option>
                                        <option value="2" <?php if($course=='2' ): ?> selected <?php endif; ?> <?php if(old('course')=='2' ): ?>
                                            selected <?php endif; ?>>串カツフルコース</option>
                                        <option value="3" <?php if($course=='3' ): ?> selected <?php endif; ?> <?php if(old('course')=='3' ): ?>
                                            selected <?php endif; ?>>お刺身舟盛コース</option>
                                    </select>

                                    <?php $__errorArgs = ['course'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <?php
                            session(['course' => $course]);
                            ?>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="name" class="col-form-label">お名前（必須）</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="name" value="<?php echo e(old('name')); ?>" autocomplete="name" autofocus
                                        placeholder="お名前を入力してください">

                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="tel" class="col-form-label">電話番号（必須）</label>

                                    <input id="tel" type="string"
                                        class="form-control <?php $__errorArgs = ['tel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tel"
                                        value="<?php echo e(old('tel')); ?>" autocomplete="tel" placeholder="例：09012345678（ハイフンなし）"
                                        maxlength="11">

                                    <?php $__errorArgs = ['tel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="mail" class="col-form-label">メールアドレス（必須）</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="mail" value="<?php echo e(old('mail')); ?>" autocomplete="mail" autofocus
                                        placeholder="例：abc@def.com">

                                    <?php $__errorArgs = ['mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label for="comment" class="col-form-label">備考</label>
                                    <textarea rows="5" class="form-control <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="comment" autocomplete="comment" placeholder="ご意見・ご要望など"
                                        autofocus><?php echo e(old('comment')); ?></textarea>

                                    <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

</body><?php /**PATH /Applications/MAMP/htdocs/restaurant/resources/views/reserve/create.blade.php ENDPATH**/ ?>