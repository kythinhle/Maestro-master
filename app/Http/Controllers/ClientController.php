<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Content;

class ClientController extends Controller
{
   public function getUpdate($id){
   		if (Request::ajax()) {
   			$id = Request::get('id');
   			$number = Request::get('number');
   			$data = Content::findOrFail($id);

   			$data->display_number = $number;
   			$data->save();
   			return "Success";
   		}
   }
}
