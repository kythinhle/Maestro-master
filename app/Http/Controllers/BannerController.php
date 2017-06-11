<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;
use App\Banner;
use DateTime;
use File;
use Request;

class BannerController extends Controller
{
	public function getList(){
		$data = Banner::select('id','name','image','status')->orderBy('id','DESC')->get()->toArray();
		return view('admin.banner.list', compact('data'));
	}

    public function getAdd(){
    	return view('admin.banner.add');
    }
    public function postAdd(BannerRequest $request){
    	$data = new Banner;
    	$data->name = $request->txtBannerName;
    	$data->content = $request->txtBannerContent;

    	$file = $request->file('fImages');
    	if (strlen($file) > 0) {
    		$filename = time().'.'.$file->getClientOriginalName();
    		$path = 'upload/banner_main';
    		$file->move($path, $filename);
    		$data->image = $filename;
    	}
    	$data->status = $request->rdoStatus;
    	$data->created_at = new DateTime;
    	$data->save();

    	return redirect()->route('getListBanner')->with(['flash_level' => 'success', 'flash_message' => 'Thêm sản phẩm thành công !!', 'flash_icon' => 'picture-o']);
    }

    public function getDel($id){
    	$del = Banner::findOrFail($id);
    	$del->delete();
        File::delete('upload/banner_main/'.$del->image);

    	return redirect()->route('getListBanner')->with(['flash_level' => 'success', 'flash_message' => 'Xóa Banner thành công !!','flash_icon' => 'trash']);
    }

    public function getEdit($id){
    	$data = Banner::findOrFail($id);
    	return view('admin.banner.edit', compact('data'));
    }
    public function postEdit(BannerRequest $request, $id){
    	$data = Banner::findOrFail($id);

    	
    	$data->name = $request->txtBannerName;
    	$data->content = $request->txtBannerContent;


    	$file = $request->file('fImages');
    	if (strlen($file) > 0) {

    		$CurrentImage = $request->CurrfImages;
            $img = 'upload/banner_main/'.$CurrentImage;
            if (file_exists($img)) {
                file::delete($img);
            }

    		$filename = time().'.'.$file->getClientOriginalName();
    		$path = 'upload/banner_main';
    		$file->move($path, $filename);
    		$data->image = $filename;
    	}
    	$data->status = $request->rdoStatus;
    	$data->updated_at = new DateTime;
    	$data->save();

    	return redirect()->route('getListBanner')->with(['flash_level' => 'success', 'flash_message' => 'Cập nhật Banner thành công !!', 'flash_icon' => 'recycle']);

    }


    //ajax 
    public function changeStatus($id){
        if (Request::ajax()) {
            # code...
            $idBanner = (int)Request::get('id'); 
            if (!empty($idBanner)) {
                # code...
                $data = Banner::find($idBanner);
                if ($data->status == 1) {
                    $data->status = 0;
                    $data->save();

                    return 0;
                }else{
                    $data->status = 1;
                    $data->save();

                    return 1;
                }
            }
        }
    }
}
