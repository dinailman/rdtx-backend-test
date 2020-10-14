<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use App\Events;
use Illuminate\Http\Request;

class UserEventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    //
    public function showUserByCompany($id)
    {
        $data = User::has('company')->get();
        $data = Company::has('user')->get();
        $user = Company::find($id)->User;
        return view('demo',[
            'User' => $user['first_name'].' '.$user['last_name'],
            'Company' => $data,
            'Events' => $user->events()->where('user_id', $user['id'])->get()
        ]);
        
    }

    public function showEventByUser()
    {   
        $company = Company::has('user')->get();

        if(count($company) < 1){
            $events = null;
            return view('home',[
                'event' => $events
            ]);
        } else {
            $index=0;
            foreach($company as $c){
                $user[] = Company::find($c['id'])->User;
                $events[] = [
                    'user' => $user[$index],
                    'company' => $c,
                    'event' => User::find($user[$index]['id'])->Events
                ];
                $index++;
            }

            return view('home',[
                'event' => $events
            ]);
        }
    }

    public function createPage(Request $request)
    {
        $company = Company::get();

        return view('user',[
            'company' => $company
        ]);
    }

    public function create(Request $request)
    {   
        //var_dump($request->addmore);die;
        //create user
        $user = User::create([
            'first_name' => $request->addmore['first_name'],
            'last_name' => $request->addmore['last_name'],
            'company_id' => $request->addmore['company_id']
        ]);
        // $user = new User;
        // $user->first_name = $request->addmore['first_name'];
        // $user->last_name = $request->addmore['last_name'];
        // $user->company_id = $request->addmore['company_id'];
        // $user->save();

        //$dataUser = User::find($request->addmore['company_id'])->get();

        foreach ($request->addmore['event'] as $key => $value) {
            Events::create([
                'name' => $value,
                'user_id' => $user['id']
        ]);
        }

        return redirect('/');   
    }

    public function updatePage($id)
    {
        //get data
        $user = Events::find($id)->User;
        $company = User::find($user['id'])->Company;
        $allCompany = Company::get();
        $event = Events::find($id);
        
        return view('update',[
            'user' => $user,
            'company' => $allCompany,
            'userCompany' => $company,
            'event' => $event
        ]);
    }

    public function update(Request $request)
    {   
        // update user
        $user = User::findOrFail($request->addmore['user_id']);
        $user->update([
            'first_name' => $request->addmore['first_name'],
            'last_name' => $request->addmore['last_name'],
            'company_id' => $request->addmore['company_id']
        ]);
        // update event
        $event = Events::findOrFail($request->addmore['event_id']);
        //var_dump($event);die;
        foreach ($request->addmore['event'] as $key => $value) {
            $event->update([
                'name' => $value
            ]);
        }

        return redirect('/');   
    }

}
