@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Banner
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Banner Name</label>
                        <input class="form-control" name="txtBannerName" placeholder="Please Enter Banner Name" required  value="{{old('txtBannerName', $data['name'])}}" />
                    </div>
                    <div class="form-group">
                        <label>Banner Content</label>
                        <textarea class="form-control" rows="3" name="txtBannerContent" required>{{old('txtBannerName', $data['content'])}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Current Image</label>
                        <img src="{{isset($data['image']) ? asset('upload/banner_main/'.$data['image']) : asset('upload/images/nophoto.png')}}" width="200px" > 
                        <input type="hidden" name="CurrfImages" value="{{$data['image']}}">
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages" value="">
                    </div>
                    <div class="form-group">
                        <label>Banner Status</label>
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
                    <button type="submit" class="btn btn-default">Banner Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection