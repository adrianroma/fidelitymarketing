<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use SoapClient;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;

class SoapValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        $sessionObject =  Session::get('sessionID');

  
        $sessionID = NULL;

        if(isset($sessionObject[0]['session'])){

            $sessionID = $sessionObject[0]['session'];

        }
        


        if ($sessionID == NULL || $sessionID == '') {


            try {

                Session::forget('sessionID');

                $url = 'https://test.fidely.net/fnet3web/proxy/wsdl_pz.php?v=01.19';

                $params = [
                    'SynchroAndLoginRequest' => [
                        'kind'    => '99',
                        'userName'  => 'opHolcimMXWeb',
                        'password'  => '0pV3W3bH0lMX%',
                    ]
                ];
                $options = array(
                    'cache_wsdl' => 0,
                    'trace' => 1,
                    'stream_context' => stream_context_create(array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    ))
                );

                $client = new SoapClient($url, $options);
                $response = $client->__soapCall("SynchroAndLogin", $params);


                $sessionSave = $response->sessionID;
                $sessionObject = ['session'=>$sessionSave];

                Session::push('sessionID', $sessionObject);
       

            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }else{

            
        }



        return $next($request);
    }
}
