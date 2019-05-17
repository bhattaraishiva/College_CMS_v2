<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Program;
use App\Semester;
use Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          if(Session::has('adminsession')){            
            $course  = Course::all();
            return view('Admin.course.show_course')->with("courses",$course);   
        }else{
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                                
        }
    }

    public function create()
    {
         if( Session::has('adminsession') ){
            $semester = Semester::all();
            return view('Admin.course.add_course')->with("semesters",$semester)->with('programs',Program::all());
        
        }else{
            
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                    
        }
    }

    
    public function store(Request $request)
    {
        
         if( Session::has('adminsession') ){  
           
            $this->validate($request,[
            'C_code' => 'required|string|max:255',
            'C_name' => 'required|string|max:255', 
            'semester_id' => 'required', 
            'program_id' => 'required', 
            'slug'=>'required',
            'status' => 'required',             
            ]);     

            $course = new Course;
            $course->program_id = $request->input('program_id');
            $course->semester_id = $request->input('semester_id');
            $course->C_code = $request->input('C_code');
            $course->C_name = $request->input('C_name');
            $course->slug = $request->input('slug');
            $course->status = $request->input('status');
            //dd($course);
            $course->save();

            return redirect('/course/view')->with('success','Course added ');

        }else{            
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
         if(Session::has('adminsession')){
            
            $course = Course::find($id);
            $program = Program::where('status','=',1)->get();
            $semester = Semester::where('status','=',1)->get();
            // return dd($course);
            return view('Admin.course.update_course')->with('course',$course)
                                                     ->with('programs',$program)
                                                     ->with('semesters',$semester);

            // return redirect("/course/update/$id")->with('courses',$course);

        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
    }

    public function update(Request $request, $id)
    {
          if( Session::has('adminsession') ){  

            $this->validate($request,[
            'C_code' => 'required|string|max:255',
            'C_name' => 'required|string|max:255', 
            'program_id'=>'required',
            'semester_id' => 'required', 
            'slug'=>'required',
            //'course_id' => 'required',              
            ]);            

            $course = Course::find($id);
            $course->semester_id = $request->input('semester_id');
            $course->program_id = $request->input('program_id');
            $course->C_code = $request->input('C_code');
            $course->C_name = $request->input('C_name');
            $course->slug = $request->input('slug');
            $course->status = $request->input('status');
            $course->save();

            return redirect('/course/view')->with('success','course updated');

        }else{            
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
    }

    
   public function destroy($id)
    {
      if(Session::has('adminsession')){
            
            $course = Course::find($id);
            $course->delete();     

            return redirect('/course/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
    }

    public function toogle_status($id){

        if(Session::has('adminsession')){
            
            $course = Course::find($id);
            $course->status =  1 - $course->status;           
            $course->save();            

            return redirect('/course/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }
    }
}
