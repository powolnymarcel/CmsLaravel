<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Categories;

class PostController extends Controller
{

    public function getPostIndex()
    {
        $posts= Post::orderBy('created_at','desc')->paginate(5);
        return view('admin.blog.index',['posts'=>$posts]);

        }

public function getBlogIndex()
    {
        $posts= Post::orderBy('created_at','desc')->paginate(5);
        foreach ($posts as $post){
            $post->texte=$this->texteCourt($post->texte,20);
        }
        return view('frontend.blog.index',['posts'=>$posts]);
    }

    public function getSinglePost($post_id,$end='frontend')
    {
        $post=Post::find($post_id);
        if(!$post){
            return redirect()->back('blog.index')->with(['fail'=>"Post non trouvé"]);
        }

        return view($end.'.blog.single',['post'=>$post]);

    }

    public function getCreationPost()
    {
        return view('admin.blog.creation_post');

    }
    public function postCreationPost(Request $request)
    {
        $this->validate($request,[
            'titre'=>'required|max:120|unique:posts',
            'auteur'=>'required|max:80',
            "texte"=>'required'
        ]);
        $post= new Post()  ;
        $post->titre=$request['titre'];
        $post->auteur=$request['auteur'];
        $post->texte=$request['texte'];
        $post->save();
        //Attcher categories
        return redirect()->route('admin.index')->with(['success'=>'post crée avec success']);
    }


    public function getUpdatePost($post_id){
        $post=Post::find($post_id);
        if(!$post){
            return redirect()->back('blog.index')->with(['fail'=>"Post non trouvé"]);
        }
        //Trouver les categories
        return view('admin.blog.editer-post',['post'=>$post]);

    }

    public function postUpdatePost(Request $request){

        $this->validate($request,[
            'titre'=>'required|max:120',
            'auteur'=>'required|max:80',
            'texte'=>'required',
        ]);
        $post= Post::find($request['post_id']);
        $post->titre=$request['titre'];
        $post->auteur=$request['auteur'];
        $post->texte=$request['texte'];
        $post->update();

        //Categories to do

    }


private function texteCourt($texte,$taille){
    if (str_word_count($texte,0)>$taille){
        $mots= str_word_count($texte,2);
        $pos=array_keys($mots);
        $texte=substr($texte,0,$pos[$taille]). '...';
    }
    return $texte;
}




















}
