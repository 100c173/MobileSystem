<?php

namespace Database\Seeders;

use App\Models\Mobile;
use App\Models\MobileImage;
use Illuminate\Database\Seeder;

class MobileImageSeeder extends Seeder
{
    private array $brandImageUrls = [
        'apple' => [
            'base_url' => 'https://fdn2.gsmarena.com/vv/bigpic/',
            'models' => [
                'iPhone 15 Pro' => [
                    'slug' => 'apple-iphone-15-pro',
                    'images' => [
                        ['angle' => 'front', 'caption' => 'Front view', 'primary' => true],
                        ['angle' => 'back', 'caption' => 'Back view', 'primary' => false],
                        ['angle' => 'all', 'caption' => 'All angles', 'primary' => false],
                        ['angle' => 'display', 'caption' => 'Screen display', 'primary' => false]
                    ]
                ],
                'iPhone 14 Pro' => [
                    'slug' => 'apple-iphone-14-pro',
                    'images' => [
                        ['angle' => 'front', 'caption' => 'Front view', 'primary' => true],
                        ['angle' => 'back', 'caption' => 'Back view', 'primary' => false],
                        ['angle' => 'side', 'caption' => 'Side view', 'primary' => false]
                    ]
                ]
            ]
        ],
        'samsung' => [
            'base_url' => 'https://fdn2.gsmarena.com/vv/bigpic/',
            'models' => [
                'Samsung Galaxy S24 Ultra' => [
                    'slug' => 'samsung-galaxy-s24-ultra',
                    'images' => [
                        ['angle' => 'front', 'caption' => 'Front view', 'primary' => true],
                        ['angle' => 'back', 'caption' => 'Back view', 'primary' => false],
                        ['angle' => 'side', 'caption' => 'Side view', 'primary' => false],
                        ['angle' => 'display', 'caption' => 'Screen display', 'primary' => false]
                    ]
                ],
                'Samsung Galaxy S23 Ultra' => [
                    'slug' => 'samsung-galaxy-s23-ultra',
                    'images' => [
                        ['angle' => 'front', 'caption' => 'Front view', 'primary' => true],
                        ['angle' => 'back', 'caption' => 'Back view', 'primary' => false],
                        ['angle' => 'angle', 'caption' => '45° angle view', 'primary' => false]
                    ]
                ]
            ]
        ],
        'xiaomi' => [
            'base_url' => 'https://fdn2.gsmarena.com/vv/bigpic/',
            'models' => [
                'Xiaomi 13 Pro' => [
                    'slug' => 'xiaomi-13-pro',
                    'images' => [
                        ['angle' => 'front', 'caption' => 'Front view', 'primary' => true],
                        ['angle' => 'back', 'caption' => 'Back view', 'primary' => false],
                        ['angle' => 'side', 'caption' => 'Side view', 'primary' => false]
                    ]
                ]
            ]
        ],
        'google' => [
            'base_url' => 'https://fdn2.gsmarena.com/vv/bigpic/',
            'models' => [
                'Google Pixel 8 Pro' => [
                    'slug' => 'google-pixel-8-pro',
                    'images' => [
                        ['angle' => 'front', 'caption' => 'Front view', 'primary' => true],
                        ['angle' => 'back', 'caption' => 'Back view', 'primary' => false],
                        ['angle' => 'display', 'caption' => 'Screen display', 'primary' => false]
                    ]
                ]
            ]
        ]
    ];

    public function run(): void
    {
        $mobiles = Mobile::with('brand')->get();

        if ($mobiles->isEmpty()) {
            $this->command->info('No mobile devices found. Please seed mobiles table first.');
            return;
        }

        $imagesToCreate = [];

        foreach ($mobiles as $mobile) {
            $brandName = strtolower($mobile->brand->name);
            $modelName = $mobile->name;

            if (!isset($this->brandImageUrls[$brandName])) {
                $this->command->info("No image URLs configured for brand: {$brandName}");
                continue;
            }

            $brandConfig = $this->brandImageUrls[$brandName];
            $modelConfig = null;

            // البحث عن تكوين النموذج (التحقق من التطابق التام أولاً)
            foreach ($brandConfig['models'] as $configModelName => $config) {
                if (strtolower($configModelName) === strtolower($modelName)) {
                    $modelConfig = $config;
                    break;
                }
            }

            if (!$modelConfig) {
                $this->command->info("No image URLs configured for model: {$modelName}");
                continue;
            }

            $modelSlug = $modelConfig['slug'];
            $imageConfigs = $modelConfig['images'];

            foreach ($imageConfigs as $imageConfig) {
                $angle = $imageConfig['angle'];
                $caption = $imageConfig['caption'];
                $isPrimary = $imageConfig['primary'];

                $imageUrl = "{$brandConfig['base_url']}{$modelSlug}.jpg";

                // معالجة خاصة للزوايا المختلفة إذا كانت متاحة
                if ($angle !== 'front') {
                    $imageUrl = "{$brandConfig['base_url']}{$modelSlug}-{$angle}.jpg";
                }

                $imagesToCreate[] = [
                    'mobile_id' => $mobile->id,
                    'image_url' => $imageUrl,
                    'is_primary' => $isPrimary,
                    'caption' => "{$modelName} {$caption}",
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            // إضافة متغيرات الألوان (2-3 ألوان عشوائية)
            $colors = ['black', 'silver', 'blue', 'green', 'gold'];
            shuffle($colors);
            $selectedColors = array_slice($colors, 0, rand(2, 3));

            foreach ($selectedColors as $color) {
                $imagesToCreate[] = [
                    'mobile_id' => $mobile->id,
                    'image_url' => "{$brandConfig['base_url']}{$modelSlug}-{$color}.jpg",
                    'is_primary' => false,
                    'caption' => "{$modelName} {$color} color variant",
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        // الإدراج على شكل قطع لأداء أفضل
        foreach (array_chunk($imagesToCreate, 50) as $chunk) {
            MobileImage::insert($chunk);
        }

        $this->command->info('Successfully seeded mobile images using online URLs.');
    }
}