<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz');
    }

    public function showResults(Request $request)
    {
        // Get the answers from the session
        $answers = $request->session()->get('quiz_answers', []);

        // Generate the recommendation based on the answers
        $recommendation = $this->getRecommendation($answers);

        // Log the recommendation to ensure it's correct
        \Log::info('Recommendation: ', $recommendation);

        return view('results', compact('recommendation'));
    }

    public function storeAnswers(Request $request)
    {
        // Store the selected answers in session
        $answers = $request->input('answers');
        $request->session()->put('quiz_answers', $answers);

        // Debugging: Check stored answers
        \Log::info('Stored answers: ', $answers);

        // Return success response
        return response()->json(['success' => true]);
    }

    private function getRecommendation($answers)
    {
        $combinations = [
            // Combination for Dry Skin + Pigmentation + Sensitive Skin
            [
                'criteria' => ['Dry Skin', 'Sensitive Skin', 'Pigmentation'],
                'routine' => [
                    ['type' => 'Day Cream', 'name' => 'Radiant & Protective Brightening Day Cream', 'subtitle' => 'Brightening and Hydrating', 'price' => 2800, 'image' => 'images/day_cream.png'],
                    ['type' => 'Moisturizer', 'name' => 'Hydrating Boost Moisturizer', 'subtitle' => 'Deep Hydration', 'price' => 2200, 'image' => 'images/moisturizer.png'],
                    ['type' => 'Exfoliant', 'name' => 'Smooth exfoliating Coffee & Walnut Facial Scrub', 'subtitle' => 'Exfoliates and Revitalizes', 'price' => 1699, 'image' => 'images/coffee_scrub.png'],
                    ['type' => 'Toner', 'name' => 'Refreshing Toner', 'subtitle' => 'Soothes and Balances', 'price' => 590, 'image' => 'images/refreshing_toner.png'],
                    ['type' => 'Face Pack', 'name' => 'Brightening & Rejuvenating Activated Charcoal Face Pack', 'subtitle' => 'Detoxifies and Brightens', 'price' => 1600, 'image' => 'images/charcoal_face_pack.png']
                ]
            ],
            // Combination for Oily Skin + Acne
            [
                'criteria' => ['Oily Skin', 'Acne'],
                'routine' => [
                    ['type' => 'Gel Cleanser', 'name' => 'Pimple Clear Anti Acne Mint Face Wash', 'subtitle' => 'Clears Acne and Refreshes', 'price' => 600, 'image' => 'images/anti_acne_face_wash.png'],
                    ['type' => 'Cleanser', 'name' => 'Pore-Minimizing Cleanser', 'subtitle' => 'Deep Cleans and Tightens Pores', 'price' => 1800, 'image' => 'images/pore_cleanser.png'],
                    ['type' => 'Cream', 'name' => 'Spot-correcting Anti Acne Cream', 'subtitle' => 'Reduces Acne Marks', 'price' => 1100, 'image' => 'images/anti_acne_cream.png'],
                    ['type' => 'Exfoliant', 'name' => 'Smooth exfoliating Coffee & Walnut Facial Scrub', 'subtitle' => 'Exfoliates and Brightens', 'price' => 1699, 'image' => 'images/coffee_scrub.png'],
                    ['type' => 'Face Pack', 'name' => 'Brightening & Rejuvenating Activated Charcoal Face Pack', 'subtitle' => 'Deep Cleanses and Brightens', 'price' => 1600, 'image' => 'images/charcoal_face_pack.png']
                ]
            ],
            // Combination for Combination Skin + Dark Spots
            [
                'criteria' => ['Combination', 'Dark Spots'],
                'routine' => [
                    ['type' => 'Exfoliant', 'name' => 'Smooth exfoliating Coffee & Walnut Facial Scrub', 'subtitle' => 'Exfoliates and Brightens', 'price' => 1699, 'image' => 'images/coffee_scrub.png'],
                    ['type' => 'Cream', 'name' => 'Anti-Blemish Pigmentation Cream', 'subtitle' => 'Targets Pigmentation', 'price' => 3850, 'image' => 'images/pigmentation_cream.png'],
                    ['type' => 'Face Wash', 'name' => 'Golden Radiance Fairness Face Wash', 'subtitle' => 'Brightens and Clarifies', 'price' => 600, 'image' => 'images/fairness_face_wash.png'],
                    ['type' => 'Moisturizer', 'name' => 'Hydrating Everyday Body Moisturizer', 'subtitle' => 'Hydrates and Protects', 'price' => 1200, 'image' => 'images/body_moisturizer.png']
                ]
            ],
            // Combination for Sensitive Skin + Wrinkles
            [
                'criteria' => ['Sensitive Skin', 'Wrinkles'],
                'routine' => [
                    ['type' => 'Moisturizer', 'name' => 'Anti-Aging Moisturizer', 'subtitle' => 'Reduces Wrinkles', 'price' => 2400, 'image' => 'images/moisturizer.png'],
                    ['type' => 'Toner', 'name' => 'Gentle Hydrating Toner', 'subtitle' => 'Soothes and Refreshes', 'price' => 1500, 'image' => 'images/refreshing_toner.png'],
                    ['type' => 'Day Cream', 'name' => 'Radiant & Protective Brightening Day Cream', 'subtitle' => 'Brightening and Hydrating', 'price' => 2800, 'image' => 'images/day_cream.png'],
                    ['type' => 'Night Cream', 'name' => 'Rejuvenating & Brightening Night Cream', 'subtitle' => 'Brightens and Revitalizes', 'price' => 2850, 'image' => 'images/night_cream.png'],
                ]
            ],
            // Combination for Normal Skin + Aging Concerns
            [
                'criteria' => ['Normal', 'Anti-Aging'],
                'routine' => [
                    ['type' => 'Day Cream', 'name' => 'Age-Defying Day Cream', 'subtitle' => 'With SPF 30', 'price' => 2500, 'image' => 'images/day_cream.png'],
                    ['type' => 'Moisturizer', 'name' => 'Hydrating Everyday Body Moisturizer', 'subtitle' => 'Deep Hydration', 'price' => 1200, 'image' => 'images/body_moisturizer.png'],
                    ['type' => 'Night Cream', 'name' => 'Rejuvenating & Brightening Night Cream', 'subtitle' => 'Rejuvenates and Brightens', 'price' => 2850, 'image' => 'images/night_cream.png'],
                    ['type' => 'Sun Protection', 'name' => 'Sun Cream', 'subtitle' => 'Sun Protection SPF 50', 'price' => 1100, 'image' => 'images/sun_cream.png']
                ]
            ],
            // Combination for Oily Skin + Large Pores
            [
                'criteria' => ['Oily Skin', 'Large Pores'],
                'routine' => [
                    ['type' => 'Cleanser', 'name' => 'Pore-Minimizing Cleanser', 'subtitle' => 'Deep Cleans and Tightens Pores', 'price' => 1800, 'image' => 'images/pore_cleanser.png'],
                    ['type' => 'Toner', 'name' => 'Pore Refining Toner', 'subtitle' => 'Balances and Refines', 'price' => 1600, 'image' => 'images/refreshing_toner.png'],
                    ['type' => 'Face Wash', 'name' => 'Golden Radiance Fairness Face Wash', 'subtitle' => 'Brightens and Clarifies', 'price' => 600, 'image' => 'images/fairness_face_wash.png'],
                    ['type' => 'Exfoliant', 'name' => 'Smooth exfoliating Coffee & Walnut Facial Scrub', 'subtitle' => 'Exfoliates and Revitalizes', 'price' => 1699, 'image' => 'images/coffee_scrub.png']
                ]
            ]
        ];
        

        // Find the matching combination for the answers
        foreach ($combinations as $combination) {
            if ($this->matchCriteria($answers, $combination['criteria'])) {
                return $combination['routine'];
            }
        }

        return []; // Default empty recommendation
    }

    private function matchCriteria($answers, $criteria)
    {
        // Logic to match answers with the criteria
        // This can be customized based on how answers are linked to criteria
        return count(array_intersect($answers, $criteria)) > 0;
    }
}
