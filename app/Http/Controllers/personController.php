<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\people;
use App\Events\PersonAdded;

class personController extends Controller
{
    public function viewPeople(){
        // return all people
        return view('dashboard', ['people'=>people::where('status','Active')->get()]);
    }

    public function editPerson($id){
        //edit person
        return view('newPerson', ['people'=>people::find($id)]);
    }

    public function viewPerson($id){
        // return single person
        return view('newPerson', ['viewPerson'=>people::find($id)]);
    }

    public function removePerson($id){
        //soft remove the persen
        $people=people::find($id);
        $people->status='Inactive';
        $people->save();
        return redirect('/');
    }

    public function savePerson(Request $request){
        //save or update person details
        if($request->update){
            $people=people::find($request->update);
            $request->mailAction="updated";
        }else{
            $people=new people;
            $request->mailAction="added";
            event(new PersonAdded($request));
        }
        $people->name=$request->name;
        $people->surname=$request->surname;
        $people->idNumber=$request->idNumber;
        $people->birthDate=$request->birthDate;
        $people->mobileNumber=$request->mobileNumber;
        $people->email=$request->email;
        $people->language=$request->language;
        $people->interests=serialize($request->interests);
        $people->status='Active';
        //save and trigger send mail
        if($people->save()){
            event(new PersonAdded($request));
        }

        return redirect('/');
    }
}
