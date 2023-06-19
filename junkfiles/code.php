<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <button>A</button>
    <button>A</button>
    <button>A</button>

    <script>
        jQuery.fn.clickToggle = function(a, b) {
  return this.on("click", function(ev) { [b, a][this.$_io ^= 1].call(this, ev) })
};

// TEST:
$('button').clickToggle(function(ev) {
  $(this).text("B"); 
}, function(ev) {
  $(this).text("A");
});
    </script>
    
</body>
</html>
<div class="card mt-2">
                                        <div class="card-header">
                                            <h4>ข้อมูลการจอง</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card card-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>ข้อมูลผู้ติดต่อ</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="">ชื่อ-นามสกุล</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">โทรศัพท์มือถือ</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">อีเมล</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="mt-2">
                                                            <input type="text" class="form-control" name="username"
                                                                id="user">
                                                        </div>
                                                        <div class="mt-2">
                                                            <input type="text" class="form-control" name="phone"
                                                                id="phone">
                                                        </div>
                                                        <div class="mt-2">
                                                            <input type="text" class="form-control" name="email"
                                                                id="email">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-2">
                                            <div class="card-header">
                                                <h4>ยอดเงินรวมที่ต้องชำระ</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p>จำนวนตั๋วที่จอง: </p>
                                                        <p>ผู้สูงอายุ: </p>
                                                        <p>ผู้ใหญ่: </p>
                                                        <p>เด็ก: </p>
                                                        <p>ยอดรวมทั้งหมด: </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-2">
                                            <div class="card-header">
                                                <h4>วิธีการชำระเงิน</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>