<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;

class HomePageController extends Controller
{
    public function index()
    {
    $heroData = Post::where('category_id','4')->select('title','body','image')->orderBy('created_at')->first(); 
    $heroData->imageFullPath = $this->getImageUrlAttribute($heroData->image);
    $stats = Post::where('category_id','11')->select('title','body','image')->orderBy('created_at')->get();
    $stats->map(function ($stat){
        $stat->imageFullPath = $this->getImageUrlAttribute($stat->image);
        return $stat;
    });
    $whyUs = Post::where('category_id','9')->select('title','body','image')->orderBy('created_at')->get();
    $whyUs->map(function ($data){
        $data->imageFullPath = $this->getImageUrlAttribute($data->image);
        return $data;
    });
    $clients = Post::where('category_id','7')->select('title','body','image')->orderBy('created_at')->get();
    $clients->map(function ($data){
        $data->imageFullPath = $this->getImageUrlAttribute($data->image);
        return $data;
    }); 
    $testimonials = Post::where('category_id','8')->select('title','body','image','excerpt')->orderBy('created_at')->get()->take(2);
    $testimonials->map(function ($data){
        $data->imageFullPath = $this->getImageUrlAttribute($data->image);
        return $data;
    }); 
    $services = Post::where('category_id','10')->select('title','body','image','excerpt')->orderBy('created_at')->get()->take(3);
    $services->map(function ($data){
        $data->imageFullPath = $this->getImageUrlAttribute($data->image);
        return $data;
    }); 
    return Inertia::render('Welcome',[
        'hero'=> $heroData,
        'stats'=> $stats,
        'whyUs'=> $whyUs,
        'clients'=>$clients,
        'testimonials'=> $testimonials,
        'services'=>$services
    ]);
    }
    public function getImageUrlAttribute($value)
    {
        return env('APP_URL').'/storage/'.$value;
    }
    public function aboutUs()
    {
        $aboutUs = Page::where('slug','about-us')->first();
        $aboutUs->imageFullPath = $this->getImageUrlAttribute($aboutUs->image);
        return Inertia::render('About',[
            'aboutUs'=> $aboutUs,
        ]);
    }
    public function contactUs()
    {
        $contactUs = Page::where('slug','contact-us')->first();
        $contactUs->imageFullPath = $this->getImageUrlAttribute($contactUs->image);
        return Inertia::render('ContactUs',[
            'contactUs'=> $contactUs,
        ]);
    }
    public function contactPost(Request $request)
    {
        $attributes = $request->validate([
            'name'=>'required',
            'email'=>['required','email'],
            'message'=>'required'
        ]);
        ContactUs::create($attributes);
        return Redirect::back();
    }
    public function project()
    {
        $projects = Post::where('category_id','5')->select('title','body','image','excerpt')->orderBy('created_at')->get();
        $projects->map(function ($data){
            $data->imageFullPath = $this->getImageUrlAttribute($data->image);
            return $data;
        }); 
        return Inertia::render('Projects',[
            'projects'=>$projects
        ]);
    }
}
