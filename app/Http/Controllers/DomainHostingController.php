<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

use App\Companies;
use App\User;
use App\Exports\CompaniesExport;

class DomainHostingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return 'silence is the gold';
    }

    public function checkDomainAvailability($domain)
    {
        $url = "https://api.ote-godaddy.com/v1/domains/available?domain=".$domain;

        // set your key and secret
        $header = array(
            'Authorization: sso-key 3mM44UbhM193Yc_6noaHYPSa7xm4hBQPqsc1W:KbhypVf5UMPUrWNQ3JQEkp'
        );

        //open connection
        $ch = curl_init();
        $timeout = 60;

        //set the url and other options for curl
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        //execute call and return response data.
        $result = curl_exec($ch);

        //close curl connection
        curl_close($ch);

        // decode the json response
        $dn = json_decode($result, true);

        if(isset($dn['available'])) {
            if((int) $dn['available'] == 0) {
                $suggestions = $this->suggestDomainNames($domain);
                return response()->json(array(
                    'suggestions'   => $suggestions,
                    'available'     => false
                ));
            }
        }

        return response()->json($dn);
    }

    private function suggestDomainNames($domain)
    {
        $url = "https://api.ote-godaddy.com/v1/domains/suggest?limit=12&query=".$domain;

        // set your key and secret
        $header = array(
            'Authorization: sso-key 3mM44UbhM193Yc_6noaHYPSa7xm4hBQPqsc1W:KbhypVf5UMPUrWNQ3JQEkp'
        );

        //open connection
        $ch = curl_init();
        $timeout = 60;

        //set the url and other options for curl
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        //execute call and return response data.
        $result = curl_exec($ch);

        //close curl connection
        curl_close($ch);

        // decode the json response
        return json_decode($result, true);
    }
}
