<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Program;
use App\Semester;
use Session;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         if(Session::has('adminsession')){            
            $semester  = Semester::all();
            return view('Admin.Semester.show_semester')->with("semesters",$semester);   
        }else{
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                                
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response     
     */
    public function create()
    {
        // $program  = Program::all();
        if( Session::has('adminsession') ){
            $program = Program::all();
            return view('Admin.Semester.add_semester')->with("programs",$program);
        }else{
            
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');
    }
}                 


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if( Session::has('adminsession') ){  

            $this->validate($request,[
            'semester_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required',
            'parent_program_id' => 'required'
            ]);            

            $semester = new Semester;
            $semester->semester_name= $request->input('semester_name');
            $semester->status = $request->input('status');
            $semester->slug = $request->input('slug');
            $semester->program_id= $request->input('parent_program_id');
            $semester->save();

            return redirect('/semester/view')->with('success','semester added');

        }else{            
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
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
         if(Session::has('adminsession')){
            
            $semester = Semester::find($id);
            $program = Program::where('status','=',1)->get();
             //dd($program);
            return view('Admin.Semester.update_semester')->with('semester',$semester)                                         ->with('programs',$program);

            // return redirect("/menu/update/$id")->with('menus',$menu);

        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
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
        
        if( Session::has('adminsession') ){  

            $this->validate($request,[
                'program_id'=>'required',
                'semester_name' => 'required|string|max:255',
                'status' => 'required',
                'slug' => 'required|string|max:255',
            ]);  
            $semester = Semester::find($id);
            $semester->program_id =  $request->input(['program_id']);
            $semester->semester_name = $request->input(['semester_name']);
            $semester->status = $request->input(['status']);
            $semester->slug = $request->input(['slug']);    
            $semester->save();

            return redirect('/semester/view')->with('success','Semester succesfully updated');

        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
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

    public function toogle_status($id){

        if(Session::has('adminsession')){
            
            $semester = Semester::find($id);
            $semester->status =  1 - $semester->status;           
            $semester->save();            

            return redirect('/semester/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }
    }
}