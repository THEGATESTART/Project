<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>

<body>
    <!-- login modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ล็อกอินเข้าสู่ระบบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="login-inc.php" method="post">
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user fa-fw"></i></span>
                            </div>
                            <input type="text" class="form-control" name="username" id="usernames"
                                placeholder="Username" required>
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock fa-fw"></i></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" id="passwords"
                                placeholder="Password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">ปิด</button>
                            <button type="submit" name="submit" class="btn btn-primary">ยืนยัน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- end login modal -->

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">สมัครสมาชิก</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="register-inc.php" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fa fa-address-card-o fa-fw"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        placeholder="ชื่อ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fa fa-address-card-o fa-fw"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        placeholder="นามสกุล..." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user fa-fw"></i></span>
                            </div>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="๊Username" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-8">
                            </div>
                            <div class="col-sm-4">
                                <div id="msg"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock fa-fw"></i></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock fa-fw"></i></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="confirm_password"
                                            id="confirm_password" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone fa-fw"></i></span>
                            </div>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="0997894561"
                                required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope fa-fw"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Example@email.com" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label"
                                        for="customControlAutosizing">ข้อกำหนดในการเข้าใช้งาน</label>
                                </div>
                            </div>
                        </div>
                        <hr></hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" name="submit" class="btn btn-success w-100">สมัคร</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>