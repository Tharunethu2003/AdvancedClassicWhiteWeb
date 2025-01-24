<div style="max-width: 28rem; margin: 2.5rem auto; background-color: white; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 0.75rem; padding: 1.5rem; border: 1px solid #E5E7EB;">
    <h2 style="font-size: 1.875rem; font-weight: 600; color: #4F46E5; margin-bottom: 1.5rem; text-align: center;">Dermatologist Login</h2>
    <form action="{{ url('/dermatologist/login') }}" method="POST">
        @csrf
        <div style="margin-bottom: 1.5rem;">
            <label for="email" style="display: block; color: #1F2937; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">Email Address</label>
            <input type="email" name="email" id="email" style="width: 100%; border: 2px solid #D1D5DB; border-radius: 0.75rem; padding: 0.75rem; font-size: 1rem; outline: none; transition: all 0.3s ease; focus:ring: 2px solid #6366F1; focus:border: #6366F1;" placeholder="Enter your email" required>
        </div>
        <div style="margin-bottom: 1.5rem;">
            <label for="password" style="display: block; color: #1F2937; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">Password</label>
            <input type="password" name="password" id="password" style="width: 100%; border: 2px solid #D1D5DB; border-radius: 0.75rem; padding: 0.75rem; font-size: 1rem; outline: none; transition: all 0.3s ease; focus:ring: 2px solid #6366F1; focus:border: #6366F1;" placeholder="Enter your password" required>
        </div>
        <button type="submit" style="width: 100%; background-color: #4F46E5; color: white; font-weight: 600; padding: 0.75rem; border-radius: 0.75rem; font-size: 1rem; cursor: pointer; transition: all 0.3s ease-in-out; transform: scale(1); border: none; outline: none;" onmouseover="this.style.backgroundColor='#4338CA';" onmouseout="this.style.backgroundColor='#4F46E5';" onmousedown="this.style.transform='scale(1.05)';" onmouseup="this.style.transform='scale(1)';">
            Login
        </button>
    </form>
    
</div>
