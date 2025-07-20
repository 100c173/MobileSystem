<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Mobile;
use App\Models\MobileDescription;
use App\Models\MobileSpecification;
use App\Models\OperatingSystem;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MobileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mobiles = [
            [
                'name' => 'Galaxy S23 Ultra',
                'brand_id' => 1,
                'operating_system_id' => 1,
                'release_date' => '2023-02-01',
                'user_id' => 1,
                'status' => 'approved',
                'specifications' => [
                    'cpu' => 'Snapdragon 8 Gen 2',
                    'gpu' => 'Adreno 740',
                    'ram' => '12GB',
                    'storage' =>  ([
                        '128GB' => 'Base model with UFS 4.0',
                        '256GB' => 'Popular mid-tier option',
                        '512GB' => 'For power users',
                        '1TB' => 'Maximum storage option'
                    ]),
                    'camera' =>  ([
                        'main' => '200MP wide (f/1.7)',
                        'ultrawide' => '12MP (f/2.2, 120° FOV)',
                        'telephoto' => '10MP (f/2.4, 3x optical)',
                        'periscope' => '10MP (f/4.9, 10x optical)',
                        'front' => '12MP (f/2.2)'
                    ]),
                    'screen' => '6.8" Dynamic AMOLED 2X',
                    'battery' =>  ([
                        'capacity' => '5000mAh',
                        'wired_charging' => '45W Super Fast Charging',
                        'wireless' => '15W Fast Wireless Charging',
                        'reverse_wireless' => '4.5W Wireless PowerShare'
                    ]),
                    'connectivity' =>  ([
                        'network' => '5G (Sub-6GHz/mmWave)',
                        'wi_fi' => 'Wi-Fi 6E (802.11ax)',
                        'bluetooth_version' => 'Bluetooth 5.3',
                        'short_range' => 'NFC, UWB',
                        'GNSS' => 'GPS, GLONASS, Galileo, BeiDou',
                        'USB' => 'USB 3.2 Gen 1'
                    ]),
                    'security_features' =>  ([
                        'fingerprint_sensor_type' => 'Ultrasonic under-display',
                        'biometric_authentication' => 'Face recognition',
                        'security_platform' => 'Samsung Knox',
                        'private_file_protection' => 'Secure Folder',
                        'ingress_protection_rating' => 'IP68 water/dust resistant',
                        'security_updates_policy' => '5 years of security updates'
                    ])
                ],
                'description' => [
                    'design_dimensions' => '163.4 x 78.1 x 8.9 mm, 234g',
                    'display' =>  ([
                        'type' => 'Dynamic AMOLED 2X',
                        'size' => '6.8 inches',
                        'resolution' => '3088 x 1440 (QHD+)',
                        'refresh_rate' => '1-120Hz adaptive',
                        'brightness' => '1750 nits peak'
                    ]),
                    'performance_cpu' => 'Qualcomm Snapdragon 8 Gen 2 delivers flagship performance with improved efficiency',
                    'storage_desc' => 'UFS 4.0 storage with options from 256GB to 1TB, no microSD slot',
                    'connectivity_desc' => '5G (Sub6/mmWave), Wi-Fi 6E, Bluetooth 5.3, Ultra Wideband, NFC',
                    'battery_desc' => '5000mAh battery with 45W fast charging, 15W wireless charging, and 4.5W reverse wireless charging',
                    'key_features' =>  ([
                        'S Pen support' => 'Built-in slot',
                        'Water resistance' => 'IP68 certified',
                        'Fingerprint sensor' => 'Ultrasonic under-display',
                        'Audio' => 'Stereo speakers tuned by AKG'
                    ]),
                    'security_privacy' => 'Samsung Knox security platform, biometric authentication (fingerprint and face), secure folder',
                    'pros' =>  ([
                        'Excellent camera system with 10x optical zoom',
                        'Bright, high-quality 120Hz AMOLED display',
                        'Included S Pen with improved latency',
                        'Long battery life with fast charging'
                    ]),
                    'cons' =>  ([
                        'Very expensive flagship pricing',
                        'Bulky and heavy design',
                        'No charger included in box',
                        'Curved screen edges can cause accidental touches'
                    ])
                ],
                'images' => [
                    [
                        'url' => 'https://images.samsung.com/id/smartphones/galaxy-s23-ultra/images/galaxy-s23-ultra-highlights-front-s.jpg',
                        'is_primary' => true,
                        'caption' => 'Galaxy S23 Ultra front view'
                    ],
                    [
                        'url' => 'https://images.samsung.com/id/smartphones/galaxy-s23-ultra/images/galaxy-s23-ultra-highlights-back-s.jpg',
                        'is_primary' => false,
                        'caption' => 'Galaxy S23 Ultra back view'
                    ],
                    [
                        'url' => 'https://images.samsung.com/id/smartphones/galaxy-s23-ultra/images/galaxy-s23-ultra-highlights-color-s.jpg',
                        'is_primary' => false,
                        'caption' => 'Galaxy S23 Ultra in Phantom Black'
                    ]
                ]
            ],
            [
                'name' => 'iPhone 15 Pro',
                'brand_id' => 2,
                'operating_system_id' => 2,
                'release_date' => '2023-09-15',
                'user_id' => 1,
                'status' => 'approved',
                'specifications' => [
                    'cpu' => 'A17 Pro',
                    'gpu' => 'Apple GPU (6-core)',
                    'ram' => '8GB',
                    'storage' =>  ([
                        '128GB' => 'Base storage option',
                        '256GB' => 'Recommended for most users',
                        '512GB' => 'For photography enthusiasts',
                        '1TB' => 'ProRes video editing'
                    ]),
                    'camera' =>  ([
                        'main' => '48MP (f/1.78)',
                        'ultrawide' => '12MP (f/2.2, 120° FOV)',
                        'telephoto' => '12MP (f/2.8, 3x optical)',
                        'front' => '12MP (f/1.9) with TrueDepth'
                    ]),
                    'screen' => '6.1" Super Retina XDR',
                    'battery' => ( [
                        'capacity' => '3274mAh',
                        'wired_charging' => '27W with USB-C',
                        'wireless' => '15W MagSafe',
                        'reverse_wireless' => 'Not supported'
                    ]),
                    'connectivity' =>  ([
                        'network' => '5G (Sub-6GHz/mmWave)',
                        'wi_fi' => 'Wi-Fi 6E (802.11ax)',
                        'bluetooth_version' => 'Bluetooth 5.3',
                        'short_range' => 'NFC, UWB',
                        'GNSS' => 'GPS, GLONASS, Galileo, QZSS, BeiDou',
                        'USB' => 'USB-C 3.2 Gen 2 (10Gbps)'
                    ]),
                    'security_features' =>  ([
                        'fingerprint_sensor_type' => 'None (Face ID only)',
                        'biometric_authentication' => 'Face ID',
                        'security_platform' => 'Secure Enclave',
                        'private_file_protection' => 'Locked Notes and Photos',
                        'ingress_protection_rating' => 'IP68 water/dust resistant',
                        'security_updates_policy' => '6+ years of iOS updates'
                    ])
                ],
                'description' => [
                    'design_dimensions' => '146.6 x 70.6 x 8.25 mm, 187g',
                    'display' =>  ([
                        'type' => 'Super Retina XDR',
                        'size' => '6.1 inches',
                        'resolution' => '2556 x 1179',
                        'refresh_rate' => '120Hz ProMotion',
                        'brightness' => '2000 nits peak HDR'
                    ]),
                    'performance_cpu' => 'A17 Pro chip with 6-core CPU and 6-core GPU delivers desktop-class performance',
                    'storage_desc' => 'NVMe storage with options from 128GB to 1TB, no expandable storage',
                    'connectivity_desc' => '5G (Sub6/mmWave), Wi-Fi 6E, Bluetooth 5.3, Ultra Wideband, NFC, USB-C 3.2 Gen 2',
                    'battery_desc' => '3274mAh battery with up to 23 hours video playback, supports fast charging and MagSafe wireless charging',
                    'key_features' => ( [
                        'Dynamic Island' => 'New interactive area',
                        'Action button' => 'Customizable hardware switch',
                        'Camera system' => 'Pro-level photography',
                        'Build materials' => 'Titanium frame'
                    ]),
                    'security_privacy' => 'Face ID authentication, Secure Enclave, on-device processing, privacy indicators',
                    'pros' =>  ([
                        'Premium titanium design',
                        'Incredible performance',
                        'Best-in-class video recording',
                        'USB-C finally added'
                    ]),
                    'cons' =>  ([
                        'Very expensive',
                        'Limited customization options',
                        'No fingerprint sensor',
                        'Small battery compared to Android flagships'
                    ])
                ],
                'images' => [
                    [
                        'url' => 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1693009279096',
                        'is_primary' => true,
                        'caption' => 'iPhone 15 Pro front view'
                    ],
                    [
                        'url' => 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch-blue-titanium?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1693009279096',
                        'is_primary' => false,
                        'caption' => 'iPhone 15 Pro back view'
                    ],
                    [
                        'url' => 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch-natural-titanium?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1693009279096',
                        'is_primary' => false,
                        'caption' => 'iPhone 15 Pro in Natural Titanium'
                    ]
                ]
            ]
        ];

        foreach ($mobiles as $mobileData) {
            // Create mobile
            $mobile = Mobile::create([
                'name' => $mobileData['name'],
                'brand_id' => $mobileData['brand_id'],
                'operating_system_id' => $mobileData['operating_system_id'],
                'release_date' => $mobileData['release_date'],
                'user_id' => $mobileData['user_id'],
                'status' => $mobileData['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            // Create specifications (encode arrays as JSON)
            MobileSpecification::create([
                'mobile_id' => $mobile->id,
                'cpu' => $mobileData['specifications']['cpu'],
                'gpu' => $mobileData['specifications']['gpu'],
                'ram' => $mobileData['specifications']['ram'],
                'storage' => ($mobileData['specifications']['storage']),
                'camera' => ($mobileData['specifications']['camera']),
                'screen' => $mobileData['specifications']['screen'],
                'battery' => ($mobileData['specifications']['battery']),
                'connectivity' => ($mobileData['specifications']['connectivity']),
                'security_features' => ($mobileData['specifications']['security_features']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            // Create description (encode arrays as JSON)
            MobileDescription::create([
                'mobile_id' => $mobile->id,
                'design_dimensions' => $mobileData['description']['design_dimensions'],
                'display' => ($mobileData['description']['display']),
                'performance_cpu' => $mobileData['description']['performance_cpu'],
                'storage_desc' => $mobileData['description']['storage_desc'],
                'connectivity_desc' => $mobileData['description']['connectivity_desc'],
                'battery_desc' => $mobileData['description']['battery_desc'],
                'key_features' => ($mobileData['description']['key_features']),
                'security_privacy' => $mobileData['description']['security_privacy'],
                'pros' => ($mobileData['description']['pros']),
                'cons' => ($mobileData['description']['cons']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            // Create images
            foreach ($mobileData['images'] as $imageData) {
                $mobile->images()->create([
                    'url' => $imageData['url'],
                    'is_primary' => $imageData['is_primary'],
                    'caption' => $imageData['caption'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
