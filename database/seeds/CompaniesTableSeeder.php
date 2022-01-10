<?php

use App\User;
use App\Companies;

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends seeder
{
    public function run(): void
    {
        $logos = ['logo_1.png', 'logo_2.png', 'logo_3.png', 'logo_4.png', 'logo_5.png', 'logo_6.png',
            'logo_7.png', 'logo_8.png'];

        $names = [
            'Johnathon',
            'Anthony',
            'Erasmo',
            'Raleigh',
            'Nancie',
            'Tama',
            'Camellia',
            'Augustine',
            'Christeen',
            'Luz',
            'Diego',
            'Lyndia',
            'Thomas',
            'Georgianna',
            'Leigha',
            'Alejandro',
            'Marquis',
            'Joan',
            'Stephania',
            'Elroy',
            'Zonia',
            'Buffy',
            'Sharie',
            'Blythe',
            'Gaylene',
            'Elida',
            'Randy',
            'Margarete',
            'Margarett',
            'Dion',
            'Tomi',
            'Arden',
            'Clora',
            'Laine',
            'Becki',
            'Margherita',
            'Bong',
            'Jeanice',
            'Qiana',
            'Lawanda',
            'Rebecka',
            'Maribel',
            'Tami',
            'Yuri',
            'Michele',
            'Rubi',
            'Larisa',
            'Lloyd',
            'Tyisha',
            'Samatha'
        ];

        $user_ids = User::where('user_type', '!=', 'user')
            ->where('email', 'like', '%@yopmail.com%')
            ->get()->pluck('id');

        $addresses = [
            "6649 N Blue Gum St",
            "4 B Blue Ridge Blvd",
            "8 W Cerritos Ave #54",
            "639 Main St",
            "34 Center St",
            "3 Mcauley Dr",
            "7 Eads St",
            "7 W Jackson Blvd",
            "228 Runamuck Pl #2808",
            "37275 St  Rt 17m M",
            "98 Connecticut Ave Nw",
            "69734 E Carrillo St",
            "394 Manchester Blvd",
            "322 New Horizon Blvd",
            "6 Greenleaf Ave",
            "90991 Thorburn Ave",
            "86 Nw 66th St #8673"
        ];

        $cities = ["New Orleans", "Brighton", "Bridgeport", "Anchorage", "Hamilton", "Ashland", "Middle Island"];

        $states = ["LA", "MI", "AK", "NJ", "OH", "IL", "CA", "SD", "MD"];

        for($u = 0; $u < count($user_ids); $u++) {
            $logo       = $logos[array_rand($logos)];
            $name       = $names[array_rand($names)];
            $address    = $addresses[array_rand($addresses)];
            $city       = $cities[array_rand($cities)];
            $state      = $states[array_rand($states)];

            $insert = [
                'logo'              => $logo,
                'name'              => $name,
                'user_id'           => $user_ids->random(),
                'subscription_fee'  => rand(100, 1000),
                'address'           => $address,
                'city'              => $city,
                'state'             => $state,
                'country'           => 'United States'
            ];
            Companies::insert($insert);
        }
    }
}
