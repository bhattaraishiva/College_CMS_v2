<?php

namespace App\Http\Controllers;   
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Program;
use Session;

class ProgramController extends Controller
{
  
    public function index()
    {
        if(Session::has('adminsession')){            
            $program  = Program::all();
            return view('Admin.program.show_program')->with("programs",$program);   
        }else{
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access'); 
        }
    }

    public function create()
    {
       if( Session::has('adminsession') ){
            return view('Admin.program.add_program');
        }else{
            
            return redirect('/admin')
                    ->with('flash_msg_err','You must login to access');                    
        }
    }

    public function store(Request $request)
    {
        if( Session::has('adminsession') ){  

            $this->validate($request,[
            'program_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required',                
            ]);            

            $program = new Program;
            $program->program_name = $request->input('program_name');
            $program->status = $request->input('status');
            $program->slug = $request->input('slug');
            $program->save();
            
            return redirect('/program/view')->with('success','Program added');

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
            
            $program = Program::find($id);
            // return dd($program);
            return view('Admin.program.update_program')->with('program',$program);             
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
    }

    public function update(Request $request, $id)
    {
        if(Session::has('adminsession')){

            $this->validate($request,[
                'program_name' => 'required|string|max:25',
                'status' => 'required',
                'slug'  => 'required'
            ]);

            $program = Program::find($id);
            $program->program_name = $request->input(['program_name']);
            $program->status = $request->input(['status']);
            $program->slug = $request->input(['slug']);
            $program->save();

            return redirect('/program/view')->with('success','Program succesfully updated');

        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
    }

    public function destroy($id)
    {
      if(Session::has('adminsession')){
            
            $program = Program::find($id);
            $program->delete();     

            return redirect('/program/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }
    }

    public function toogle_status($id){

        if(Session::has('adminsession')){
            
            $program = Program::find($id);
            $program->status =  1 - $program->status;           
            $program->save();            

            return redirect('/program/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }
    }
}   