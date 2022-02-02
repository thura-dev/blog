<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','detail']);
    }

    public function index(){
        $articles = Article::latest()->paginate(5);
        return view('articles.index',compact('articles'));
    }

    public function detail($id){
        $data=Article::find($id);
        return view('articles.detail',[
            'article'=>$data
        ]);
    }
   public function add(){

    $data =[
      [  "id"=>1,"name"=>"Tech"],
      [  "id"=>2,"name"=>"New"],
    ];

     return view('articles.add',[
         'categories'=>$data
     ]);
   }
   public function create(ArticleStoreRequest $articleStoreRequest){
        Article::query()->create($articleStoreRequest->validated()+[
            'user_id'=>auth()->user()->id,
        ]);
        return redirect('/articles');
   }
  public function delete(Article $article){
      $this->authorize('model-delete',$article);



        // if(Gate::denies()){
        //     return back()->withErrors('Unauthorize');
        // }
        $article->delete();
        return redirect('/articles')->with('info',"Article Deleted");




  }

}



