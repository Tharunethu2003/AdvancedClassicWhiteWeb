@extends('layouts.app')

@section('content')
@include('navbar') <!-- Include the navbar -->

<!-- Navbar Section -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Quiz Section -->
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-6" style="font-family: 'Inria Serif', serif;">
        <h2 class="text-2xl font-bold text-center mb-6" style="color: #3C294B;">Get Your Personalized Skincare Routine!</h2>
        <p class="text-center mb-4" style="color: #3C294B;">Answer these questions to discover a skincare routine tailored just for you.</p>

        <!-- Progress Bar -->
        <div class="w-full bg-gray-300 rounded-full h-4 mb-6">
            <div class="h-4 rounded-full" style="background-color: #83566C; width: 15%;" id="progress-bar"></div>
        </div>

        <!-- Quiz Question Section -->
        <div class="bg-[#D4BEE4] p-8 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4" id="question-text" style="color: #3C294B;">What type of skin do you have?</h3>
            <div id="options" class="flex flex-col space-y-6">
                <!-- Options will be dynamically added here -->
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between mt-6">
            <button class="text-white py-2 px-4 rounded-lg" id="back-button" style="background-color: #83566C;" disabled>Back</button>
            <button class="text-white py-2 px-4 rounded-lg" id="next-button" style="background-color: #83566C;">Next</button>
        </div>

        <!-- See Results Button -->
        <div class="mt-6">
            <button class="text-white py-2 px-4 rounded-lg hidden" id="see-results-button" style="background-color: #83566C;">See Results</button>
        </div>

        <!-- Results Section -->
        <div id="results" class="mt-8 hidden">
            <h3 class="text-2xl font-bold mb-4" style="color: #3C294B;">Your Skincare Routine Recommendation</h3>
            <div id="answers-summary" class="mb-6">
                <!-- Answers will be displayed here -->
            </div>
            <div id="recommendation" class="bg-indigo-100 p-6 rounded-lg shadow-md">
                <h4 class="font-semibold text-xl" style="color: #3C294B;">Recommended Routine:</h4>
                <ul id="routine-list" class="list-disc ml-5">
                    <!-- Routine recommendations will go here -->
                </ul>
            </div>
        </div>
    </div>
</div>

@include('footer')

@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const questions = [
            { text: "What type of skin do you have?", options: ["Oily Skin", "Dry Skin", "Sensitive Skin", "Rough Skin", "Combination"] },
            { text: "Do you have any specific skin concerns?", options: ["Acne", "Wrinkles", "Dark Spots", "Sensitive Skin", "Dryness"] },
            { text: "What is your current skincare routine like?", options: ["Cleanser", "Toner", "Serum", "Moisturizer", "Sunscreen"] },
            { text: "Do you have any known allergies or sensitivities?", options: ["Yes", "No"] },
            { text: "How often do you spend time outdoors, and do you use sunscreen?", options: ["Often", "Rarely", "Never"] },
            { text: "What’s your skin type in terms of oiliness?", options: ["Very Oily", "Moderately Oily", "Dry", "Normal"] },
            { text: "Do you prefer a minimal or extensive skincare routine?", options: ["Minimal", "Extensive"] },
            { text: "Are you concerned about anti-aging?", options: ["Yes", "No"] },
            { text: "Do you often experience redness or irritation on your skin?", options: ["Yes", "No"] },
            { text: "How would you describe your complexion?", options: ["Fair", "Medium", "Dark", "Olive"] },
            { text: "Do you have any acne scarring?", options: ["Yes", "No"] },
            { text: "What kind of sunscreen do you prefer?", options: ["Chemical", "Physical", "Both", "None"] },
            { text: "How sensitive is your skin to new products?", options: ["Very Sensitive", "Somewhat Sensitive", "Not Sensitive"] },
            { text: "How often do you experience dry patches or flakiness?", options: ["Frequently", "Occasionally", "Never"] },
            { text: "Do you use any exfoliating products?", options: ["Yes", "No"] }
        ];

        let currentQuestion = 0;
        let answers = Array(questions.length).fill(null);

        const questionText = document.getElementById('question-text');
        const optionsContainer = document.getElementById('options');
        const progressBar = document.getElementById('progress-bar');
        const backButton = document.getElementById('back-button');
        const nextButton = document.getElementById('next-button');
        const seeResultsButton = document.getElementById('see-results-button');

        function updateQuestion() {
            questionText.textContent = questions[currentQuestion].text;
            optionsContainer.innerHTML = '';

            questions[currentQuestion].options.forEach((option, index) => {
                const button = document.createElement('button');
                button.classList.add('text-white', 'py-2', 'rounded-full', 'my-2');
                button.textContent = option;
                button.style.backgroundColor = answers[currentQuestion] === option ? '#3C294B' : '#83566C';

                button.addEventListener('click', () => {
                    answers[currentQuestion] = option;
                    Array.from(optionsContainer.children).forEach(btn => btn.style.backgroundColor = '#83566C');
                    button.style.backgroundColor = '#3C294B';
                    nextButton.disabled = false; // Enable Next button once an option is selected
                });

                optionsContainer.appendChild(button);
            });

            progressBar.style.width = `${((currentQuestion + 1) / questions.length) * 100}%`;
            backButton.disabled = currentQuestion === 0;
            nextButton.disabled = !answers[currentQuestion]; // Disable Next if no answer selected
            seeResultsButton.classList.toggle('hidden', currentQuestion !== questions.length - 1);
        }

        nextButton.addEventListener('click', () => {
            if (currentQuestion < questions.length - 1) {
                currentQuestion++;
                updateQuestion();
            }
        });

        backButton.addEventListener('click', () => {
            if (currentQuestion > 0) {
                currentQuestion--;
                updateQuestion();
            }
        });

        seeResultsButton.addEventListener('click', () => {
            fetch('/quiz/store-answers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ answers })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirect to the results page after successful answer submission
                    window.location.href = '/quiz/results';
                } else {
                    alert('There was an issue saving your answers.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while saving your answers.');
            });
        });

        updateQuestion();
    });
</script>
