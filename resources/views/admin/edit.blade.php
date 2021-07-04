<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
    </ul><br>


    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- <div class="card">Hello</div> -->
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{url('/admin/update/'.$tbmoney->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="tbmoney_Detail">รายการ</label>
                                    <input type="text" class="form-control" name="tbmoney_Detail" value="{{$tbmoney->detail}}">
                                </div>
                                @error('tbmoney_Detail')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>

                                <div class="form-group">



                                    <label for="tbmoney_type">ประเภท</label><br>
                                    <input class="form-check-input" type="radio" name="tbmoney_type" value="in"<?php if ($tbmoney->type == 'in') echo 'checked="checked"'; ?> >
                                    <label class="form-check-label">รายรับ</label>
                                    <input class="form-check-input" type="radio" name="tbmoney_type" value="out"<?php if ($tbmoney->type == 'out') echo 'checked="checked"'; ?>>
                                    <label class="form-check-label">รายจ่าย</label>
                                </div>
                                @error('tbmoney_type')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>

                                <div class="form-group">
                                    <label for="tbmoney_date">วันที่</label>
                                    <input type="date" class="form-control" name="tbmoney_date" value="{{$tbmoney->date}}">
                                </div>
                                @error('tbmoney_date')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>

                                <div class="form-group">
                                    <label for="tbmoney_amount">จำนวน</label>
                                    <input type="number" class="form-control" name="tbmoney_amount" value="{{$tbmoney->amount}}">
                                </div>
                                @error('tbmoney_amount')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>



                                <br>
                                <input type="submit" value="บันทึก" class="btn btn-primary">

                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>



</body>

</html>

</html>