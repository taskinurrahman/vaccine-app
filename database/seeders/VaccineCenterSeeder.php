<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VaccineCenter;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaccineCenters = [
            [
                'name' => 'Dhaka Medical College Hospital',
                'location' => 'Secretariat Road, Dhaka',
                'capacity' => 500,
            ],
            [
                'name' => 'Sir Salimullah Medical College Hospital (Mitford)',
                'location' => 'Nimtoli, Dhaka',
                'capacity' => 400,
            ],
            [
                'name' => 'Shaheed Suhrawardy Medical College Hospital',
                'location' => 'Sher-e-Bangla Nagar, Dhaka',
                'capacity' => 350,
            ],
            [
                'name' => 'Kurmitola General Hospital',
                'location' => 'Airport Road, Dhaka',
                'capacity' => 300,
            ],
            [
                'name' => 'Mugda Medical College and Hospital',
                'location' => 'Mugda, Dhaka',
                'capacity' => 250,
            ],
            [
                'name' => 'Bangabandhu Sheikh Mujib Medical University (BSMMU)',
                'location' => 'Shahbagh, Dhaka',
                'capacity' => 600,
            ],
            [
                'name' => 'Dhaka Shishu (Children) Hospital',
                'location' => 'Sher-e-Bangla Nagar, Dhaka',
                'capacity' => 200,
            ],
            [
                'name' => 'Holy Family Red Crescent Medical College Hospital',
                'location' => 'Eskaton Garden Road, Dhaka',
                'capacity' => 220,
            ],
            [
                'name' => 'National Institute of Cardiovascular Diseases',
                'location' => 'Sher-e-Bangla Nagar, Dhaka',
                'capacity' => 200,
            ],
            [
                'name' => 'National Institute of Traumatology & Orthopaedic Rehabilitation (NITOR)',
                'location' => 'Sher-e-Bangla Nagar, Dhaka',
                'capacity' => 150,
            ],
            [
                'name' => 'National Institute of Mental Health',
                'location' => 'Sher-e-Bangla Nagar, Dhaka',
                'capacity' => 150,
            ],
            [
                'name' => 'National Institute of Cancer Research & Hospital',
                'location' => 'Mohakhali, Dhaka',
                'capacity' => 300,
            ],
            [
                'name' => 'National Institute of Neurosciences & Hospital',
                'location' => 'Sher-e-Bangla Nagar, Dhaka',
                'capacity' => 200,
            ],
            [
                'name' => 'Ibrahim Cardiac Hospital & Research Institute',
                'location' => 'Shahbagh, Dhaka',
                'capacity' => 150,
            ],
            [
                'name' => 'Shaheed Monsur Ali Medical College Hospital',
                'location' => 'Uttara, Dhaka',
                'capacity' => 200,
            ],
            [
                'name' => 'United Hospital',
                'location' => 'Gulshan 2, Dhaka',
                'capacity' => 180,
            ],
            [
                'name' => 'Square Hospital',
                'location' => 'Panthapath, Dhaka',
                'capacity' => 220,
            ],
            [
                'name' => 'Ibn Sina Hospital',
                'location' => 'Kallyanpur, Dhaka',
                'capacity' => 160,
            ],
            [
                'name' => 'Labaid Hospital',
                'location' => 'Dhanmondi, Dhaka',
                'capacity' => 180,
            ],
            [
                'name' => 'Popular Diagnostic Center & Hospital',
                'location' => 'Dhanmondi, Dhaka',
                'capacity' => 170,
            ],
        ];

        foreach ($vaccineCenters as $center) {
            VaccineCenter::create($center);
        }
    }
}
