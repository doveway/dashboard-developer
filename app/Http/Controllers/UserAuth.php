<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Developer;

use App\Models\Project;

use App\Models\ProjectType;

use Illuminate\Pagination\Paginator;

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

        $totalActive = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId' and active = 1";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $totalActive += 1; 
            }
        }

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

        return view("index")->with(['proptyCount' => $proptyCount, 'totalSold' => $totalSold, 'totalLocked' => $totalLocked, 'totalReceivable' => $totalReceivable, 'totalActive' => $totalActive, 'totalPayout' => $totalPayout, 'outstndngReceivables' => $outstndngReceivables, 'developerName' => $developerName]);
    }

    public function addProject(Request $request)
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

        $totalActive = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId' and active = 1";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $totalActive += 1; 
            }
        }

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

        return view("addProject")->with(['proptyCount' => $proptyCount, 'totalSold' => $totalSold, 'totalActive' => $totalActive, 'developerName' => $developerName]);
    }

    public function insertProject(Request $request)
    {
        $name = $request->name;
        $state = $request->state;
        $city = $request->city;
        $address = $request->address;
        $swimming = $request->swimming;
        $gym = $request->gym;
        $others = $request->others;
        $fullyServiced = $request->fullyServiced;
        $partialServiced = $request->partialServiced;
        $selfServiced = $request->selfServiced;
        $unitNumber = $request->unitNumber;
        $startDate =  $request->startDate;
        $deliveryDate =  $request->deliveryDate;
        $currStage =  $request->currStage;
        $landTitle =  $request->landTitle;
        $approvals =  $request->approvals;

        if($swimming == true)
        {
            $swimming = 'swimming';
        }

        else
        {
            $swimming = '';
        }

        if($gym == true)
        {
            $gym = 'gym';
        }

        else
        {
            $gym = '';
        }

        if($others == true)
        {
            $others = 'others';
        }

        else
        {
            $others = '';
        }

        if($fullyServiced == 'true')
        {
            $service = 'fullyServiced';
        }


        if($partialServiced == 'true')
        {
            $service = 'partialServiced';
        }

        if($selfServiced == 'true')
        {
            $service = 'selfServiced';
        }

        $facilities = $swimming.'/'.$gym.'/'.$others;

        $user = new Project;
    
        $user->project_id = rand(1000000, 9999999999);
        $user->project_name = $name;
        $user->developer_id = $request->session()->get('developerID');
        $user->state = $state;
        $user->city = $city;
        $user->address = $address;
        $user->facilities = $facilities;
        $user->services = $service;
        $user->unit_number = $unitNumber;
        $user->start_date = $startDate;
        $user->finish_date = $deliveryDate;
        $user->current_stage = $currStage;
        $user->land_title = $landTitle;
        $user->approvals = $approvals;

        
        if($user->save())
        {
            echo 1;
        }

        else
        {
            echo 2;
        }

    }

    public function insertProjectType(Request $request)
    {
        $developerId = $request->session()->get('developerID');

        $sql = "SELECT * FROM developer_property WHERE developer_id = '$developerId' order by id desc limit 1";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $project_id = $result->project_id;
        }

        $property = $request->property;
        $proptyType = $request->proptyType;
        $unitNumber = $request->unitNumber;
        $size = $request->size;
        $oven = $request->oven;
        $gasHob = $request->gasHob;
        $microwave = $request->microwave;
        $ac = $request->ac;
        $washingMachine = $request->washingMachine;
        $textarea2 = $request->textarea2;
        $textarea3 = $request->textarea3;
        $selPrice =  $request->selPrice;
        $bssSelPrice =  $request->bssSelPrice;

        if($oven == true)
        {
            $oven = 'oven';
        }

        else
        {
            $oven = '';
        }

        if($gasHob == true)
        {
            $gasHob = 'gasHob';
        }

        else
        {
            $gasHob = '';
        }

        if($microwave == true)
        {
            $microwave = 'microwave';
        }

        else
        {
            $microwave = '';
        }

        if($ac == true)
        {
            $ac = 'ac';
        }

        else
        {
            $ac = '';
        }

        if($washingMachine == true)
        {
            $washingMachine = 'washingMachine';
        }

        else
        {
            $washingMachine = '';
        }


        $features = $oven.'/'.$gasHob.'/'.$microwave.'/'.$ac.'/'.$washingMachine;

        $user = new ProjectType;
    
        $user->property = $property;
        $user->proptyType = $proptyType;
        $user->unitNumber = $unitNumber;
        $user->size = $size;
        $user->features = $features;
        $user->otherFeatures = $textarea2;
        $user->sellingPrice = $selPrice;
        $user->bssSelPrice = $bssSelPrice;
        $user->moreDetails = $textarea3;
        $user->project_id = $project_id;
        
        if($user->save())
        {
            echo 1;
        }

        else
        {
            echo 2;
        }

    }

    public function insertProjectTypes(Request $request)
    {
        $developerId = $request->session()->get('developerID');

        $sql = "SELECT * FROM developer_property WHERE developer_id = '$developerId' order by id desc limit 1";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $project_id = $result->project_id;
        }

        $property = $request->property;
        $proptyType = $request->proptyType;
        $unitNumber = $request->unitNumber;
        $size = $request->size;
        $oven = $request->oven;
        $gasHob = $request->gasHob;
        $microwave = $request->microwave;
        $ac = $request->ac;
        $washingMachine = $request->washingMachine;
        $textarea2 = $request->textarea2;
        $textarea3 = $request->textarea3;
        $selPrice =  $request->selPrice;
        $bssSelPrice =  $request->bssSelPrice;

        if($oven == true)
        {
            $oven = 'oven';
        }

        else
        {
            $oven = '';
        }

        if($gasHob == true)
        {
            $gasHob = 'gasHob';
        }

        else
        {
            $gasHob = '';
        }

        if($microwave == true)
        {
            $microwave = 'microwave';
        }

        else
        {
            $microwave = '';
        }

        if($ac == true)
        {
            $ac = 'ac';
        }

        else
        {
            $ac = '';
        }

        if($washingMachine == true)
        {
            $washingMachine = 'washingMachine';
        }

        else
        {
            $washingMachine = '';
        }


        $features = $oven.'/'.$gasHob.'/'.$microwave.'/'.$ac.'/'.$washingMachine;

        $user = new ProjectType;
    
        $user->property = $property;
        $user->proptyType = $proptyType;
        $user->unitNumber = $unitNumber;
        $user->size = $size;
        $user->features = $features;
        $user->otherFeatures = $textarea2;
        $user->sellingPrice = $selPrice;
        $user->bssSelPrice = $bssSelPrice;
        $user->moreDetails = $textarea3;
        $user->project_id = $project_id;
        
        if($user->save())
        {
            echo 1;
        }

        else
        {
            echo 2;
        }

    }

    public function portfolio(Request $request)
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

        $totalActive = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId' and active = 1";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $totalActive += 1; 
            }
        }

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

        $Locked = 0; $sold = 0;

        $sql = "SELECT a.*, b.* FROM developer_property as a, projecttypes as b WHERE a.developer_id = '$developerId' and a.project_id = b.project_id";

        $totResults = DB::select($sql);

        $sql = "SELECT a.* FROM developer_property as a WHERE a.developer_id = '$developerId'";

        $totalResults = DB::select($sql);

        foreach($totalResults as $totalResult)
        {
            $unit = $totalResult->unit_number;
            $parent_id = $totalResult->project_id;

            $sql = "SELECT a.* FROM buytolet_property as a WHERE a.parent_id = '$parent_id'";

            $totlResults = DB::select($sql);

            foreach($totlResults as $totlResult)
            {
                if($totlResult->availability == 'Locked')
                {
                    $Locked += 1;
                }

                elseif($totlResult->availability == 'sold')
                {
                    $sold += 1;
                }
            }

            $Available = $unit - $Locked - $sold;

            $sql = "SELECT count(*) as count FROM developer_payout as a WHERE a.property_id = '$parent_id'";

            $customers = DB::select($sql);

            foreach($customers as $customer)
            {
                $customerCount = $customer->count;
            }
        }

        return view("portfolio")->with(['proptyCount' => $proptyCount, 'totalSold' => $totalSold, 'totalActive' => $totalActive,  'totResults' => $totResults, 'developerName' => $developerName]);
    }

    public function portfolioDetail(Request $request, $id)
    {
        $developerId = $request->session()->get('developerID');

        $users = Developer::where('developer_id', $developerId)->get();

        foreach($users as $user)
        {
            $developerName = $user['company_name'];
        }

        $sql = "SELECT * FROM `developer_property` WHERE project_id = '$id'";

        $results = DB::select($sql);

        foreach($results as $user)
        {
            $projectName = $user->project_name;
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

        $totalActive = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId' and active = 1";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $totalActive += 1; 
            }
        }

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

        // $sql = "SELECT a.*, b.type FROM buytolet_property as a, buytolet_investment_type as b WHERE a.investment_type = b.id and a.parent_id = '$id'";

        // $totResults = DB::select($sql);

        // $totResults = new Paginator($totResults, 1);

        $totResults = DB::table('buytolet_property')
                      ->join('buytolet_investment_type', 'buytolet_property.investment_type', '=', 'buytolet_investment_type.id')
                      ->select('buytolet_property.*', 'buytolet_investment_type.type')
                      ->where('buytolet_property.parent_id', '=', $id)
                      ->paginate(2);

        $totProptyCount = DB::table('buytolet_property')
        ->join('buytolet_investment_type', 'buytolet_property.investment_type', '=', 'buytolet_investment_type.id')
        ->select('buytolet_property.*', 'buytolet_investment_type.type')
        ->where('buytolet_property.parent_id', '=', $id)
        ->count();

        return view("portfolioDetail")->with(['proptyCount' => $proptyCount, 'proptyId' => $id, 'totalSold' => $totalSold, 'totalActive' => $totalActive,  'totProptyCount' => $totProptyCount,'totResults' => $totResults, 'developerName' => $developerName, 'projectName' => $projectName]);
    }

    public function dateFilter(Request $request)
    {
        $proptyId = $request->property;
        $limit = $request->limit;
        $start = $request->start;
        $limits = $start + $limit;

        $totResults = DB::table('buytolet_property')
                      ->join('buytolet_investment_type', 'buytolet_property.investment_type', '=', 'buytolet_investment_type.id')
                      ->select('buytolet_property.*', 'buytolet_investment_type.type')
                      ->where('buytolet_property.parent_id', '=', $proptyId)
                      ->orderBy('buytolet_property.date_of_entry', 'Desc')
                      ->limit($limits, $start)
                      ->get();
        $output = '';

        $output .= '<div id = "historyTable">
        <div class="col-12 mt-5 " id="history">
          <div class=" p-3 default-background default-background-border table-responsive">
            <table class="table custom-font-size-14">
              <thead class="">
                <tr>
                  <th scope="col" class="border-top-0">Property Names</th>
                  <th scope="col" class="border-top-0">Type of unit</th>
                  <th scope="col" class="border-top-0">Date listed</th>
                  <th scope="col" class="border-top-0">Status</th>
                  <th scope="col" class="border-top-0">Package</th>
                  <th scope="col" class="border-top-0">Price</th>
                </tr>
              </thead>
              <tbody>';
                foreach($totResults as $totResult)
                {
                    if($totResult->availability == 'sold')
                    {
                        $output .= '<tr>
                        <td>'.$totResult->property_name.'</td>
                        <td>'.$totResult->bed.' bed</td>
                        <td>'.$totResult->date_of_entry.'</td>
                        <td>
                            <button class="btn custom-font-size-14 custom-btn-danger">Locked</button>  
                        </td>
                        <td>
                            '.$totResult->type.'
                        </td>
                        <td>&#8358;'.$totResult->price.'</td>
                        </tr>';
                    }

                    else
                    {
                        $output .= '<tr>
                        <td>'.$totResult->property_name.'</td>
                        <td>'.$totResult->bed.' bed</td>
                        <td>'.$totResult->date_of_entry.'</td>
                        <td>
                            <button class="btn custom-font-size-14 custom-btn-success">Available</button>  
                        </td>
                        <td>
                            '.$totResult->type.'
                        </td>
                        <td>&#8358;'.$totResult->price.'</td>
                        </tr>';                            
                    }
                }

              $output .= '</tbody>
            </table>
          </div>

        </div>

      </div>
      <br></br>
      <div class="row mb-4">
        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="inbox-data-loading"> </div>
        <div class="text-right load-more-bar" onclick ="loadDateMessages()">
            <a href="#" class="btn secondary-background">Load more</a>
        </div>
      </div>';

      echo $output;

    }

    public function unitFilter(Request $request)
    {
        $proptyId = $request->property;
        $limit = $request->limit;
        $start = $request->start;
        $limits = $start + $limit;

        $totResults = DB::table('buytolet_property')
                      ->join('buytolet_investment_type', 'buytolet_property.investment_type', '=', 'buytolet_investment_type.id')
                      ->select('buytolet_property.*', 'buytolet_investment_type.type')
                      ->where('buytolet_property.parent_id', '=', $proptyId)
                      ->orderBy('buytolet_property.price', 'Desc')
                      ->limit($limits, $start)
                      ->get();
        $output = '';

        $output .= '<div id = "historyTable">
        <div class="col-12 mt-5 " id="history">
          <div class=" p-3 default-background default-background-border table-responsive">
            <table class="table custom-font-size-14">
              <thead class="">
                <tr>
                  <th scope="col" class="border-top-0">Property Names</th>
                  <th scope="col" class="border-top-0">Type of unit</th>
                  <th scope="col" class="border-top-0">Date listed</th>
                  <th scope="col" class="border-top-0">Status</th>
                  <th scope="col" class="border-top-0">Package</th>
                  <th scope="col" class="border-top-0">Price</th>
                </tr>
              </thead>
              <tbody>';
                foreach($totResults as $totResult)
                {
                    if($totResult->availability == 'sold')
                    {
                        $output .= '<tr>
                        <td>'.$totResult->property_name.'</td>
                        <td>'.$totResult->bed.' bed</td>
                        <td>'.$totResult->date_of_entry.'</td>
                        <td>
                            <button class="btn custom-font-size-14 custom-btn-danger">Locked</button>  
                        </td>
                        <td>
                            '.$totResult->type.'
                        </td>
                        <td>&#8358;'.$totResult->price.'</td>
                        </tr>';
                    }

                    else
                    {
                        $output .= '<tr>
                        <td>'.$totResult->property_name.'</td>
                        <td>'.$totResult->bed.' bed</td>
                        <td>'.$totResult->date_of_entry.'</td>
                        <td>
                            <button class="btn custom-font-size-14 custom-btn-success">Available</button>  
                        </td>
                        <td>
                            '.$totResult->type.'
                        </td>
                        <td>&#8358;'.$totResult->price.'</td>
                        </tr>';                            
                    }
                }

              $output .= '</tbody>
            </table>
          </div>

        </div>

      </div>
      <br></br>
      <div class="row mb-4">
        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="inbox-data-loading"> </div>
        <div class="text-right load-more-bar" onclick ="loadUnitMessages()">
            <a href="#" class="btn secondary-background">Load more</a>
        </div>
      </div>';

      echo $output;

    }

    public function receivable(Request $request)
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

        $totalActive = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId' and active = 1";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $totalActive += 1; 
            }
        }

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

        $sql = "SELECT count(DISTINCT customer_id) as count FROM developer_payout";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $count = $result->count;
        }

        $totalCustomer = 0;

        $totalDownPayment = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId'";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $DownPayment = ($project->minimum_payment_plan / 100) * $project->price;
                $totalDownPayment += $DownPayment; 
            }
        }

        $totResults = DB::table('developer_payout')
                      ->select('developer_payout.*')
                      ->where('developer_payout.developer_id', '=', $developerId)
                      ->paginate(2);

        return view("receivables")->with(['proptyCount' => $proptyCount, 'totalPayout' => $totalPayout, 'outstndngReceivables' => $outstndngReceivables, 'totalActive' => $totalActive, 'count' => $count, 'totalDownPayment' => $totalDownPayment, 'totResults' => $totResults, 'totalSold' => $totalSold,  'developerName' => $developerName]);
    }

    public function uploadSuccessfully(Request $request)
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

        $totalActive = 0;

        $sql = "SELECT * FROM `developer_property` WHERE developer_id = '$developerId'";

        $results = DB::select($sql);

        foreach($results as $result)
        {
            $projctId = $result->project_id;

            $sql = "SELECT * FROM `buytolet_property` WHERE parent_id = '$projctId' and active = 1";

            $projects = DB::select($sql);

            foreach($projects as $project)
            {
                $totalActive += 1; 
            }
        }

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

        return view("uploadSuccessfully")->with(['proptyCount' => $proptyCount, 'totalSold' => $totalSold, 'totalActive' => $totalActive, 'developerName' => $developerName]);
    }
}
