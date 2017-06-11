@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Content
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
                        <th>Title</th>
                        <th>Content</th>
                        <th>Display Number</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr class="even gradeC" align="center">
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ str_limit($item['content'], 20) }}</td>
                        <td>
                        <input type="text" size="10px" class="DisplayNumber" value="{{ $item['display_number'] }}">
                        <a href="javascript:void(0)"><i class="fa fa-recycle btnUpdate" aria-hidden="true" data-id="{{$item['id']}}"></i></a>
                        </td>
                        <td>
                        <?php \Carbon\Carbon::setlocale('vi'); ?>
                        {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans() }}
                        </td>
                        <td>{{ $item['status']? 'Hiện' : 'Ẩn' }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a <a onclick="return confirm('Bạn có thật sự xóa không?');" href="{{ route('getContentDel', ['id' => $item['id']]) }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('getContentEdit', ['id' => $item['id']]) }}">Edit</a></td>
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
            $(".btnUpdate").off('click').on('click', function(event) {
                event.preventDefault();
                var btn = $(this);
                var id = btn.data('id');
                var number = $(this).parent().parent().find('.DisplayNumber').val();
                $.ajax({
                    url: 'cap-nhat-hien-thi/'+id+'/'+number,
                    type: 'GET',
                    dataType: 'text',
                    data: {id: id, number: number},
                })
                .done(function(data) {
                    if (data == "Success") {
                        window.location = "AdminTool/content/list";
                    }
                })
            });;
        });
    </script>
@endsection