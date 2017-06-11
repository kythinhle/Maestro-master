<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use App\Content;
use DateTime;

class ContentController extends Controller
{
    public function getList(){
    	$data = Content::select('id','title','content','display_number','status','created_at')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.content.list',compact('data'));
    }

    public function getAdd(){
    	return view('admin.content.add');
    }
    public function postAdd(ContentRequest $request){
    	$data = new Content;
    	$data->title = $request->txtTitle;
    	$data->content = $request->txtContent;
    	$data->display_number = $request->txtDisplayNumber;
    	$data->status = $request->rdoStatus;
    	$data->created_at = new DateTime;
    	$data->save();

    	return redirect()->route('getListContent')->with(['flash_level' => 'success', 'flash_message' => 'Thêm Content thành công !!', 'flash_icon' => 'book']);
    }

    public function getDel($id){
    	$del = Content::findOrFail($id);
    	$del->delete();

    	return redirect()->route('getListContent')->with(['flash_level' => 'success', 'flash_message' => 'Xóa Content thành công !!','flash_icon' => 'trash']);
    }

    public function getEdit($id){
    	$data = Content::findOrFail($id);
    	return view('admin.content.edit', compact('data'));
    }
    public function postEdit(ContentRequest $request, $id){
		$data                 = Content::findOrFail($id);
		$data->title          = $request->txtTitle;
		$data->content        = $request->txtContent;
		$data->display_number = $request->txtDisplayNumber;
		$data->status         = $request->rdoStatus;
		$data->updated_at     = new DateTime;
		$data->save();

		return redirect()->route('getListContent')->with(['flash_level' => 'success', 'flash_message' => 'Cập nhật Content thành công !!', 'flash_icon' => 'recycle']);
    }
}
