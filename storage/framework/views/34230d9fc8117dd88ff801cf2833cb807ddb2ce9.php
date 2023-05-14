<?php $__env->startSection('content'); ?>

<div class="container m-5 p-5">
        <h4 class="text-center mt-3">管理画面</h4>
        <br><br>
        <p class="text-right"><?php echo e(date('Y年n月j日', strtotime($date)).$day_of_week); ?>曜日</p>
        <form method="get" action="<?php echo e(route('a.uc')); ?>">
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
                                        <?php for($i=0; $i<$tbl_cnt; $i++): ?> <tr>
                                                <td height="40">
                                                        
                                                        
                                                        <?php if(!empty($rsvs[$i]['r_id'])): ?>
                                                        <a href="<?php echo e($rsvs[$i]['r_id']); ?>"
                                                                class="btn btn-sm btn-outline-danger"
                                                                role="button">Cancel</a> <?php endif; ?>
                                                </td>
                                                <td height="40"><input name="tbl_id[]" type="text" value="<?php echo e($i+1); ?>"
                                                                style="border:none;">
                                                </td>
                                                <td><input name="time[]" type="text" <?php if(!empty($rsvs[$i]['time'])): ?>
                                                                value="<?php echo e($rsvs[$i]['time']); ?>" style="border:none;">
                                                        <?php endif; ?>
                                                </td>
                                                <td><input name="ppl[]" type="text" <?php if(!empty($rsvs[$i]['ppl'])): ?>
                                                                value="<?php echo e($rsvs[$i]['ppl']); ?>" style="border:none;">
                                                        <?php endif; ?></td>
                                                <td><input name="r_name[]" type="text" <?php if(!empty($rsvs[$i]['r_name'])): ?>
                                                                value="<?php echo e($rsvs[$i]['r_name']); ?>" style="border:none;">
                                                        <?php endif; ?></td>
                                                <td><select name="course_id[]" class="course_select">
                                                                <option></option>
                                                                <option value="1" <?php if(isset($rsvs[$i]['course_id']) &&
                                                                        $rsvs[$i]['course_id']==1 ): ?> selected <?php endif; ?>>
                                                                        焼鳥三昧コース</option>
                                                                <option value="2" <?php if(isset($rsvs[$i]['course_id']) &&
                                                                        $rsvs[$i]['course_id']==2 ): ?> selected <?php endif; ?>>
                                                                        串カツフルコース</option>
                                                                <option value="3" <?php if(isset($rsvs[$i]['course_id']) &&
                                                                        $rsvs[$i]['course_id']==3 ): ?> selected <?php endif; ?>>
                                                                        お刺身舟盛コース</option>
                                                        </select>
                                                </td>

                                                <td><input name="tel[]" type="text" <?php if(!empty($rsvs[$i]['tel'])): ?>
                                                                value="<?php echo e($rsvs[$i]['tel']); ?>" style="border:none;">
                                                        <?php endif; ?></td>
                                                <td><input name="mail[]" type="text" <?php if(!empty($rsvs[$i]['mail'])): ?>
                                                                value="<?php echo e($rsvs[$i]['mail']); ?>" style="border:none;">
                                                        <?php endif; ?></td>
                                                <td><input name="memo[]" type="text" <?php if(!empty($rsvs[$i]['memo'])): ?>
                                                                value="<?php echo e($rsvs[$i]['memo']); ?>" style="border:none;">
                                                        <?php endif; ?></td>
                                                </tr>
                                                <?php endfor; ?>
                                </tbody>
                        </table>
                </div>
                <p class="text-danger">　<i class="fas fa-long-arrow-alt-up"></i>　予約をキャンセルする場合はチェックしてください</p>
                <button type="submit" class="btn btn-primary btn-block btn-lg"
                        onclick="return confirm('予約情報を更新します。よろしいですか？');">
                        <?php echo e("予約更新する"); ?>

                </button>
        </form>
        <br>
        <form method="get" action="<?php echo e(route('a.cal')); ?>">
                <button type="submit" class="btn btn-secondary btn-block btn-lg">
                        カレンダー画面に戻る
                </button>
        </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/restaurant/resources/views/admin/edit.blade.php ENDPATH**/ ?>