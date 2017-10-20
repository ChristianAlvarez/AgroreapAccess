<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Companies;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AuthenticateDns(Request $request)
    {

        $requests = $request->only('dns', 'company'); 
        
        $dns     = $requests['dns'];
        $cpny_id = $requests['company'];

        $data = [
            'Dns'    => $dns,
            'Cpny_id'   => $cpny_id
        ]; 

        $rules = [
            'Dns'       => 'required',
            'Cpny_id'   => 'required'
        ];

        $messages = [
            'Dns.required'      => 'DNS es requerido',
            'Cpny_id.required'  => 'Rut Compañia es requerido',
        ];       

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'error validacion' => $validator->errors()
            ]);
        }else {

            $companies = Companies::where('cpny_access', $dns)
                              ->where('cpny_id', $cpny_id)
                              ->get();

            if($companies->isEmpty()){

                return response()->json([
                    'Codigo' => "2"
                ]);

            }
            else
            {

                return response()->json([
                    'Codigo' => "1"
                ]);
                
            }

        }      

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDns2($dns, $cpny_id)
    {


        $companies = Companies::where('cpny_access', $dns)
                              ->where('cpny_id', $cpny_id)
                              ->get();

        if($companies->isEmpty()){

            return response()->json([
                'Codigo' => "2"
            ]);

        }
        else
        {

            return response()->json([
                'Codigo' => "1"
            ]);
            
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $companies = Companies::all();

    
            return response()->json([
                'companies' => $companies
            ]);
            

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
