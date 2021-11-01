<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','detail']);
    }
    public function index(){
        $data = Article::latest()->paginate(5);

        return view('articles.index',[
            'articles' => $data
        ]);
    }

    public function detail($id){
        $data = Article::find($id);

        return view('articles.detail',[
            'article'=>$data
        ]);
    }
    
    public function add(){
        // $data=[
        //     ["id"=>1,"title"=>"News"],
        //     ["id"=>2,"title"=>"Technology"],
        // ];
        $data = Category::all();

        return view('articles.add',[
            'categories' => $data
        ]);
    }

    public function create(){
        $validator = validator(request()->all(),
                    [
                        'title'=> 'required',
                        'body'=> 'required',
                        'category_id'=> 'required',
                    ]
    );
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $articles = new Article;
        $articles->title = request()->title;
        $articles->body = request()->body;
        $articles->category_id = request()->category_id;
        $articles->save();
        return redirect('/articles');
    }

    public function delete($id){
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles')->with('info','Article Deleted');
    }
}
