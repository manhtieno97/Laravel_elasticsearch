<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
class SearchController extends Controller
{
     public function index(Request $request)
    {
        $data['search']=$data['total']='';
        if($request->has('search')  && $request->search !=''){
            $data['search']=$request->input('search');
           /* $params = [
               "match" => [
                        "title" =>  $request->input('search')
                    ]
            ];*/
            $params = [
               "multi_match" => [
                        "query" =>  $request->input('search'),
                        "fields" => ["title","body"]
                    ],
                
            ];

        	 $data['items'] = \App\Post::searchByQuery($params);
             $data['total']= count($data['items']->toArray());
             // $data['items'] = Post::where('title','LIKE','%'.$request->input('search').'%')->paginate(15);
            // $items = Post::search($request->input('search'))->toArray();
        }else{
            $data['items']=Post::orderBy('id','desc')->paginate(5);
            $data['total']= $data['items']->toArray()['total'];
        }

        return view('search',$data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required',
        ]);

        $item = Post::create($request->all());
        $item->addToIndex();

        return redirect()->back();
    }
}
