<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;
use DB;

class ArticleController extends Controller
{
    //
    function show(){
        $articles = Article::all();// DB::table('articles')->orderBy('id','DESC')->get();
        return view('list')->with(compact('articles'));
    }
    function addArticle(){
        return view('add');
    }

    function saveArticle(Request $req){
        //return $req->all();
        $validator = Validator::make($req->all(),[
            'title'=> 'required | max:255',
            'description' => 'required',
            'author' => 'required | max:200'
        ]);
        if($validator->passes()){
             //insert record in data base
             $article = new Article;
             $article->title = $req->title;
             $article->description = $req->description;
             $article->author = $req->author;
             $article->save();

             $req->session()->flash('msg','Article save successfully');
             return redirect('articles');

        }else{
             //return with error
             return redirect('/articles/add')->withErrors($validator)->withInput();
        }
    }
    function editArticle($id,Request $req){
        $article = Article::where('id',$id)->first();
        if(!$article){
            $req->session()->flash('errorMsg','Record not found');
            return redirect('articles');
        }
        return view('edit')->with(compact('article'));
    }

    function updateArticle($id,Request $req){
         $validator = Validator::make($req->all(),[
            'title'=> 'required | max:255',
            'description' => 'required',
            'author' => 'required | max:200'
        ]);
        if($validator->passes()){
            $article  = Article::find($id);
            $article->title = $req->title;
            $article->description = $req->description;
            $article->author = $req->author;
            $article->save();
            $req->session()->flash('msg','Article UPDATE successfully');
            return redirect('articles');
        }else{
            return redirect('/articles/edit/')->withErrors($validator)->withInput();
        }
    }
    function deleteArticle($id,Request $req){
       $article = Article::where('id',$id)->first();
        if(!$article){
            $req->session()->flash('errorMsg','Record not found');
            return redirect('articles');
        }
        Article::where('id',$id)->delete();
        $req->session()->flash('msg','Recor d is deleted successfully');
        return redirect('articles');
    }
}
