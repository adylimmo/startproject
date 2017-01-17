<?php

namespace App\Http\Controllers;

use App\DataTables\ajaxMasterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateajaxMasterRequest;
use App\Http\Requests\UpdateajaxMasterRequest;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\products;
use Response;
use DB;

class ajaxMasterController extends AppBaseController
{

    /**
     * Display a listing of the ajaxMaster.
     *
     * @param ajaxMasterDataTable $ajaxMasterDataTable
     * @return Response
     */
    public function index()
    {
        return redirect(route('home'));
    }


    /**
     * Show the form for creating a new salesorders.
     *
     * @return Response
     */
    public function ajaxcustomer()
    {
        DB::enableQueryLog();
        $search = @$_GET['term'];
        /*$hasil = DB::raw("
            select * from `products` 
            where status = '1' 
            and (productCode LIKE '%".$search."%' or productName LIKE '%".$search."%') 
            order by id desc
        ");

        
        $hasil = DB::table('products')
            ->where('status','1')
            ->where(DB::raw("(productCode LIKE '%".$search."%' or productName LIKE '%".$search."%')"))
            //->where('productCode','LIKE','%'.$search.'%')
            //->where('productName','LIKE','%'.$search.'%')
            ->select('*')
            ->orderBy('id', 'desc')->get();*/
        
        $hasil = DB::table('customers')
            ->where('status','active')
            ->where(function($query) use ($search){
                $query
                ->where('customerCode','LIKE','%'.$search.'%')
                ->orwhere('customerName','LIKE','%'.$search.'%')
                ->orwhere('contactPerson','LIKE','%'.$search.'%');
            })            
            ->select('*')
            ->orderBy('customerName', 'asc')->get();
        $res = array();
        foreach($hasil as $data)
        {
            $res[] = array(
                'id' => $data->customerName,
                'label' => '(' . $data->customerCode . ')' . $data->customerName,
                'cid' => $data->id,
                'ckode' => $data->customerCode,
                'cname' => $data->customerName,
                'ckontak' => $data->contactPerson,
                'caddr' => $data->address,
            );
        }
        echo json_encode($res);
        //dd(DB::getQueryLog());
    }
}
