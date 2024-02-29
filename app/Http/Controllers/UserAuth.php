<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Developer;

use App\Models\Project;

use App\Models\State;

use App\Models\City;

use App\Models\property;

use App\Models\Product;

use App\Models\Payout;

use App\Models\Customer;

use App\Models\ProjectType;

use Illuminate\Pagination\Paginator;

class UserAuth extends Controller
{
    public function check(Request $request)
    {
        $email = $request->email;
        $pass =  md5($request->password);

        //dd(md5('password'));
        //dd(md5('Account123'));
        //dd(md5('Cx@123'));

        $users = Developer::where('email', $email)->where('password', $pass)->count();

        if($users == 1)
        {
            if($email == 'accounts@smallsmall.com' && $pass == 'c34a33a1eee3a0ff7afcfe03f088bddd')
            {
                $request->session()->put('account', $email);

                $request->session()->put('user', $email);

                $users = Developer::where('email', $email)->where('password', $pass)->get();

                foreach($users as $user)
                {
                    $developerID = $user['developer_id'];
                    $request->session()->put('developerID', $developerID);
                }

                //$account = $request->session()->get('account');

                echo 0;
            }

            elseif($email == 'cx@smallsmall.com' && $pass == 'd349ec6e6f0a1bab6fe30992e1566fc2')
            {
                $request->session()->put('cx', $email);

                $request->session()->put('user', $email);

                $users = Developer::where('email', $email)->where('password', $pass)->get();

                foreach($users as $user)
                {
                    $developerID = $user['developer_id'];
                    $request->session()->put('developerID', $developerID);
                }

                //$account = $request->session()->get('account');

                echo 3;
            }

            else
            {
                $request->session()->put('user', $email);

                $users = Developer::where('email', $email)->where('password', $pass)->get();

                foreach($users as $user)
                {
                    $developerID = $user['developer_id'];
                    $request->session()->put('developerID', $developerID);
                }

                echo 1;
            }

            //$username = $request->session()->get('developerID');
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

        $states = State::where('id', '2648')->orWhere('id', '2671')->get();

        $cities = City::where('state_id', '2648')->orWhere('state_id', '2671')->get();

        return view("addProject")->with(['proptyCount' => $proptyCount, 'cities' => $cities, 'states' => $states, 'totalSold' => $totalSold, 'totalActive' => $totalActive, 'developerName' => $developerName]);
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

        $service = '';

        if($swimming == 'yes')
        {
            $swimming = 'swimming';
        }

        else
        {
            $swimming = '';
        }

        if($gym == 'yes')
        {
            $gym = 'gym';
        }

        else
        {
            $gym = '';
        }

        if($others == 'yes')
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

        if($oven == 'yes')
        {
            $oven = 'oven';
        }

        else
        {
            $oven = '';
        }

        if($gasHob == 'yes')
        {
            $gasHob = 'gasHob';
        }

        else
        {
            $gasHob = '';
        }

        if($microwave == 'yes')
        {
            $microwave = 'microwave';
        }

        else
        {
            $microwave = '';
        }

        if($ac == 'yes')
        {
            $ac = 'ac';
        }

        else
        {
            $ac = '';
        }

        if($washingMachine == 'yes')
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
            require '../vendor/autoload.php'; // For Unione template authoload
		
            // Unione Template

            $headers = array(
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-API-KEY' => '6bgqu7a8bd7xszkz1uonenrxwpdeium56kb1kb3y',
            );

            $client = new \GuzzleHttp\Client([
                'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
            ]);

            $requestBody = [
                "id" => "3a441482-c666-11ee-9984-a285586d3219"
            ];

            $requestCxBody = [
                "id" => "9ba9f8e6-c737-11ee-a263-de9a1a910f06"
            ];

            $developerId = $request->session()->get('developerID');
            $users = Developer::where('developer_id', $developerId)->get();

            foreach($users as $user)
            {
                $developerName = $user['company_name'];
                $developerEmail = $user['email'];
            }

            //Unione Template

            try {
                $response = $client->request('POST', 'template/get.json', array(
                    'headers' => $headers,
                    'json' => $requestBody,
                ));

                $jsonResponse = $response->getBody()->getContents();

                $responseData = json_decode($jsonResponse, true);

                $htmlBody = $responseData['template']['body']['html'];

                // $username = $data['name'];
                // //$propertyName = $data['propName'];
                // $amount = number_format($data['Amount']);
                // $plan = $data['Plan'];
                // $plancode = $data['plancode'];
                // $chargeDate = $data['chargeDate'];
                // $bookingID = $data['bookingID'];
                // $currdate = $data['currentdate'];

                //Replace the placeholder in the HTML body with the username

                $htmlBody = str_replace('{{Name}}', $developerName, $htmlBody);
                // $htmlBody = str_replace('{{PlanID}}', $plancode, $htmlBody);
                // $htmlBody = str_replace('{{RecurringAmount}}', $amount, $htmlBody);
                // $htmlBody = str_replace('{{Plan}}', $plan, $htmlBody);
                // $htmlBody = str_replace('{{NextChargedate}}', $chargeDate, $htmlBody);
                // $htmlBody = str_replace('{{BookingID}}', $bookingID, $htmlBody);
                // $htmlBody = str_replace('{{Date}}', $currdate, $htmlBody);

                $data['response'] = $htmlBody;

                // Prepare the email data
                $emailData = [
                    "message" => [
                        "recipients" => [
                            ["email" => $developerEmail],
                            //["email" => 'pidah.t@smallsmall.com']
                        ],
                        "body" => ["html" => $htmlBody],
                        "subject" => "Property Listing",
                        "from_email" => "donotreply@smallsmall.com",
                        "from_name" => "Small Small",
                    ],
                ];

                // Send the email using the Unione API
                $responseEmail = $client->request('POST', 'email/send.json', [
                    'headers' => $headers,
                    'json' => $emailData,
                ]);
            } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                $data['response'] = $e->getMessage();
            }

            if ($responseEmail) {

                //$location = $city.' '.$state;

                $users = Project::where('project_id', $project_id)->get();

                foreach($users as $user)
                {
                    $projectName = $user['project_name'];
                    $unitNumber = $user['unit_number'];
                    $price = $user['unit_amount'];
                    $location = $user['city'].' '.$user['state'];
                }

                $selPrice = number_format($selPrice); 

                try {
                    $response = $client->request('POST', 'template/get.json', array(
                        'headers' => $headers,
                        'json' => $requestCxBody,
                    ));

                    $jsonResponse = $response->getBody()->getContents();

                    $responseData = json_decode($jsonResponse, true);

                    $htmlBody = $responseData['template']['body']['html'];

                    // Replace the placeholder in the HTML body with the username

                    $htmlBody = str_replace('{{Propertydeveloper}}', $developerName, $htmlBody);
                    $htmlBody = str_replace('{{Projectname}}', $projectName, $htmlBody);
                    $htmlBody = str_replace('{{numberofunits}}', $unitNumber, $htmlBody);
                    $htmlBody = str_replace('{{Propertyprice}}', $selPrice, $htmlBody);
                    $htmlBody = str_replace('{{Location}}', $location, $htmlBody);
                    // $htmlBody = str_replace('{{BookingID}}', $bookingID, $htmlBody);
                    // $htmlBody = str_replace('{{Date}}', $currdate, $htmlBody);
            
                    $data['response'] = $htmlBody;

                    // Prepare the email data
                    $emailCxData = [
                        "message" => [
                            "recipients" => [
                                ["email" => 'marketing@smallsmall.com'],
                                ["email" => 'james.o@smallsmall.com'],
                                ["email" => 'hello@buysmallsmall.ng'],
                                ["email" => 'tunde.b@smallsmall.com'],
                                ["email" => 'naomi.o@smallsmall.com'],
                                ["email" => 'pidah.t@smallsmall.com']
                            ],
                            "body" => ["html" => $htmlBody],
                            "subject" => "EDAP Property Listing!",
                            "from_email" => "donotreply@smallsmall.com",
                            "from_name" => "Small Small",
                        ],
                    ];

                    // Send the email using the Unione API
                    $responseEmail = $client->request('POST', 'email/send.json', [
                        'headers' => $headers,
                        'json' => $emailCxData,
                    ]);
                } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    $data['response'] = $e->getMessage();
                }

                echo 1;
            }
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

    public function projectPayout(Request $request)
    {
        $developers = Developer::all();

        $propertys = property::all();

        $products = Product::all();

        $parents = Project::all();

        $customers  = Customer::all();
        
        return view("projectPayout")->with(['developers' => $developers, 'propertys' => $propertys, 'parents' => $parents, 'products' => $products, 'customers' => $customers]);
    }

    
    public function addPayout(Request $request)
    {
        $developer = $request->developer;
        $propty = $request->propty;
        $product = $request->product;
        $parentPropty = $request->parentPropty;
        $paymentType = $request->paymentType;
        $amount = $request->amount;
        $customer = $request->customer;
        $date = $request->date;
        
        $user = new Payout;   
        $user->developer_id = $developer;
        $user->Amount = $amount;
        $user->Date = $date;
        $user->customer_id = $customer;
        $user->property_id = $propty;
        $user->parent_id = $parentPropty;
        $user->product = $product;
        $user->paymentType = $paymentType;

        if($user->save())
        {
            require '../vendor/autoload.php'; // For Unione template authoload
		
            // Unione Template

            $headers = array(
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-API-KEY' => '6bgqu7a8bd7xszkz1uonenrxwpdeium56kb1kb3y',
            );

            $client = new \GuzzleHttp\Client([
                'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
            ]);

            $requestBody = [
                "id" => "ad2bec40-c66b-11ee-b329-a285586d3219"
            ];

            // $requestCxBody = [
            //     "id" => "9ba9f8e6-c737-11ee-a263-de9a1a910f06"
            // ];

            $developerId = $request->session()->get('developerID');
            $users = Developer::where('developer_id', $developer)->get();

            foreach($users as $user)
            {
                $developerName = $user['company_name'];
                $developerEmail = $user['email'];
            }

            //Unione Template

            try {
                $response = $client->request('POST', 'template/get.json', array(
                    'headers' => $headers,
                    'json' => $requestBody,
                ));

                $jsonResponse = $response->getBody()->getContents();

                $responseData = json_decode($jsonResponse, true);

                $htmlBody = $responseData['template']['body']['html'];

                // $username = $data['name'];
                // //$propertyName = $data['propName'];
                // $amount = number_format($data['Amount']);
                // $plan = $data['Plan'];
                // $plancode = $data['plancode'];
                // $chargeDate = $data['chargeDate'];
                // $bookingID = $data['bookingID'];
                // $currdate = $data['currentdate'];

                //Replace the placeholder in the HTML body with the username

                $amount = number_format($amount);

                $htmlBody = str_replace('{{Propertydeveloper}}', $developerName, $htmlBody);
                $htmlBody = str_replace('{{Lockdownfee}}', $amount, $htmlBody);
                $htmlBody = str_replace('{{Date}}', $date, $htmlBody);
                // $htmlBody = str_replace('{{Plan}}', $plan, $htmlBody);
                // $htmlBody = str_replace('{{NextChargedate}}', $chargeDate, $htmlBody);
                // $htmlBody = str_replace('{{BookingID}}', $bookingID, $htmlBody);
                // $htmlBody = str_replace('{{Date}}', $currdate, $htmlBody);

                $data['response'] = $htmlBody;

                // Prepare the email data
                $emailData = [
                    "message" => [
                        "recipients" => [
                            ["email" => $developerEmail],
                            ["email" => 'pidah.t@smallsmall.com']
                        ],
                        "body" => ["html" => $htmlBody],
                        "subject" => "Property Payout",
                        "from_email" => "donotreply@smallsmall.com",
                        "from_name" => "Small Small",
                    ],
                ];

                // Send the email using the Unione API
                $responseEmail = $client->request('POST', 'email/send.json', [
                    'headers' => $headers,
                    'json' => $emailData,
                ]);
            } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                $data['response'] = $e->getMessage();
            }

            if ($responseEmail) {

                echo 1;
            }
        }

        else
        {
            echo 0;
        }

    }

    public function updateProject(Request $request)
    {
        $developers = Developer::all();

        $propertys = property::all();

        $products = Product::all();

        $parents = Project::all();

        $customers  = Customer::all();
        
        return view("updateProject")->with(['developers' => $developers, 'propertys' => $propertys, 'parents' => $parents, 'products' => $products, 'customers' => $customers]);        
    }

    public function updtPayouts(Request $request)
    {
        $developer = $request->developer;
        $propty = $request->propty;
        $availability = $request->availability;
        $parentPropty = $request->parentPropty;
        $receivable = $request->receivable;
        
        $user = property::where('propertyID', $propty)
                ->update(['availability' => $availability, 'receivable' => $receivable,]);
        
        if($user)
        {
            echo 1;
        }

        else
        {
            echo 0;
        }        
    }

    public function insrtProject(Request $request)
    {
        $developers = Developer::all();

        $propertys = property::all();

        $products = Product::all();

        $parents = Project::all();

        $customers  = Customer::all();
        
        return view("insertProject")->with(['developers' => $developers, 'propertys' => $propertys, 'parents' => $parents, 'products' => $products, 'customers' => $customers]);        
    }

    public function insrtProjects(Request $request)
    {
        $developer = $request->developer;
        $propty = $request->propty;
        $availability = $request->availability;
        $parentPropty = $request->parentPropty;
        $active = $request->active;
        $proptyPrice = $request->proptyPrice;
        $proptyId = rand(1000000, 999999999999);
        
        $user = new property;   
        $user->propertyID = $proptyId;
        $user->parent_id = $parentPropty;
        $user->property_name = $propty;
        $user->availability = $availability;
        $user->active = $active;
        $user->price = $proptyPrice;

        $property = Project::where('project_id', $parentPropty)
        ->update(['active' => $active]);


        if($user->save())
        {
            if($property)
            {
                echo 1;
            }
        }

        else
        {
            echo 0;
        }        
    }

    public function editProject(Request $request)
    {
        $projectID = $request->projectID;
        $projectName = $request->projectName;
        $projectPrice = $request->projectPrice;
        $proptyType = $request->proptyType;
        $unitNumber = $request->unitNumber;
        $size = $request->size;
        $reason =$request->Reason;
        
        $project = Project::where('project_id', $projectID)
                ->update(['unit_amount' => $projectPrice, 'unit_number' => $unitNumber, 'Reason' => $reason]);

        $projectType = ProjectType::where('project_id', $projectID)
        ->update(['proptyType' => $proptyType, 'unitNumber' => $unitNumber, 'sellingPrice' => $projectPrice, 'size' => $size]);
        
        if($project)
        {
            if($projectType)
            {
                require '../vendor/autoload.php'; // For Unione template authoload
		
                // Unione Template

                $headers = array(
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'X-API-KEY' => '6bgqu7a8bd7xszkz1uonenrxwpdeium56kb1kb3y',
                );

                $client = new \GuzzleHttp\Client([
                    'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
                ]);

                $requestBody = [
                    "id" => "a854a0f6-c669-11ee-94da-a6eca9b42236"
                ];

                $requestCxBody = [
                    "id" => "58ec6c70-c73a-11ee-b22f-d2f5f39f6973"
                ];

                $developerId = $request->session()->get('developerID');
                $users = Developer::where('developer_id', $developerId)->get();

                foreach($users as $user)
                {
                    $developerName = $user['company_name'];
                    $developerEmail = $user['email'];
                }

                //Unione Template

                try {
                    $response = $client->request('POST', 'template/get.json', array(
                        'headers' => $headers,
                        'json' => $requestBody,
                    ));

                    $jsonResponse = $response->getBody()->getContents();

                    $responseData = json_decode($jsonResponse, true);

                    $htmlBody = $responseData['template']['body']['html'];

                    // $username = $data['name'];
                    // //$propertyName = $data['propName'];
                    // $amount = number_format($data['Amount']);
                    // $plan = $data['Plan'];
                    // $plancode = $data['plancode'];
                    // $chargeDate = $data['chargeDate'];
                    // $bookingID = $data['bookingID'];
                    // $currdate = $data['currentdate'];

                    //Replace the placeholder in the HTML body with the username

                    $htmlBody = str_replace('{{Propertydeveloper}}', $developerName, $htmlBody);
                    // $htmlBody = str_replace('{{PlanID}}', $plancode, $htmlBody);
                    // $htmlBody = str_replace('{{RecurringAmount}}', $amount, $htmlBody);
                    // $htmlBody = str_replace('{{Plan}}', $plan, $htmlBody);
                    // $htmlBody = str_replace('{{NextChargedate}}', $chargeDate, $htmlBody);
                    // $htmlBody = str_replace('{{BookingID}}', $bookingID, $htmlBody);
                    // $htmlBody = str_replace('{{Date}}', $currdate, $htmlBody);

                    $data['response'] = $htmlBody;

                    // Prepare the email data
                    $emailData = [
                        "message" => [
                            "recipients" => [
                                ["email" => $developerEmail],
                                //["email" => 'pidah.t@smallsmall.com']
                            ],
                            "body" => ["html" => $htmlBody],
                            "subject" => "Property Update",
                            "from_email" => "donotreply@smallsmall.com",
                            "from_name" => "Small Small",
                        ],
                    ];

                    // Send the email using the Unione API
                    $responseEmail = $client->request('POST', 'email/send.json', [
                        'headers' => $headers,
                        'json' => $emailData,
                    ]);
                } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    $data['response'] = $e->getMessage();
                }

                if ($responseEmail) {

                    //$selPrice = number_format($selPrice); 

                    try {
                        $response = $client->request('POST', 'template/get.json', array(
                            'headers' => $headers,
                            'json' => $requestCxBody,
                        ));

                        $jsonResponse = $response->getBody()->getContents();

                        $responseData = json_decode($jsonResponse, true);

                        $htmlBody = $responseData['template']['body']['html'];

                        $projectPrice = number_format($projectPrice);

                        // Replace the placeholder in the HTML body with the username

                        $htmlBody = str_replace('{{Propertydeveloper}}', $developerName, $htmlBody);
                        $htmlBody = str_replace('{{Projectname}}', $projectName, $htmlBody);
                        $htmlBody = str_replace('{{numberofunits}}', $unitNumber, $htmlBody);
                        $htmlBody = str_replace('{{Propertyprice}}', $projectPrice, $htmlBody);
                        $htmlBody = str_replace('{{Updatereason}}', $reason, $htmlBody);
                        // $htmlBody = str_replace('{{BookingID}}', $bookingID, $htmlBody);
                        // $htmlBody = str_replace('{{Date}}', $currdate, $htmlBody);
                
                        $data['response'] = $htmlBody;

                        // Prepare the email data
                        $emailCxData = [
                            "message" => [
                                "recipients" => [
                                    ["email" => 'marketing@smallsmall.com'],
                                    ["email" => 'james.o@smallsmall.com'],
                                    ["email" => 'hello@buysmallsmall.ng'],
                                    ["email" => 'tunde.b@smallsmall.com'],
                                    ["email" => 'naomi.o@smallsmall.com'],
                                    ["email" => 'pidah.t@smallsmall.com']
                                ],
                                "body" => ["html" => $htmlBody],
                                "subject" => "EDAP Property Update!",
                                "from_email" => "donotreply@smallsmall.com",
                                "from_name" => "Small Small",
                            ],
                        ];

                        // Send the email using the Unione API
                        $responseEmail = $client->request('POST', 'email/send.json', [
                            'headers' => $headers,
                            'json' => $emailCxData,
                        ]);
                    } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                        $data['response'] = $e->getMessage();
                    }
                    
                    echo 1;
                }
            }
        }

        else
        {
            echo 0;
        }        
    }
    
    public function logout(Request $request)
    {
        $request->session()->forget('developerID');
        $request->session()->forget('account');
        $request->session()->forget('cx');
        $request->session()->forget('user');
        return redirect("/");
    }
}
