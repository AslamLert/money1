<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </ul><br>
    <h1>Hello Money</h1>




    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                @if(session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">ตารางข้อมูลรายรับรายจ่าย</div>
                        <!-- รับ tbmoney -->
                        <!-- {{$tbmoney}} -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">รายการ</th>
                                    <th scope="col">ประเภท</th>
                                    <th scope="col">วันที่</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            @php($i=1)
                            @foreach($tbmoney as $row)
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$row->detail}}</td>
                                <td>{{$row->type=="in" ? "รายรับ" : "รายจ่าย" }}</td>
                                <td>{{$row->date}}</td>
                                <td>{{$row->amount}}</td>
                                @php($Total=$row->sum('amount'))
                                <td>
                                    <a href="{{url('/admin/edit/'.$row->id)}}" class="btn btn-primary">แก้ไข</a>
                                    <a href="{{url('/admin/delete/'.$row->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">ลบ</a>

                                </td>
                            </tr>
                            @endforeach

                        </table>
                        รวม
                        {{$Total}}
                        </table>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{route('NameAddTbmoney')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="money_Detail">รายการ</label>
                                    <input type="text" class="form-control" name="money_Detail">
                                </div>
                                @error('money_Detail')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>

                                <div class="form-group">
                                    <label for="money_type">ประเภท</label><br>
                                    <input class="form-check-input" type="radio" name="money_type" value="in">
                                    <label class="form-check-label">รายรับ</label>
                                    <input class="form-check-input" type="radio" name="money_type" value="out">
                                    <label class="form-check-label">รายจ่าย</label>
                                </div>
                                @error('money_type')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>

                                <div class="form-group">
                                    <label for="money_date">วันที่</label>
                                    <input type="date" class="form-control" name="money_date">
                                </div>
                                @error('money_date')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>

                                <div class="form-group">
                                    <label for="money_amount">จำนวน</label>
                                    <input type="text" class="form-control" name="money_amount">
                                </div>
                                @error('money_amount')
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