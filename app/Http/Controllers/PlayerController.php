<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lib\TimeHelper;

use App\Models\Player;


class PlayerController extends Controller
{
    public function index(TimeHelper $timeHelper)
    {

        $all_players = Player::list();

        $timeHelper->getConfig();

        $data = json_encode($all_players);

        return response($data, 200)->header('Content-Type', 'application/json');
    }
    
    public function create(Request $request){

        try{
            $player = new Player();
            $player->name = $request->name;
            $player->active = true;
            $player->save();
            $data = ['status'=>'true'];
        }catch(\Exception $e){
            $data = ['status'=>false,'message'=>$e->getMessage()];            
        }
        return response($data, 200)->header('Content-Type', 'application/json');

    }
}
