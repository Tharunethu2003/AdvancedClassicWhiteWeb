<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Product::create([
            'name' => 'Rejuvenating Night-time Body Lotion',
            'slug' => 'rejuvenating-night-time-body-lotion',
            'image' => 'images/prd1.jpg',
            'price' => 690.00,
            'description' => 'A rejuvenating night-time body lotion to nourish your skin.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Sandalwood Day & Night Cream',
            'slug' => 'sandalwood-day-night-cream',
            'image' => 'images/prd2.jpg',
            'price' => 690.00,
            'description' => 'A day & night cream with sandalwood to keep your skin glowing.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Rejuvenating Day Cream',
            'slug' => 'rejuvenating-day-cream',
            'image' => 'images/prd3.jpg',
            'price' => 690.00,
            'description' => 'A rejuvenating day cream that helps to brighten and smooth the skin.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Brightening Day Cream',
            'slug' => 'brightening-day-cream',
            'image' => 'images/prd4.jpg',
            'price' => 690.00,
            'description' => 'A brightening day cream that helps even skin tone and reduces dark spots.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Anti-acne Cream',
            'slug' => 'anti-acne-cream',
            'image' => 'images/prd5.jpg',
            'price' => 690.00,
            'description' => 'A cream to help reduce acne and prevent future breakouts.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Walnut & Coffee Facial Scrub',
            'slug' => 'walnut-coffee-facial-scrub',
            'image' => 'images/prd6.jpg',
            'price' => 690.00,
            'description' => 'A facial scrub with walnut and coffee to exfoliate and refresh your skin.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Nourishing Lip Balm',
            'slug' => 'nourishing-lip-balm',
            'image' => 'images/prd7.jpg',
            'price' => 490.00,
            'description' => 'A nourishing lip balm that keeps your lips soft and hydrated.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Hydrating Face Mask',
            'slug' => 'hydrating-face-mask',
            'image' => 'images/prd8.jpg',
            'price' => 990.00,
            'description' => 'A hydrating face mask to restore moisture and smooth your skin.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Soothing Aloe Vera Gel',
            'slug' => 'soothing-aloe-vera-gel',
            'image' => 'images/prd9.jpg',
            'price' => 450.00,
            'description' => 'A soothing aloe vera gel for calming irritated skin and sunburns.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Lavender & Honey Body Scrub',
            'slug' => 'lavender-honey-body-scrub',
            'image' => 'images/prd10.jpg',
            'price' => 850.00,
            'description' => 'A lavender & honey body scrub to exfoliate and moisturize your skin.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Cleansing Micellar Water',
            'slug' => 'cleansing-micellar-water',
            'image' => 'images/prd11.jpg',
            'price' => 650.00,
            'description' => 'A gentle cleansing micellar water to remove makeup and impurities.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Aloe Vera Face Gel',
            'slug' => 'aloe-vera-face-gel',
            'image' => 'images/prd12.jpg',
            'price' => 499.00,
            'description' => 'A soothing aloe vera face gel to calm and hydrate your skin.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Rose & Aloe Vera Body Lotion',
            'slug' => 'rose-aloe-vera-body-lotion',
            'image' => 'images/prd13.jpg',
            'price' => 750.00,
            'description' => 'A body lotion with rose and aloe vera to nourish and smooth your skin.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Luxury Face Cream',
            'slug' => 'luxury-face-cream',
            'image' => 'images/prd14.jpg',
            'price' => 1100.00,
            'description' => 'A luxury face cream for a radiant, youthful complexion.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Exfoliating Sugar Scrub',
            'slug' => 'exfoliating-sugar-scrub',
            'image' => 'images/prd15.jpg',
            'price' => 900.00,
            'description' => 'An exfoliating sugar scrub that removes dead skin cells and smooths the skin.',
        ]);
        
        \App\Models\Product::create([
            'name' => 'Refreshing Face Mist',
            'slug' => 'refreshing-face-mist',
            'image' => 'images/prd16.jpg',
            'price' => 550.00,
            'description' => 'A refreshing face mist to hydrate and invigorate your skin.',
        ]);
    }
}
