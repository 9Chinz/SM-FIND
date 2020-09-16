<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <nav class="navbar navbar-expand navbar-light bg-light mb-1">
            <a class="navbar-brand">สาขา</a>
            <select name="dept" class="dropcon" id="id_dept" required>
                <option value="" selected disabled>-เลือกสาขา-</option>
                <option value="IT">เทคโนโลยีสารสนเทศ</option>
                <option value="CG">คอมพิวเตอร์กราฟิก</option>
                <option value="BC">คอมพิวเตอร์ธุรกิจ</option>
                <option value="AC">บัญชี</option>
            </select>
        </nav>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <nav class="navbar navbar-expand navbar-light bg-light mb-1">
            <a class="navbar-brand">ระดับ</a>
            <select name="section" class="dropcon" id="id_degree" required>
                <option value="" selected disabled>-เลือกระดับ-</option>
                <option value="Upper">ปวส</option>
                <option value="Lower">ปวช</option>
            </select>
        </nav>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <nav class="navbar navbar-expand navbar-light bg-light mb-1">
            <a class="navbar-brand">ชั้น</a>
            <select name="class" id="id_class" class="dropcon" required>
                <option value="" selected disabled>-เลือกชั้น-</option>
            </select>
        </nav>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <nav class="navbar navbar-expand navbar-light bg-light mb-1">
            <a class="navbar-brand">ห้อง</a>
            <select name="room" id="id_room" class="dropcon" required>
                <option value="" selected disabled>-เลือกห้อง-</option>
            </select>
        </nav>
    </div>
    <?php if ($_SERVER['PHP_SELF'] == "/SM-FIND/backend/management-board.php") { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <nav class="navbar navbar-expand navbar-light bg-light mb-1">
                <a class="navbar-brand">วัน</a>
                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-toggle="datepicker" name="date" id="id_date" required value="<?php echo $presentDate; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </nav>
        </div>
    <?php } ?>


</div>