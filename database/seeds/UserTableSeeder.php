<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_type')->insert(
            [
                ['name' => 'Admin'],
                ['name' => 'Manager'],
            ]
        );

        // =========================================================>> Add Admin
        $users =  [
            [
                'type_id' => 2,
                'email' => 'emhengly@gmail.com',
                'phone' => '078476343',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Em Hengly',
                'avatar' => 'public/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'sopagnaheang@gmail.com',
                'phone' => '0969165599',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Heang Sopagna',
                'avatar' => 'public/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'sonimith7777@gmail.com',
                'phone' => '093822207',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Hang Sonimith',
                'avatar' => 'public/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'heanghalsok2018@gmail.com',
                'phone' => '017776312',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Hal Sokheang',
                'avatar' => 'public/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'namchhinh12@gmail.com',
                'phone' => '068626174',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Chhorm Chhinh',
                'avatar' => 'public/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'chhengsophin@gmail.com',
                'phone' => '081951807',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Chheng Sophin',
                'avatar' => 'public/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'thearykheary@gmail.com',
                'phone' => '0967455916',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Kheang SokunTheary',
                'avatar' => 'public/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'linnakeo5152@gmail.com',
                'phone' => '086853067',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Keo Linna',
                'avatar' => 'public/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'horngmoniratanak@gmail.com',
                'phone' => '0715703144',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Hang Monyratanak',
                'avatar' => 'profile/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'yinnara6@gmail.com',
                'phone' => '016838248',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Yin Nara',
                'avatar' => 'profile/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'vitousokkh@gmail.com',
                'phone' => '0964565520',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Sok Vitou',
                'avatar' => 'profile/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'sombochor3@gmail.com',
                'phone' => '070838979',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Chor Sombo',
                'avatar' => 'profile/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'afachheng@gmail.com',
                'phone' => '099400157',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Chheng Afa',
                'avatar' => 'profile/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'vicheasokan6@gmail.com',
                'phone' => '089251824',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Sokan Sovichea',
                'avatar' => 'profile/user/profile.png'
            ],

            [
                'type_id' => 2,
                'email' => 'teavdaravitou202@gmail.com',
                'phone' => '0964333214',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Teav Daravitou',
                'avatar' => 'profile/user/profile.png'
            ],

            [
                'type_id' => 1,
                'email' => 'khouch.koeun@gmail.com',
                'phone' => '0965416704',
                'password' => bcrypt('123456'),
                'is_active' => 1,
                'is_email_verified' => 1,
                'name' => 'Khouch Koeun',
                'avatar' => 'profile/user/profile.png'
            ]


        ];

        DB::table('user')->insert($users);

        DB::table('admin')->insert([
            ['user_id' => 1],
            ['user_id' => 2],
            ['user_id' => 3],
            ['user_id' => 4],
            ['user_id' => 5],
            ['user_id' => 6],
            ['user_id' => 7],
            ['user_id' => 8],
            ['user_id' => 9],
            ['user_id' => 10],
            ['user_id' => 11],
            ['user_id' => 12],
            ['user_id' => 13],
            ['user_id' => 14],
            ['user_id' => 15],
            ['user_id' => 16]
        ]);
    }
}
