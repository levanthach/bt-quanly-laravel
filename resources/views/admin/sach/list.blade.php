@extends("admin.layouts.index")

@section("content")

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sách
                    <small>Danh Sách</small>
                    <div class="col-lg-3 pull-right" style="padding: 5px 0;">
                         <form action="{{ route('search') }}" method="POST" accept-charset="utf-8">
                             {{csrf_field()}}
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="tukhoa" placeholder="Tìm Kiếm">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </h1>


            </div>
            @if (session('thongbao'))
            <div class="alert alert-success">
                {{ session('thongbao') }}
            </div>
            @endif
        </div>

        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Tên Sách</th>
                    <th>Tên Không Dấu</th>
                    <th>Tên Thể Loại</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sach as $key => $tl)
                <tr class="odd gradeX" align="center">
                    <td align="right">  
                        {{ $key + 1 }}
                    </td>
                    <td align="left">{{ $tl->Tens }}</td>
                    <td align="left">{{ $tl->TenKhongDau }}</td>
                    <td align="left">{{ $tl->TenTl}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="delete/{{ $tl->id }}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="edit/{{ $tl->id }}">Edit</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="pagination-book" style="text-align: right;">
           {{ $sach->links() }}
       </div>

   </div>
   <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
