<?php

namespace Database\Seeders;

use App\Models\Company_contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Company_contact::create([
            'address' => '203 Fake St. Mountain View, Nasr City, Cairo, Egypt',
            'phone' => '+2 392 3929 210',
            'whatsapp' => '+2 392 3929 210',
            'fax' => '+2 392 3929 210',
            'email' => 'info@yourdomain.com',
            'google_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.8272233472703!2d31.344593185140344!3d30.070486624297363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e0dd2418453%3A0x48a86997f284f8d6!2sSenior%20Steps!5e0!3m2!1sar!2seg!4v1640907406037!5m2!1sar!2seg',
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'youtube' => null,
            'linkedin' => null,
        ]);

    }
}
