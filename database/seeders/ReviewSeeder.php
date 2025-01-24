<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
     public function run()
     {
         $reviews = [
             [
                 'user_id' => 1,
                 'content' => 'This product is amazing! I have been using it for a week now, and it has exceeded my expectations. Highly recommend it to anyone looking for quality and performance.',
                 'rating' => 5
             ],
             [
                 'user_id' => 2,
                 'content' => 'Good quality, but the delivery was slower than expected. Still happy with the purchase overall.',
                 'rating' => 4
             ],
             [
                 'user_id' => 3,
                 'content' => 'I was a bit disappointed with the design. It looked better online. The product is okay, but not what I expected.',
                 'rating' => 3
             ],
             [
                 'user_id' => 4,
                 'content' => 'Absolutely terrible. The product broke within a few days of use. Will not buy again.',
                 'rating' => 1
             ],
             [
                 'user_id' => 5,
                 'content' => 'Great product for the price. The customer support team was very helpful when I had a question about the setup process.',
                 'rating' => 4
             ],
             [
                 'user_id' => 6,
                 'content' => 'Works as expected. The quality is decent, and it serves its purpose. Nothing special, but decent for the price.',
                 'rating' => 3
             ],
             [
                 'user_id' => 7,
                 'content' => 'Love this product! It has made a huge difference in my daily routine. Will definitely be buying again.',
                 'rating' => 5
             ],
             [
                 'user_id' => 8,
                 'content' => 'Not bad, but the product was a bit difficult to assemble. The instructions could have been clearer.',
                 'rating' => 3
             ],
             [
                 'user_id' => 9,
                 'content' => 'Fantastic! I’ve been using this for a few weeks now, and I can already see the benefits. Worth every penny!',
                 'rating' => 5
             ],
             [
                 'user_id' => 10,
                 'content' => 'The quality is not great for the price. The material feels cheap, and I was expecting something more durable.',
                 'rating' => 2
             ],
             [
                 'user_id' => 11,
                 'content' => 'Decent product. It does what it’s supposed to do, but nothing extraordinary. It could use some improvements in terms of features.',
                 'rating' => 3
             ],
             [
                 'user_id' => 12,
                 'content' => 'I had some issues with the shipping, but the product itself is great. It arrived in perfect condition and works fine.',
                 'rating' => 4
             ],
             [
                 'user_id' => 13,
                 'content' => 'This is my second time purchasing this product, and I’m still as happy as the first time! Excellent quality and fast delivery.',
                 'rating' => 5
             ],
             [
                 'user_id' => 14,
                 'content' => 'Not worth the money. It looks good, but after using it for a while, I don’t think it’s worth the price.',
                 'rating' => 2
             ],
             [
                 'user_id' => 15,
                 'content' => 'Very satisfied with my purchase. The product works as described and has helped me a lot in my daily activities. Definitely recommend!',
                 'rating' => 5
             ]
         ];
     
         foreach ($reviews as $review) {
             Review::create($review);
         }
     }
     

}
