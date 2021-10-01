<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paiement;
class PaiementController extends Controller
{
    public function  checkout(){
        return  view('paiement.checkout');
    }

    public function payAction(Request $request){
        
       $request->validate([
        'email' => 'email|required',
        'nom' => 'string|required',
        'montant' => 'required',
        'paymethode' => 'required',
          ]); 
       $uniqueid=uniqid();
      // dd($request);
    

    if($request->paymethode == "paytech"){
        $data=[
            'email' => $request->email,
            'prix'=>  100,// $request->montant,
            'ref'=>$uniqueid,
            'nom'=> $request->nom,
           ];
        $paiement = new Paiement();
        $paiement->paytech_paiement($data);
        //die('zebi');
    }

    if($request->paymethode == "paygate"){
        $data=[
          'email' => $request->email,
          'montant'=> 100, //$request->montant,
          'nom'=> $request->nom,
          'transaction_id'=>$uniqueid,
      ];
      $paiement = new Paiement();
      $paiement->paygate($data);
    }

    

    if($request->paymethode == "paypal"){
        dd($request);
    }

    dd('aucun if');


    }

    public function  paySuccess(Request $request){
        dd($request);
       /*$paiement = new \App\Models\Paiement();
        $paiement->email = $request->email;
        $paiement->montant = $request->montant;
        $paiement->nom_client= $request->nom;
        $paiement->pay_method=$request->paymethode;
        $paiement->note=$request->note;
        $paiement->status='payé';*/
        return  view('paiement.success');
    }
    public function  payCancel(Request $request){
        dd($request);
        return  view('paiement.cancell');
    }

    public function  ipnPaytech(Request $request){
        dd($request);
        $type_event = $request->type_event;//Input::get('');
        $custom_field = json_decode($request->custom_field, true);
        $ref_command = $request->ref_command;
        $item_name = $request->item_name;
        $item_price =  $request->item_price;
        $devise =  $request->devise;;
        $command_name =  $request->command_name;
        $env = $request->env;
        $token = $request->token;
        $api_key_sha256 = $request->api_key_sha256;
        $api_secret_sha256 = $request->api_secret_sha256;
        if(hash('sha256', env('API_KEY_PAYTECH_SECRET')) === $api_secret_sha256 && hash('sha256', env('API_KEY_PAYTECH')) === $api_key_sha256)
        {
            //from PayTech
        }
        else{

            return  redirect('checkout');
        }
       
    }


}
