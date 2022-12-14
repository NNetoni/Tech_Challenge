<?php

use App\Models\Commit;
use App\Models\Repositorio;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

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
    return view('inicio');
});

Route::post('pesquisar-login', function (Request $request) {

    $nomeLogin = $request->login;
    $url = "https://api.github.com/users/".$nomeLogin."/repos";
    $response = Http::get($url);
    $repos = $response->json();


    return view('selecionar', ['array' => $repos]);
});
    
    Route::post('selecionar-repos', function (Request $request) {

        $repositorio = $request->repos;
        $url = $request->url;
        $urlCommits = $url."/commits";
        $response = Http::get($urlCommits);
        $repos = $response->json();
        $reposi = array($repositorio);
        $i=0;


    
        for (;$i <= count($repos);$i++) {
            $data = $repos[$i]['commit']['author']['date'];
            $id =$repos[$i]['sha'];

            Commit::firstOrCreate([
                'login' => $repos[$i]['author']['login'],
                'repositorio' => $request->repos,
                'commit' => $id,
                'data' => substr("$data", 0, 10)
            ]);
            break;
        }

        return view('gerargrafico',['reposi' => $reposi]);
    });

    