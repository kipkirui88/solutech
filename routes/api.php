<?php

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Status;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@show');
Route::post('users', 'UserController@store');
Route::put('users/{user}', 'UserController@update');
Route::delete('users/{user}', 'UserController@delete');

Route::get('status', 'StatusController@index');
Route::get('status/{status}', 'StatusController@show');
Route::post('status', 'StatusController@store');
Route::put('status/{status}', 'StatusController@update');
Route::delete('status/{status}', 'StatusController@delete');

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}


class StatusController extends Controller
{
    public function index()
    {
        return Status::all();
    }

    public function show(Status $status)
    {
        return $status;
    }

    public function store(Request $request)
    {
        $status = Status::create($request->all());

        return response()->json($status, 201);
    }

    public function update(Request $request, Status $status)
    {
        $status->update($request->all());

        return response()->json($status, 200);
    }

    public function delete(Status $status)
    {
        $status->delete();

        return response()->json(null, 204);
    }
}


Route::get('/status', function (Request $request) {
    return $request->status();
});
