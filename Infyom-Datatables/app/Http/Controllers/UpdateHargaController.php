<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use DB;
use App\Models\produk;
use App\Models\customers;
use App\Models\salesprice;
use App\updateharga;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
class UpdateHargaController extends Controller
{
    /**
     * Return View file
     *
     * @var array
     */
    public function importExport()
    {
    	return view('importExport');
    }

	/**
     * File Export Code
     *
     * @var array
     */
	public function downloadExcel(Request $request, $type)
	{
		$customerdata = customers::select(
			'id',
			'customerName',
			\DB::raw("concat(customers.customerName, '_', customers.id) as `name`"),
			'customerCode')->get();
		$joindata = customers::join('sales_prices', 'sales_prices.customerID', '=', 'customers.id')
		->select(
			'customers.id',
			'customers.customerName',
			\DB::raw("concat(customers.customerName, '_', customers.id) as `name`"),
			'customers.customerCode',
			'sales_prices.price')->get();
		$datajoin = [];
		$newArray = [];
		$customerID = []; 
		$newArray[] = ['SKU','Nama Produk','Satuan'];
		foreach ($customerdata as $cust) {
			array_push($newArray[0],$cust['name']);
			array_push($customerID,$cust['id']);	
		}


		$data = produk::select(
			'products.productCode',
			'products.ProductName',
			'products.unitText'
			)
		->get();

		$no = 1;
		foreach ($data as $key => $cekout) {
			$newArray[$no]['sku'] = $cekout['productCode'];
			$newArray[$no]['nama'] = $cekout['ProductName'];
			$newArray[$no]['satuan'] = $cekout['unitText'];
			// $newArray[$no]['price'] = $cekout['price'];
			// $newArray[$key]['id'] = $cekout['ids'];
			foreach ($customerdata as $custids) {
				$sales_prices = salesprice::select(
					'price',
					'id'
					)->where('customerID', '=', $custids['id'])
				->where('productCode', '=', $cekout['productCode'])
				->get();
				if ($sales_prices->count() === 0) {
					$newArray[$no][$custids['name']] = '0.00';
				}else{
					$sales_prices = $sales_prices->first();
					$newArray[$no][$custids['name']] = $sales_prices->price;
				}
			}
			$no++;
			
		}
		// foreach ($data as $payment) {
		// 	$newArray[] = $payment->toArray();
		// }
		
		// echo "<pre>";
		// print_r($newArray);
		// echo "</pre>";
		// die();
		return Excel::create('update_example_cek', function($excel) use ($newArray,$data,$customerdata) {
			
			$excel->sheet('mySheet', function($sheet) use ($newArray,$data,$customerdata)
			{
				$sheet->fromArray($newArray, null, 'A1', false, false);
			});
		})->download($type);

	}

	
	public function importExcel(Request $request)
	{
		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();

			$data = Excel::load($path, function($reader) {
				
			})->get();
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			die();

			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
						foreach ($value as $v) {		
							$insert[] = ['customerID' => $v['sku'],
							'productID' => $v['sku'],
							'productCode' => $v['sku']];
						}
					}
				}

				
				if(!empty($insert)){
					salesprice::insert($insert);
					return back()->with('success','Insert Record successfully.');
				}

			}

		}

		return back()->with('error','Please Check your file, Something is wrong there.');
	}
}