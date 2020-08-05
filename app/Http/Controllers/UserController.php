<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\affiliations;
use App\Models\positions;
use App\Models\auths;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; 

use Illuminate\Support\Facades\Hash;

use App\Exports\UsersExport; 
use App\Exports\User_detailExport;

class UserController extends Controller
{
    //
    public function all(Request $request)
    {
        $users = User::select(
            'users.id',
            'users.employee_code',
            'users.family_name',
            'users.personal_name',
            'users.kana_family_name',
            'users.kana_personal_name',
            'affiliations.affiliation_name',
            'positions.position_name',
            'users.created_at',
            'users.updated_at')
            ->join('affiliations', 'users.affiliation_id', '=', 'affiliations.id')
            ->join('positions', 'users.position_id', '=', 'positions.id')
            ->paginate(10);

        return view('user/user_all',['users' => $users]);
    }

    public function create()
    {
        $affiliations = affiliations::all();
        $positions = positions::all();
        $auths = auths::all();

        // dd($auths);

        return view('user/user_create',["affiliations" => $affiliations,"positions" => $positions,"auths" => $auths]);
    }

    public function create_check(Request $request)
    {
        $users = $request->all();
        // dd($clients);

        $affiliations = affiliations::all();
        $positions = positions::all();
        $auths = auths::all();

        return view('user/user_create_check',['users' => $users,"affiliations" => $affiliations,"positions" => $positions,"auths" => $auths]);
    }
    
    public function create_add(Request $request)
    {
        $form = $request->all();
        // dd($form);
        unset($form['_token']);
        
        $users = new User;
        $users->employee_code = $form['employee_code'];
        $users->password = Hash::make($form['password']);
        $users->family_name = $form['family_name'];
        $users->personal_name = $form['personal_name'];
        $users->kana_family_name = $form['kana_family_name'];
        $users->kana_personal_name = $form['kana_personal_name'];
        $users->affiliation_id = $form['affiliation_id'];
        $users->position_id = $form['position_id'];
        $users->office_tel = $form['office_tel'];
        $users->mobile_tel = $form['mobile_tel'];
        $users->email = $form['email'];
        $users->join = $form['join'];
        $users->zipcode = $form['zipcode'];
        $users->address = $form['address'];
        $users->home_tel = $form['home_tel'];
        $users->birthdate = $form['birthdate'];
        $users->auth_id = $form['auth_id'];

        $users->save();

        return redirect('user/all');
    }

    public function detail(Request $request)
    {
        // $clients = clients::find($request->id);

        $users = User::select(
            'users.id',
            'users.employee_code',
            'users.family_name',
            'users.personal_name',
            'users.kana_family_name',
            'users.kana_personal_name',
            'users.office_tel',
            'users.mobile_tel',
            'users.email',
            'users.join',
            'users.zipcode',
            'users.address',
            'users.home_tel',
            'users.birthdate',
            'affiliations.affiliation_name',
            'positions.position_name',
            'auths.authlevel_name',
            'users.created_at',
            'users.updated_at')
            ->join('affiliations', 'users.affiliation_id', '=', 'affiliations.id')
            ->join('positions', 'users.position_id', '=', 'positions.id')
            ->join('auths', 'users.auth_id', '=', 'auths.id')
            ->find($request->id);

        return view('user/user_detail',['users' => $users]);
    }


    public function edit(Request $request)
    {
        $users = User::select(
            'users.id',
            'users.employee_code',
            'users.family_name',
            'users.personal_name',
            'users.kana_family_name',
            'users.kana_personal_name',
            'users.affiliation_id',
            'users.position_id',
            'users.office_tel',
            'users.mobile_tel',
            'users.email',
            'users.join',
            'users.zipcode',
            'users.address',
            'users.home_tel',
            'users.birthdate',
            'users.auth_id',
            'users.password',
            'affiliations.affiliation_name',
            'positions.position_name',
            'auths.authlevel_name',
            'users.created_at',
            'users.updated_at')
            ->join('affiliations', 'users.affiliation_id', '=', 'affiliations.id')
            ->join('positions', 'users.position_id', '=', 'positions.id')
            ->join('auths', 'users.auth_id', '=', 'auths.id')
            ->find($request->id);

            $affiliations = affiliations::all();
            $positions = positions::all();
            $auths = auths::all();

        return view('user/user_edit',['users' => $users, "affiliations" => $affiliations,"positions" => $positions,"auths" => $auths]);
    }

    public function edit_check(Request $request)
    {
        $users = $request->all();
        // dd($clients);

        $affiliations = affiliations::all();
        $positions = positions::all();
        $auths = auths::all();

        return view('user/user_edit_check',['users' => $users,"affiliations" => $affiliations,"positions" => $positions,"auths" => $auths]);
    }

    public function update(Request $request)
    {
        $users = User::find($request->id);

        $form = $request->all();
        unset($form['_token']);

        $users->fill($form);
        $users->save();

        return redirect('user/all');
    }

    public function delete(Request $request)
    {
        $users = User::find($request->id);
        $users->delete();

        return redirect('client/all');
    }
    
    public function pass_set(Request $request)
    {
        $users = User::find($request->id);
        // dd($sales);
        return view('user/pass_set',['users' => $users]);
    }

    public function pass_reset(Request $request)
    {
        // $this->validate($request, User::$rules);
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $users = User::find($request->id);

        $users->employee_code = $form['employee_code'];
        $users->password = Hash::make($form['password']);
        $users->family_name = $form['family_name'];
        $users->personal_name = $form['personal_name'];
        $users->kana_family_name = $form['kana_family_name'];
        $users->kana_personal_name = $form['kana_personal_name'];
        $users->affiliation_id = $form['affiliation_id'];
        $users->position_id = $form['position_id'];
        $users->office_tel = $form['office_tel'];
        $users->mobile_tel = $form['mobile_tel'];
        $users->email = $form['email'];
        $users->join = $form['join'];
        $users->zipcode = $form['zipcode'];
        $users->address = $form['address'];
        $users->home_tel = $form['home_tel'];
        $users->birthdate = $form['birthdate'];
        $users->auth_id = $form['auth_id'];

        $users->save();

        return redirect('user/all');
    }

    public function export()
    {

        return Excel::download(new UsersExport, 'users.xlsx'); 
    }

    public function detail_export(Request $request)
    {
        $form = User::find($request->id);
        $id = $form['id'];
        // dd($id);
        return Excel::download(new User_detailExport(['id' => $id]), 'user_detail.xlsx'); 
    }
}