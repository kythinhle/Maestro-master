@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
            @include('admin.blocks.success')
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td><img src="{{asset('public/upload/banner_main/'.$item['image'])}}" alt="" width="300" height="100"></td>
                        <td>
                        <a href="javascript:void(0)" class="btn-active" data-id="{{$item['id']}}">
                            {{ $item['status'] == 1 ? 'Hiện': 'Ẩn' }}
                        </a>
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có thật sự xóa không?');" href="{{route('getBannerDel', ['id' => $item['id']])}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('getBannerEdit', ['id' => $item['id']])}}">Edit</a></td>
                    </tr>
                @endforeach    
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-active").off('click').on('click', function(event) {
                event.preventDefault();
                var btn = $(this);
                var id = btn.data('id');
                $.ajax({
                    url: '/AdminTool/banner/changeStatus/' + id,
                    type: 'GET',
                    data: {id: id},
                })
                .done(function(data) {
                    if (data == 1) {
                        btn.text('Hiện');
                    }else{
                        btn.text('Ẩn');
                    }
                }) 
            });;
        });
    </script>
@endsection