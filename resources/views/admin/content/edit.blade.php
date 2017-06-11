@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Content
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.blocks.errors')
                <form action="" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="txtTitle" placeholder="Please Enter Title" value="{{ old('txtTitle', $data['title']) }}" />
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="txtContent">{{ old('txtContent', $data['content']) }}</textarea>
                    </div>
                     <div class="form-group">
                        <label>Display number</label>
                        <input class="form-control" rows="3" name="txtDisplayNumber" value="{{old('txtDisplayNumber', $data['display_number'])}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Content Status</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" checked="" type="radio"
                            @if($data['status'] == 1){
                                   checked
                            }
                            @endif
                            >Visible
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" type="radio"
                            @if($data['status'] == 0){
                                   checked
                            }
                            @endif
                            >Invisible
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Content Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection