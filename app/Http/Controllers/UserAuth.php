<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Developer;

class UserAuth extends Controller
{
    public function check(Request $request)
    {
        $email = $request->email;
        $pass =  md5($request->password);

        $users = Developer::where('email', $email)->where('password', $pass)->count();

        if($users == 1)
        {
            $request->session()->put('user', $email);

            $users = Developer::where('email', $email)->where('password', $pass)->get();

            foreach($users as $user)
            {
                $developerID = $user['developer_id'];
                $request->session()->put('developerID', $developerID);
            }

            //$username = $request->session()->get('developerID');
             
            echo 1;
        }

        else
        {
            echo 2;
        }

    }

    public function index(Request $request)
    {
        $developerId = $request->session()->get('developerID');

        $users = Developer::where('developer_id', $developerId)->get();

        foreach($users as $user)
        {
            $developerName = $user['company_name'];
        }

        $proptyCount = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId'";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $proptyCount += 1; 
            }
        }

        $totalSold = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId' and availability = 'sold'";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $totalSold += 1; 
            }
        }

        $totalLocked = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId' and availability = 'locked'";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $totalLocked += 1; 
            }
        }

        $totalReceivable = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId'";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $receivable = $project->receivable;
                $totalReceivable += $receivable; 
            }
        }

        $totalPayout = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId'";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $payout = $project->payout;
                $totalPayout += $payout; 
            }
        }
        
        $outstndngReceivables = $totalReceivable - $totalPayout; 

        //dd($outstndngReceivables);

        return view("index")->with(['proptyCount' => $proptyCount, 'totalSold' => $totalSold, 'totalLocked' => $totalLocked, 'totalReceivable' => $totalReceivable, 'totalPayout' => $totalPayout, 'outstndngReceivables' => $outstndngReceivables, 'developerName' => $developerName]);
    }
}
