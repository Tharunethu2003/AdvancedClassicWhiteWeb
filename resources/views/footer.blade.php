<footer style="background-color: #fff; padding: 40px 0;">
    
    <!-- Second Row: Main Footer Content -->
    <div style="background-color: #9b7f9b; padding: 50px 0;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 40px;">
            <!-- Left Section: Stay in Touch -->
            <div style="text-align: center;">
                <img src="{{ asset('images/logo1.png') }}" alt="Logo" style="margin-bottom: 20px; margin-left: 85px; width: 200px;"> 
                <p style="font-size: 18px; font-weight: bold; margin-bottom: 20px;">STAY IN TOUCH</p>
                <div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
                    <img src="{{ asset('images/inlogo.png') }}" alt="Instagram Logo" style="width: 30px;"> 
                    <img src="{{ asset('images/fblogo.png') }}" alt="Facebook Logo" style="width: 30px;"> 
                </div>
            </div>

            <!-- Middle Section: Quick Links -->
            <div style="text-align: center;">
                <p style="font-size: 22px; font-weight: bold; margin-bottom: 20px;">Quick Links</p>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">
                        <a href="{{ route('about-us') }}" style="color: #333; text-decoration: none; font-size: 16px; border-bottom: 2px solid transparent; transition: all 0.3s;">
                            About Us
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: #333; text-decoration: none; font-size: 16px; border-bottom: 2px solid transparent; transition: all 0.3s;">
                            All Products
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: #333; text-decoration: none; font-size: 16px; border-bottom: 2px solid transparent; transition: all 0.3s;">
                            Skin Care
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: #333; text-decoration: none; font-size: 16px; border-bottom: 2px solid transparent; transition: all 0.3s;">
                            Body Care
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: #333; text-decoration: none; font-size: 16px; border-bottom: 2px solid transparent; transition: all 0.3s;">
                            Hair Care
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: #333; text-decoration: none; font-size: 16px; border-bottom: 2px solid transparent; transition: all 0.3s;">
                            Beauty Bundles
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: #333; text-decoration: none; font-size: 16px; border-bottom: 2px solid transparent; transition: all 0.3s;">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Right Section: Quote and Manufacturer Info -->
            <div style="text-align: center;">
                <p style="font-style: italic; font-size: 18px; margin-bottom: 20px; font-family: 'Georgia', serif;">
                    "At Advanced Classic White, we believe in celebrating individuality through skincare,
                    inspired by Sri Lankan beauty traditions and advanced skincare science. We're committed to creating
                    a space where beauty is empowering, authentic, and uniquely yours."
                </p>
                <div style="display: flex; justify-content: center; gap: 30px; padding-bottom: 30px;">
                    <img src="{{ asset('images/gmp.png') }}" alt="Certified" style="width: 20%; object-fit: cover; max-width: 150px;"> 
                    <img src="{{ asset('images/nmbclogo.png') }}" alt="Nature" style="width: 20%; object-fit: cover; max-width: 150px;">
                </div>
            </div>
        </div>
    </div>
</footer>
