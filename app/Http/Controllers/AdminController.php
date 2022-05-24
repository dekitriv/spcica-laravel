<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends MyController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/main/admin');
    }

    public function logFile(Request $request){
        $date = null;
        if($request->filled("date")){
            $date=strtotime($request->input("date"));
        }
        $content = null;
        if(Storage::disk("local")->exists("log.txt")){
            $content = Storage::get("log.txt");
            $content = explode("\r\n",$content);
            if($date){
                $newContent = [];
                foreach ($content as $item){
                    $items = explode("\t",$item);
                    if($date<strtotime($items[count($items) - 1])){
                        $newContent[] = $item;
                    }
                }
                $content = $newContent;
            }
        }


        return response()->json(["log"=>$content],200);
    }

}
