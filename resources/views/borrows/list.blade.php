@extends('layouts.app')
@section('title','Danh sach phieu muon')
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
                        <li class="breadcrumb-item active">Danh sách phieu muon</li>
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
                                    <th>Ten sinh vien</th>
                                    <th>Ten sach </th>
                                    <th>Ngay muon</th>
                                    <th>Ngay tra</th>
                                    <th>Trang thai</th>
                                    <th></th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($borrows as $key => $borrow)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $borrow->student->name }}</td>
                                        <td>{{ $borrow->book->name }}</td>
                                        <td>{{ $borrow->borrow_date }}</td>
                                        <td>{{ $borrow->borrow_return }}</td>
                                        <td>{{ $borrow->status }}</td>
                                      
                                        {{-- <td>
                                            <a href="{{ route('borrows.edit', ['id' => $borrow->id]) }}"
                                               class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('borrows.delete',['id'=>$borrow->id])}}"
                                               onclick="return confirm('Bạn muốn xóa phiếu mượn của {{ $borrow->name }} này?')"
                                               class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td> --}}
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

