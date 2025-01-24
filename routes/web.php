<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\DermatologistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;




use App\Http\Controllers\ProductController;

// Public Routes
Route::get('/', function () {
    return view('home'); // Blade view for Home page
})->name('home');

Route::view('/about-us', 'about-us')->name('about-us'); // About Us page
Route::view('/store', 'store')->name('store'); // Store page

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');

Route::get('/shipping', [ShippingController::class, 'index'])->name('shipping');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');

// User Authentication Routes
Route::middleware('guest')->group(function () {
    Route::view('login', 'user-login')->name('login');
    Route::post('login', [LoginController::class, 'login']);

    Route::view('register', 'user-register')->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::view('login/admin', 'admin-login')->name('admin.login');
    Route::post('login/admin', [AdminLoginController::class, 'login']);
});

// Cart Routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/cart/update/{itemId}', [CartController::class, 'updateQuantity']);
    Route::post('/cart/remove/{itemId}', [CartController::class, 'removeItem']);
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    // In routes/web.php



});

Route::middleware('auth')->group(function () {
    // Cart Route (for viewing the cart and checking out)
    Route::match(['get', 'post'], '/cart/index', [CartController::class, 'checkout'])->name('cart.index');

    // Checkout Route - Handling both GET and POST requests
    Route::match(['get', 'post'], '/checkout', function () {
        // Example fetching cart data - Replace this with actual logic for getting cart items and total
        $cartItems = session('cartItems', []); // Assuming cart items are stored in session
        $totalAmount = session('totalAmount', 0); // Assuming total is stored in session

        // Handle POST request (checkout submission)
        if (request()->isMethod('post')) {
            // Submit the checkout form (pass to controller or handle here)
            return redirect()->route('checkout.submit');
        }

        // For GET request, show the checkout page
        return view('checkout', compact('cartItems', 'totalAmount'));
    })->name('checkout');
    
    // Checkout form submission handler
    Route::post('/checkout/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard Routes
    Route::get('/dashboard', function () {
        return view('dashboard'); // User Dashboard
    })->name('dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin-dashboard'); // Admin Dashboard
    })->name('admin.dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

    // Quiz Routes
    Route::prefix('quiz')->group(function () {
        Route::get('/', [QuizController::class, 'index'])->name('quiz.index');
        Route::get('/start', [QuizController::class, 'start'])->name('quiz.start');
        Route::post('/store-answers', [QuizController::class, 'storeAnswers'])->name('quiz.storeAnswers');
        Route::get('/results', [QuizController::class, 'showResults'])->name('quiz.results');
    });

    // Logout Route
    Route::post('logout', function () {
        Auth::logout();
        return redirect('/'); // Redirect to Home page
    })->name('logout');
});

// Routes with Jetstream Middleware
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});






Route::middleware(['auth'])->group(function () {
    // Display reviews
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

    // Store new review
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});




Route::get('/products', [ProductController::class, 'index'])->name('products.index');



Route::post('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');

Route::get('/checkout', [OrderController::class, 'showCheckout'])->name('checkout');
Route::post('/order/confirm', [OrderController::class, 'confirmOrder'])->name('order.confirm');
Route::get('/order/confirmation/{orderId}', [OrderController::class, 'orderConfirmation'])->name('order.confirmation');

// Display the appointment form
Route::get('/appointments', [AppointmentController::class, 'create'])->name('appointments.create');

// Store the appointment
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

// Show the appointment summary
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');

Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.summary');


Route::post('/appointments/appointmentdet', function () {
    // Handle the POST request here
    return view('appointments.appointmentdet');  // Assuming this is your Blade view
})->name('appointments.appointmentdet');



Route::get('/payment', [PaymentController::class, 'createPayment'])->name('payment.create');
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::post('/checkout', [CheckoutController::class, 'createCheckoutSession'])->name('checkout.create');



Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.appointmentdet');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');



Route::get('/dermatologist/login', [DermatologistController::class, 'showLoginForm'])->name('dermatologist.login');
Route::post('/dermatologist/login', [DermatologistController::class, 'login']);
Route::middleware('auth:dermatologist')->group(function () {
    Route::get('/dermatologist/dashboard', [DermatologistController::class, 'dashboard'])->name('dermatologist.dashboard');
});
