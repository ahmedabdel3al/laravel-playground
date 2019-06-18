<?php
use App\Post;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    /*  $post=factory(Post::class)->create();
    $post2=factory(Post::class)->create(['title'=>$post->title]);
    dd($post, $post2); */ 
    /* $post = Post::first();
    $post->title = "ahmed elsayed ";
    $post->save();
    return $post ;  */
    
     $post = Post::find(28);
    $post->title = "ahmed elsayed ";
    $post->save();
    return $post ;  
});
