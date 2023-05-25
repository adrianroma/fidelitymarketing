<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SoapClient;
use Session;
use Carbon\Carbon;

class PromoModel extends Model
{
    use HasFactory;

    public $client = NULL;

    public $pagination = [];


    public function catalogs()
    {


        $sessionObject =  Session::get('sessionID');

        $_catalogs =  Session::get('catalogs');

        if ($_catalogs == NULL) {

            Session::forget('catalogs');

            $sessionID = $sessionObject[0]['session'];

            $this->callSoapPromo();

            $orders = ['criteria' => '', 'columnName' => ''];


            $pagination = [
                'InitLimit' => '0',
                'rowCount' => '20',
                'orders' => $orders,
                'recordsTotal' => '',
                'actualPage' => '',
                'totalPages' => ''
            ];

            $params = ['GetCatalogsRequest' => ['sessionID' => $sessionID, 'dateFrom' => '', 'dateTo' => '', 'pagination' => $pagination]];

            $response = $this->client->__soapCall("GetCatalogs", $params);


            if ($response->answerCode == '0') {


                $catalogos = $response->catalogList;

                $_catalogs = [];

                foreach ($catalogos as $catalog) {

             
                  
    
                    if ($catalog->flags->enable==true) {

    

                        $_catalog = [];
                        $_catalog['id'] =  $catalog->id;
                        $_catalog['description'] =  $catalog->description;
                        $_available = NULL;

                        if (property_exists($catalog, 'dateTo')) {
                            $endDate = $catalog->dateTo;
                            if (Carbon::now()->startOfDay()->gte($endDate)) {
                                $_available = FALSE;
                            } else {
                                $_available = TRUE;
                            }
                        }

                        if ($_available == NULL || $_available == TRUE) {
                            array_push($_catalogs, $_catalog);
                        }
                    }
                }
            }


          
            Session::push('catalogs', $_catalogs);
        }

        return $_catalogs;
    }

    public function categories()
    {

        $sessionObject =  Session::get('sessionID');

        $prizesCategories =  Session::get('categories');

    

        if($prizesCategories==NULL){



        Session::forget('categories');

        $sessionID = $sessionObject[0]['session'];

        $this->callSoapPromo();

        $orders = ['criteria' => '', 'columnName' => ''];

        $pagination = [
            'InitLimit' => '0',
            'rowCount' => '100',
            'orders' => $orders,
            'recordsTotal' => '',
            'actualPage' => '',
            'totalPages' => ''
        ];

        $params = ['GetPrizesCategoriesRequest' => ['sessionID' => $sessionID, 'onlyOutstandingPrizeCategory' => '', 'filterPrize' => '', 'pagination' => $pagination]];



        $response = $this->client->__soapCall("GetPrizesCategories", $params);


        $prizesCategories = [];


        if ($response->answerCode == '0') {


            $categories = $response->categoryList;

            foreach ($categories as $category) {

                $prize = [];

                $prize['id'] = $category->id;

                $prize['description'] = $category->description;

                $prize['imageFile'] = $category->imageFile;

                array_push($prizesCategories, $prize);
            }

        }

        Session::push('categories', $prizesCategories);
            
        }

        return $prizesCategories;
    }

    public function paginate (){

        return $this->pagination;

    }


    public function prizes($catalogId = '', $categoryId = '',$criteria ='',$columnName='',$page=0,$minPoints=0,$maxPoints=0,$rowCount=20)
    {

        $sessionObject =  Session::get('sessionID');

        $sessionID = $sessionObject[0]['session'];

        $this->callSoapPromo();

        $_available_columns = ['PRIZE_POINTS','PRIZE_NAME','PRIZE_ID','PRIZE_PRIZE_CATEGORY_ID'];

        $_available_criteria = [0,1];

        $criteria = 0;
        $columnName = 'PRIZE_POINTS';

        $orders = ['criteria' => $criteria, 'columnName' => $columnName];

        $page = $page*20;

        $pagination = [
            'InitLimit' => $page,
            'rowCount' =>$rowCount,
            'orders' => $orders,
            'recordsTotal' => '',
            'actualPage' => '',
            'totalPages' => ''
        ];

        $params = [
                'GetPrizesRequest' => [
                'sessionID' => $sessionID,
                'prize_ID' => '',
                'catalog_ID' => $catalogId,
                'code' => '',
                'category_ID' => $categoryId,
                'stock' => '',
                'onlyOutstandingPrize' => '',
                'onlySeasonal' => '',
                'filterKindSeenAndRedeemed' => '',
                'lastDays' => '',
                'prizesCount' => '',
                'pagination' => $pagination
            ]
        ];


        $_pagination = [];

        $response = $this->client->__soapCall("GetPrizes", $params);

        if (property_exists($response, 'pagination')){ 
        $_pagination['recordsTotal'] =$response->pagination->recordsTotal;
        $_pagination['totalPages'] =$response->pagination->totalPages;
        $_pagination['actualPage'] =$response->pagination->actualPage;
        }else{
            $_pagination['recordsTotal'] =0;
            $_pagination['totalPages'] = 0;
            $_pagination['actualPage'] =0;  
        }

        $this->pagination=$_pagination;

        $_prizes = [];

        if ($response->answerCode == '0') {


            try{
            $prizes = $response->PrizeList;

            
            $allPoints = [];

            foreach ($prizes as $prize) {

                $_prize = [];

                if ($prize->flags->enabled && $prize->stock != '0') {

                    $_prize['id'] = $prize->id;
                    $_prize['name'] = $prize->name;
                    if (property_exists($prize, 'description')) {
                        $_prize['description'] = $prize->description;
                    }
                    $_prize['points'] = $prize->points;

                    array_push($allPoints,$prize->points);

                    $_prize['money'] = $prize->money;
                    $_prize['stock'] = $prize->stock;
                    $_prize['prizeCode'] = $prize->prizeCode;
                    $_prize['categoryId'] = $prize->categoryId;
                    $_prize['image'] = $prize->pathImageAbsolute;

                    if($maxPoints==0 && $minPoints==0){

                     array_push($_prizes, $_prize);

                    }else{

                        if (($prize->points >= $minPoints && $prize->points <= $maxPoints) ){

                            array_push($_prizes, $_prize);

                        }

                    }

                 
                }
            }
        }catch(\Exception $e){

            return $_prizes;
        }
        }

        if($maxPoints!=0 && $minPoints!=0){
            $_pagination['recordsTotal'] =count($_prizes);
            $_pagination['totalPages'] = ceil(count($_prizes)/6);
            $_pagination['actualPage'] =0;  
        
            $this->pagination=$_pagination;

        }

        return $_prizes;
    }


    public function callSoapPromo()
    {


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


        $this->client = new SoapClient($url, $options);
    }
}
