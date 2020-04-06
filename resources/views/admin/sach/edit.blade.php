@extends("admin.layouts.index")

@section("content")

    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sách
                            <small>{{ $sach->Ten }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                        @endif
                        <form action="{{$sach->id }}" method="POST">
                           {{ csrf_field() }}
                            <select class="form-control" name="theloai">
                                @foreach ($theloai as $tl)
                                   <option 
                                        @if ($sach->id_theloai == $tl->id)
                                           {{ 'selected' }}
                                        @endif
                                   value="{{ $tl->id}}-{{ $tl->Ten }}">{{ $tl->Ten }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label>Tên Sách</label>
                                <input class="form-control" name="Ten" placeholder="Điền Tên Sách" value="{{ $sach->Ten }}" />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
