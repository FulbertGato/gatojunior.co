<?php

namespace App\Http\Controllers;

use App\Models\slide;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{

    public function showSlider(){

        $id=1;
        $slide = slide::find($id);
        //dd($slide);
        return view('backend.frontupdate.home.slide.show',compact('slide'));

    }

    public function updateSliderImage(Request $request){

        $validateData = $request->validate(
            [
                'file' => 'required|mimes:png,jpg,jpeg,svg',
            ],
            [
                'file.required' => ' Vous devez selectionnez un fichier',
            ]

        );
        $id=1;
        $slide_image = $request->file('file');
        $name_gen = 'freelancer';
            $img_ext = strtolower($slide_image->getClientOriginalExtension());
            $img_name= $name_gen.'.'.$img_ext;
            $up_location = 'frontend/images/others/';
            $last_img =  $up_location.$img_name;
            $slide_image->move($up_location,$img_name);
           // unlink($old_image);
            Slide::find($id)->update([


                'image_slide'=>$last_img,

            ]);

    }

    public function updateSlider(Request $request){
        $validateData = $request->validate(
            [
                'name' => 'string|required|min:4',
                'short_des'=> 'string|required',
                'client_reviews_text'=> 'string|required',
                'long_des'=> 'string|required',
                'button_text'=> 'string|required',
                'experience'=> 'string|required',
                'year_experience'=> 'required|integer',
                'quantity_project'=> 'required|integer',
                'client_reviews'=> 'required|integer',


            ],
            [
                'name.required' => ' Champ requis',
            ]
        );
        $id=1;

        

            Slide::find($id)->update([

                'name'=>$request->name,
                'short_des'=>$request->short_des,
                'long_des'=>$request->long_des,
                'year_experience'=>$request->year_experience,
                'experience'=>$request->experience,
                'quantity_project'=>$request->quantity_project,
                'project_text'=>$request->project_text,
                'client_reviews'=>$request->client_reviews,
                'client_reviews_text'=>$request->client_reviews_text,
                'button_text'=>$request->button_text,
            ]);





        return Redirect()->back();



    }

    public function homeU(){
        $id_slide=1;
        $slide = slide::find($id_slide);
        $services = service::get();
        return view('frontend.home', compact('slide','services'));
    }
}
