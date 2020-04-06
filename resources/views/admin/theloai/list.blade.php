@extends("admin.layouts.index")

@section("content")

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>Danh Sách</small>
                </h1>
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
                        <th>Tên</th>
                        <th>Tên Không Dấu</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($the_loai as $key => $tl)
                    <tr class="odd gradeX" align="center">
                        <td align="right">{{ $key + 1 }}</td>
                        <td align="left">{{ $tl->Ten }}</td>
                        <td align="left">{{ $tl->TenKhongDau }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="delete/{{ $tl->id }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="edit/{{ $tl->id }}">Edit</a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="pagination-book" style="text-align: right;">
               {{ $the_loai->links() }}
           </div>

       </div>
       <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
