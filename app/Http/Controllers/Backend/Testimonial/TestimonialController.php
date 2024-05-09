<?php

namespace App\Http\Controllers\Backend\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function manageTestimonial()
    {
        $data['testimonials'] = Testimonial::all();
        return view('Backend.testimonial.manage', $data);
    }
    public function addTestimonial()
    {
        return view('Backend.testimonial.create');
    }

    public function addTestimonialStor(Request $request)
    {
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->star = $request->star;

        if($request->hasFile('image')){
            $fileName = time().'_testimonial_image.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/testimonial'), $fileName);
            $testimonial->image =$fileName;
        }
        $testimonial->save();
        return redirect()->route('admin.manage_testimonial')->with('message', 'Testimonial Create Successfully, Thank You.');
    }
    public function editTestimonial($id)
    {   $data['testimonial'] = Testimonial::find($id);
        return view('Backend.testimonial.update', $data);
    }
    public function updateTestimonial(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->star = $request->star;

        if($request->hasFile('image')){
            @unlink(public_path('upload/testimonial/'.$testimonial->image));
            $fileName = time().'_testimonial_image.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/testimonial'), $fileName);
            $testimonial->image =$fileName;
        }
        $testimonial->save();
        return redirect()->route('admin.manage_testimonial')->with('message', 'Testimonial Update Successfully, Thank You.');
    }
    public function deleteTestimonial(Request $request)
    {
        $testimonial= Testimonial::find($request->testimonial_id);
        $path = public_path("upload/testimonial/".$testimonial->image);
        @unlink($path);

        $testimonial->delete();
        return redirect()->route('admin.manage_testimonial')->with('message', 'Delete Testimonial Successfully, Thank You.');
    }
    //Status section
    public function testimonialStatus($id)
    {
        $testimonial = Testimonial::find($id);
        if($testimonial->status == 0)
        {
            $testimonial->status = 1;
        }elseif($testimonial->status == 1)
        {
            $testimonial->status = 0;
        }
        $testimonial->update();
        return redirect()->route('admin.manage_testimonial');
    }
}
