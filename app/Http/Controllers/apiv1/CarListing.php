<?php

namespace App\Http\Controllers\apiv1;

use App\Http\Controllers\Controller;
use App\Models\AllUniqueCodes;
use App\Models\V1CarDetailsLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Http\Response;

class CarListing extends Controller
{

 private $data_all;   




 function extractDetailsriyasevana($inputString) {
    // Define the regex pattern to match the details
    $pattern = '/^(.*?) (Used) (\d{4}) (.*?) (Rs\.) (\d+) (Sri Lanka)$/';

    // Perform the regex match
    preg_match($pattern, $inputString, $matches);

    // Check if matches are found
    if (!empty($matches)) {
        $make = $matches[1];
        $condition = $matches[2];
        $year = $matches[3];
        $fuelType = $matches[4];
        $currency = $matches[5];
        $amount = $matches[6];
        $country = $matches[7];

        // Return the extracted values
        return array(
            'Make' => $make,
            'Condition' => $condition,
            'Year' => $year,
            'FuelType' => $fuelType,
            'Currency' => $currency,
            'Amount' => $amount,
            'Country' => $country
        );
    } else {
        return null; // Return null if no matches found
    }
}


    
    
function getUniqueId($length=50){

    $randomString = null;
    do{
    $characters = '0123456789BCDFGHJKLMNPQRSTVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

} while(AllUniqueCodes::where('my_uniqueid',$randomString)->get()==false);
    $newrandomString = new AllUniqueCodes();
    $newrandomString->my_uniqueid = $randomString;
    $newrandomString->save();

    if($newrandomString){
        return $randomString;
    }
    else{
        return "NOTSET".date("jSFYhis");
    }




}


function addnew(Request $req ){


    $dataextractfromtitle = [];

$this->data_all = $req->only(['JobID','JOBURL','Provider','Contact','Price','Make','Model','YOM','YOR','Mileage','Gear','FuelType','Options','Engine','Title','URL','PostTime','Location','FullJSON']);
//dd($data_all['JobID']);
//
//`id`, ``, `. 
//`id`, ``, `jobid`, `my_uniqueid`, `uniqueid`, `site_url`, `details`, `manufacturer`, `model`, `yom`, `yor`, `mileage`, `amount`, `contact`, `fueltype`, `gear`, `posted_on`, `title`, `options`, `condion`, `location`, `location_group`, `status`, `job_url`, `log`, `created_at`, `updated_at`
//serach in title and URL

//if provider == riyasewana
        if($this->data_all['Provider']=='riyasewana'){

            $dataextractfromtitle = $this->extractDetailsriyasevana($this->data_all['Title']);

        $this->data_all['Condition'] = $dataextractfromtitle['Condition'] ;
        $this->data_all['Price'] = $dataextractfromtitle['Amount'];

        }

$new_entry = V1CarDetailsLog::firstOrCreate(
    ['site_url'=>$this->data_all['URL'],  'title'=> $this->data_all['Title'] ],
    
    [
        
        'title' => $this->data_all['Title'],
        'jobid' => $this->data_all['JobID'],
        'provider' => $this->data_all['Provider'],
        'site_url' => $this->data_all['URL'],
        'manufacturer' => $this->data_all['Make'],
        'model' => $this->data_all['Model'],
        'yom' => $this->data_all['YOM'],
        'yor' => isset($this->data_all['YOR'])? $this->data_all['YOR']:null,
        'mileage' => ($this->data_all['Mileage']==null)? 0 : preg_replace('/[^0-9]/', '', $this->data_all['Mileage']),
        'amount' => ($this->data_all['Price']==null)? 0 : preg_replace('/[^0-9]/', '', $this->data_all['Price']),
        'contact' => preg_replace('/[^0-9]/', '', $this->data_all['Contact']),
        'gear' => ($this->data_all['Gear']==null)? null :$this->data_all['Gear'],
        'fueltype' => $this->data_all['FuelType'],
        'options' => ($this->data_all['Options']==null)? null :$this->data_all['Options'],
        'Engine' => ($this->data_all['Engine']==null)? null :$this->data_all['Engine'],
        'posted_on' => Carbon::createFromFormat('Y-m-d g:i a',$this->data_all['PostTime']), // 2024-04-06 9:19 a,
        'FullJSON' => $this->data_all['FullJSON'],
        'location' => $this->data_all['Location'],
        'condion' => $this->data_all['Condition'],
        'uniqueid' => $this->getUniqueId(50), 


    ]
);




/*
$doesitexsist = V1CarDetailsLog::where('site_url',$this->data_all['URL'])->where( 'title', $this->data_all['Title'] )->get();

//dd($this->data_all['Provider']);

if(!$doesitexsist)


$new_entry = new V1CarDetailsLog;
//`id`, `provider`, `jobid`, `my_uniqueid`, `uniqueid`, `site_url`, `details`, `manufacturer`, `model`, `yom`, `yor`, `mileage`, `amount`, `contact`, `fueltype`, `gear`, `posted_on`, `title`, `options`, `condion`, `location`, `location_group`, `status`, `job_url`, `log`,
$new_entry->provider = strtolower($this->data_all['Provider']);
dd($new_entry);
$new_entry->site_url = $this->data_all['URL'];
$new_entry->manufacturer = $this->data_all['Make'];
$new_entry->model = $this->data_all['Model'];
$new_entry->yom = $this->data_all['YOM'];
$new_entry->yor = $this->data_all['YOR'];
$new_entry->mileage = preg_replace('/[^0-9]/', '', $this->data_all['Mileage']);
$new_entry->amount = preg_replace('/[^0-9]/', '', $this->data_all['Price']);
$new_entry->title = $this->data_all['Title'];
$new_entry->contact = preg_replace('/[^0-9]/', '', $this->data_all['Contact']);
$new_entry->gear = $this->data_all['Gear'];
$new_entry->fueltype = $this->data_all['FuelType'];
$new_entry->options = $this->data_all['Options'];
$new_entry->Engine = $this->data_all['Engine'];
$new_entry->posted_on = Carbon::createFromFormat('Y-m-d g.i a',$this->data_all['PostTime']); // 2024-04-06 9:19 am
$new_entry->FullJSON = $this->data_all['FullJSON'];
$new_entry->location = $this->data_all['Location'];
$new_entry->uniqueid = $this->getUniqueId(50);
$new_entry->jobid = $this->data_all['JobID'];
dd($new_entry);

$new_entry->save();
*/

if($new_entry){
    return response()->json(['status'=>'success']);

    }
}




















}


