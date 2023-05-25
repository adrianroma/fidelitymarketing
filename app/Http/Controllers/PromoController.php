<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromoModel;

class PromoController extends Controller
{

    public $promo;



    public function index(Request $request)
    {

       $this->promo = New PromoModel();

        //$this->promo->catalog();

        if ($request->has('page')) {
            if('0'==$request->input('page')){
                $page = 0;
            }else{
                $page = $request->input('page');
            }
        }else{
            $page = 0;
        }
        

        if ($request->has('catalog')) {
            if('0'==$request->input('catalog')){
            $catalogId = '';    
            }else{
            $catalogId = $request->input('catalog');
            }
        }else{
            $catalogId = '';
        }

        if ($request->has('category')) {
            if('0'==$request->input('category')){
                $categoryId = '';
            }else{
                $categoryId = $request->input('category');
            }
        }else{
            $categoryId = '';
        }

        if ($request->has('criteria')) {
            if('0'==$request->input('criteria')){
                $criteria = '';
            }else{
                $criteria = $request->input('criteria');
            }
        }else{
            $criteria = '';
        }

        if ($request->has('column')) {
            if('0'==$request->input('column')){
                $columnName = '';
            }else{
                $columnName = $request->input('column');
            }

        }else{
            $columnName = '';
        }


        if ($request->has('min')) {
            if('0'==$request->input('min')){
                $minPoints = 0;
            }else{
                $minPoints = $request->input('min');
            }

        }else{
            $minPoints = 0;
        }


        if ($request->has('max')) {
            if('0'==$request->input('max')){
                $maxPoints = 0;
            }else{
                $maxPoints = $request->input('max');
            }

        }else{
            $maxPoints = '';
        }

        if ($request->has('rowcount')) {
            if('0'==$request->input('rowcount')){
                $rowCount = 20;
            }else{
                $rowCount = $request->input('rowcount');
            }

        }else{
            $rowCount = 20;
        }


       $catalogs = $this->promo->catalogs();
       $categories = $this->promo->categories();
       $prizes = $this->promo->prizes($catalogId,$categoryId,$criteria,$columnName,$page,$minPoints,$maxPoints,$rowCount);
       $pagination = $this->promo->paginate();
       $all_data =[];
       $all_data['catalogs'] = $catalogs;
       $all_data['categories'] = $categories;
       $all_data['prizes'] = $prizes;
       $all_data['pagination'] = $pagination;
       $data = json_encode($all_data);


       return response($data, 200)->header('Content-Type', 'application/json');

    } 
}
