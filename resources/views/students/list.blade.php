@extends('layouts.app')
@section('title','Danh sách sinh vien')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <ion-icon name="home-outline"><a href="{{route('home.index')}}">Home</a></ion-icon>
                        <li class="breadcrumb-item active">Danh sách sinh viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if (Session::has('success'))
        <p class="text-success">
            <i class="fa fa-check" aria-hidden="true"></i>
            {{ Session::get('success') }}
        </p>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Mã sinh viên</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Ảnh</th>
                                    <th>Phone</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $key => $student)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->student_code }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td>
                                            @if($student->avatar)
                                                <img src="{{ asset('storage/' . $student->avatar) }}" alt="{{ asset('storage/' . $student->avatar) }}"
                                                     style="width: 150px">
                                            @else
                                                {{'chưa có ảnh '}}
                                            @endif
                                        </td>
                                        <td>{{ $student->phone }}</td>
                                        <td>
                                            <a href="{{ route('students.update', ['id' => $student->id]) }}"
                                               class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('students.delete',['id'=>$student->id])}}"
                                               onclick="return confirm('Bạn muốn xóa sinh vien {{ $student->name }} này?')"
                                               class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
