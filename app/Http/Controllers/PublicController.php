<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\NewsletterUser;

class PublicController extends Controller
{
    public function homepage(){
        $articles = Article::where('is_published', true)->orderBy('updated_at', 'DESC')->take(3)->get();
        return view('welcome', compact('articles'));
    }
  
public function register (Request $request){
    $request->validate([
        'email'=>'required|email'
      ]);
          NewsletterUser::create(
          [
              'email'=>$request->email //fa riferimento al fillable, quindi se inseriamo campi non presenti nella fillable verranno ignorati
          ]);
    return redirect()->back();
          
        }
}
