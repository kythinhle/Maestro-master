@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Banner
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Banner Name</label>
                        <input class="form-control" name="txtBannerName" placeholder="Please Enter Banner Name" required />
                    </div>
                    <div class="form-group">
                        <label>Banner Content</label>
                        <textarea class="form-control" rows="3" name="txtBannerContent" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Banner Status</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" checked="" type="radio">Invisible
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Banner Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>  
@endsection