<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobileSpecificationSeeder extends Seeder
{
    public function run(): void
    {
        $specifications = [
            // Sample specification for a flagship phone
            [

                'mobile_id' => 1, // Assuming this links to a mobile in your 'mobiles' table
                'cpu' => 'Snapdragon 8 Gen 3',
                'gpu' => 'Adreno 750',
                'ram' => '12GB LPDDR5X',
                'storage' => json_encode([
                    '128GB' => 'UFS 3.1',
                    '256GB' => 'UFS 4.0',
                    '512GB' => 'UFS 4.0',
                    '1TB' => 'UFS 4.0'
                ]),
                'camera' => json_encode([
                    'main' => '200MP, f/1.7, OIS',
                    'ultrawide' => '12MP, f/2.2, 120° FOV',
                    'telephoto' => '50MP, f/3.5, 10x optical zoom',
                    'front' => '32MP, f/2.2'
                ]),
                'screen' => '6.8" Dynamic AMOLED 2X, 1440x3088, 120Hz',
                'battery' => json_encode([
                    'capacity' => '5000mAh',
                    'wired_charging' => '45W',
                    'wireless' => '15W',
                    'reverse_wireless' => '4.5W'
                ]),
                'connectivity' => json_encode([
                    'network' => '5G (Sub6/mmWave), LTE',
                    'wi_fi' => 'Wi-Fi 6E (802.11ax)',
                    'bluetooth_version' => '5.3',
                    'short_range' => 'NFC, UWB',
                    'GNSS' => 'GPS, GLONASS, Galileo, BeiDou',
                    'USB' => 'USB 3.2 Gen 2 Type-C'
                ]),
                'security_features' => json_encode([
                    'fingerprint_sensor_type' => 'Ultrasonic under-display',
                    'biometric_authentication' => 'Face recognition (3D)',
                    'security_platform' => 'Samsung Knox',
                    'private_file_protection' => 'Secure Folder, Private Share',
                    'ingress_protection_rating' => 'IP68',
                    'security_updates_policy' => '5 years of security updates'
                ]),
                'created_at' => now(),
                'updated_at' => now()

            ],

            // Sample specification for a mid-range phone
            [

                'mobile_id' => 2,
                'cpu' => 'Dimensity 7200',
                'gpu' => 'Mali-G610 MC4',
                'ram' => '8GB LPDDR4X',
                'storage' => json_encode([
                    '128GB' => 'UFS 2.2',
                    '256GB' => 'UFS 2.2'
                ]),
                'camera' => json_encode([
                    'main' => '64MP, f/1.8, OIS',
                    'ultrawide' => '8MP, f/2.2, 118° FOV',
                    'macro' => '2MP, f/2.4',
                    'front' => '16MP, f/2.0'
                ]),
                'screen' => '6.7" AMOLED, 1080x2400, 90Hz',
                'battery' => json_encode([
                    'capacity' => '4500mAh',
                    'wired_charging' => '67W',
                    'wireless' => 'Not supported',
                    'reverse_wireless' => 'Not supported'
                ]),
                'connectivity' => json_encode([
                    'network' => '5G (Sub6), LTE',
                    'wi_fi' => 'Wi-Fi 6 (802.11ax)',
                    'bluetooth_version' => '5.2',
                    'short_range' => 'NFC',
                    'GNSS' => 'GPS, GLONASS, Galileo',
                    'USB' => 'USB 2.0 Type-C'
                ]),
                'security_features' => json_encode([
                    'fingerprint_sensor_type' => 'Optical under-display',
                    'biometric_authentication' => 'Face recognition (2D)',
                    'security_platform' => 'Standard Android',
                    'private_file_protection' => 'File encryption',
                    'ingress_protection_rating' => 'IP53',
                    'security_updates_policy' => '3 years of security updates'
                ]),
                'created_at' => now(),
                'updated_at' => now()

            ],

            // Sample specification for an entry-level phone
            [
                'mobile_id' => 3,
                'cpu' => 'Snapdragon 4 Gen 1',
                'gpu' => 'Adreno 619',
                'ram' => '6GB LPDDR4X',
                'storage' => json_encode([
                    '64GB' => 'eMMC 5.1',
                    '128GB' => 'eMMC 5.1'
                ]),
                'camera' => json_encode([
                    'main' => '50MP, f/1.8',
                    'depth' => '2MP, f/2.4',
                    'front' => '8MP, f/2.0'
                ]),
                'screen' => '6.5" IPS LCD, 720x1600, 60Hz',
                'battery' => json_encode([
                    'capacity' => '5000mAh',
                    'wired_charging' => '18W',
                    'wireless' => 'Not supported',
                    'reverse_wireless' => 'Not supported'
                ]),
                'connectivity' => json_encode([
                    'network' => 'LTE',
                    'wi_fi' => 'Wi-Fi 5 (802.11ac)',
                    'bluetooth_version' => '5.0',
                    'short_range' => 'NFC (region dependent)',
                    'GNSS' => 'GPS, GLONASS',
                    'USB' => 'USB 2.0 Type-C'
                ]),
                'security_features' => json_encode([
                    'fingerprint_sensor_type' => 'Side-mounted',
                    'biometric_authentication' => 'Face recognition (2D)',
                    'security_platform' => 'Standard Android',
                    'private_file_protection' => 'Basic file encryption',
                    'ingress_protection_rating' => 'None',
                    'security_updates_policy' => '2 years of security updates'
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('mobile_specification')->insert($specifications);
    }
}
