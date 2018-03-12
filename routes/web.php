<?php

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


//dd(resolve('App\Billing\Stripe'));



Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

// controller => PostsController
// Eloquent model => Post
// migration => create_posts_table


// Route::get('/tasks', 'TasksController@index');
// Route::get('/tasks/{task}', 'TasksController@show');



// use App\Task;

// Route::get('/tasks', function () {
//     // return view('welcome', [
//     //     'name' => 'Laracasts'

//     // ]);

//     // return view('welcome')->with('name', 'World');
    
//     // $name = 'Wesley';
//     // $age = '21';
//     // return view('welcome')->with('name', $name);
//     // return view('welcome', compact('name', 'age'));

//     // $tasks = [
//     //     'Go to the store',
//     //     'Finish my screencast',
//     //     'Clean the house'
//     // ];

//     // return view('welcome', compact('tasks'));

//     // $tasks = DB::table('tasks')->get();
//     // return view('tasks.index', compact('tasks'));

//     // $tasks = App\Task::all();
//     // return view('tasks.index', compact('tasks'));

//     $tasks = Task::all();
//     return view('tasks.index', compact('tasks'));
// });

// Route::get('/tasks/{task}', function ($id) {

//     //$task = DB::table('tasks')->find($id);

//     // $task = App\Task::find($id);
//     // return view('tasks.show', compact('task'));

//     $task = Task::find($id);
//     return view('tasks.show', compact('task'));
// });
