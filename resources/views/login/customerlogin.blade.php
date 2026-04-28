<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title> Customer Login | Secure Access</title>
  <!-- Google Fonts + simple reset -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <!-- Font Awesome 6 (free icons) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(145deg, #f6f9fc 0%, #eef2f5 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
      position: relative;
    }

    /* subtle animated background grain/glow */
    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at 20% 30%, rgba(99, 102, 241, 0.05) 0%, rgba(255,255,255,0) 70%);
      pointer-events: none;
      z-index: 0;
    }

    /* main card */
    .login-container {
      width: 100%;
      max-width: 480px;
      background: rgba(255, 255, 255, 0.96);
      backdrop-filter: blur(0px);
      border-radius: 2rem;
      box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.2), 0 2px 6px rgba(0,0,0,0.02);
      transition: transform 0.2s ease, box-shadow 0.2s;
      overflow: hidden;
      z-index: 2;
      border: 1px solid rgba(255,255,255,0.6);
    }

    .login-container:hover {
      box-shadow: 0 30px 55px -15px rgba(0, 0, 0, 0.25);
    }

    /* header / brand zone */
    .login-header {
      padding: 2rem 2rem 1rem 2rem;
      text-align: center;
      background: white;
    }

    .brand-icon {
      background: linear-gradient(135deg, #4F46E5, #7C3AED);
      width: 64px;
      height: 64px;
      margin: 0 auto 1.25rem auto;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 32px;
      box-shadow: 0 12px 18px -8px rgba(79, 70, 229, 0.3);
    }

    .brand-icon i {
      font-size: 2rem;
      color: white;
    }

    .login-header h1 {
      font-size: 1.9rem;
      font-weight: 700;
      background: linear-gradient(135deg, #1F2937, #2D3A4B);
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      letter-spacing: -0.3px;
    }

    .login-header p {
      color: #5b6e8c;
      margin-top: 0.5rem;
      font-size: 0.95rem;
      font-weight: 500;
    }

    /* form body */
    .login-form {
      padding: 0.5rem 2rem 2rem 2rem;
    }

    /* input groups modern style */
    .input-group {
      margin-bottom: 1.5rem;
      position: relative;
    }

    .input-group label {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.85rem;
      font-weight: 600;
      color: #1e2a3e;
      margin-bottom: 0.6rem;
      letter-spacing: -0.2px;
    }

    .input-group label i {
      color: #4F46E5;
      font-size: 0.9rem;
      width: 18px;
    }

    .input-field {
      width: 100%;
      padding: 0.9rem 1rem 0.9rem 2.8rem;
      font-size: 1rem;
      font-family: 'Inter', monospace;
      border: 1.5px solid #e2e8f0;
      border-radius: 1.2rem;
      background-color: white;
      transition: all 0.2s ease;
      outline: none;
      font-weight: 500;
      color: #0f172a;
    }

    .input-field:focus {
      border-color: #4F46E5;
      box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
      background-color: #ffffff;
    }

    /* icons inside input (absolute) */
    .input-icon {
      position: absolute;
      left: 1rem;
      bottom: 0.95rem;
      color: #94a3b8;
      font-size: 1.1rem;
      transition: color 0.2s;
      pointer-events: none;
    }

    .input-group:focus-within .input-icon {
      color: #4F46E5;
    }

    /* password toggle button */
    .toggle-password {
      position: absolute;
      right: 1rem;
      bottom: 0.95rem;
      background: none;
      border: none;
      color: #94a3b8;
      cursor: pointer;
      font-size: 1rem;
      transition: color 0.2s;
      z-index: 2;
    }

    .toggle-password:hover {
      color: #4F46E5;
    }

    /* options row (checkbox + forgot) */
    .form-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 1.2rem 0 1.8rem 0;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    .checkbox-wrapper {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
      font-size: 0.85rem;
      font-weight: 500;
      color: #334155;
    }

    .checkbox-wrapper input {
      width: 1rem;
      height: 1rem;
      accent-color: #4F46E5;
      cursor: pointer;
    }

    .forgot-link {
      font-size: 0.85rem;
      font-weight: 600;
      color: #4F46E5;
      text-decoration: none;
      transition: 0.2s;
    }

    .forgot-link:hover {
      color: #2e3a8c;
      text-decoration: underline;
    }

    /* login button */
    .login-btn {
      width: 100%;
      background: linear-gradient(105deg, #4F46E5, #7C3AED);
      border: none;
      padding: 0.9rem;
      border-radius: 2rem;
      font-size: 1rem;
      font-weight: 700;
      color: white;
      font-family: 'Inter', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      cursor: pointer;
      transition: all 0.25s ease;
      box-shadow: 0 8px 18px -6px rgba(79, 70, 229, 0.4);
    }

    .login-btn i {
      font-size: 1.1rem;
      transition: transform 0.2s;
    }

    .login-btn:hover {
      background: linear-gradient(105deg, #4338ca, #6d28d9);
      transform: translateY(-2px);
      box-shadow: 0 14px 24px -8px rgba(79, 70, 229, 0.5);
    }

    .login-btn:active {
      transform: translateY(1px);
    }

    /* divider & guest / signup */
    .divider {
      margin: 2rem 0 1.2rem;
      display: flex;
      align-items: center;
      text-align: center;
      gap: 0.8rem;
      color: #94a3b8;
      font-size: 0.75rem;
      font-weight: 500;
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #e2e8f0;
    }

    .guest-signup {
      text-align: center;
    }

    .guest-link {
      background: transparent;
      border: 1.5px solid #e2e8f0;
      padding: 0.75rem;
      border-radius: 2rem;
      width: 100%;
      font-weight: 600;
      font-size: 0.9rem;
      color: #334155;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      cursor: pointer;
      transition: all 0.2s;
      font-family: 'Inter', sans-serif;
    }

    .guest-link:hover {
      background: #f8fafc;
      border-color: #cbd5e1;
      color: #0f172a;
    }

    .signup-prompt {
      margin-top: 1.2rem;
      font-size: 0.85rem;
      color: #475569;
    }

    .signup-prompt a {
      color: #4F46E5;
      font-weight: 700;
      text-decoration: none;
      margin-left: 5px;
    }

    .signup-prompt a:hover {
      text-decoration: underline;
    }

    /* message toast / alert */
    .message-area {
      margin-top: 1rem;
      padding: 0.5rem 0;
      text-align: center;
      font-size: 0.8rem;
      font-weight: 500;
      min-height: 3rem;
    }

    .alert {
      background: #fee2e2;
      color: #b91c1c;
      padding: 0.7rem;
      border-radius: 1rem;
      display: inline-block;
      width: 100%;
      animation: fadeSlide 0.25s ease;
    }

    .alert-success {
      background: #e0f2fe;
      color: #075985;
      border-left: 3px solid #0ea5e9;
    }

    @keyframes fadeSlide {
      from {
        opacity: 0;
        transform: translateY(-5px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive */
    @media (max-width: 500px) {
      .login-container {
        max-width: 100%;
        border-radius: 1.5rem;
      }
      .login-header {
        padding: 1.5rem 1.5rem 0.8rem;
      }
      .login-form {
        padding: 0.5rem 1.5rem 1.8rem;
      }
      .brand-icon {
        width: 54px;
        height: 54px;
      }
    }

    /* loading state on button */
    .btn-loading {
      pointer-events: none;
      filter: brightness(0.97);
      opacity: 0.8;
    }
  </style>
</head>
<body>

<div class="login-container" id="loginContainer">
  <div class="login-header">
    <div class="brand-icon">
      <i class="fas fa-store"></i>
    </div>
    <h1>Welcome back</h1>
    <p>Sign in to your  account</p>
  </div>

  <div class="login-form">
    <form method="POST" action="{{url('/customer/login/auth')}}">
        @csrf
      <!-- Email / Username field -->
      <div class="input-group">
        <label><i class="fas fa-envelope"></i> Email address</label>
        <div style="position: relative;">
          <i class="fas fa-user input-icon"></i>
          <input type="email" id="email" name="email" class="input-field" placeholder="customer@example.com" autocomplete="email" required>
        </div>
      </div>

      <!-- Password field with toggle visibility -->
      <div class="input-group">
        <label><i class="fas fa-lock"></i> Password</label>
        <div style="position: relative;">
          <i class="fas fa-key input-icon"></i>
          <input type="password" id="password" name="password" class="input-field" placeholder="··········" autocomplete="current-password" required>
        </div>
      </div>

      <!-- Login Primary Button -->
      <button type="submit" class="login-btn" id="loginSubmitBtn">
        <i class="fas fa-arrow-right-to-bracket"></i> Sign In
      </button>

      <div class="message-area" id="messageContainer"></div>
    </form>
    <div class="guest-signup">
  <a href="/" class="guest-link" id="guestDemoBtn">
    <i class="fas fa-home"></i> Go To Home
  </a>

  <div class="signup-prompt">
    Don't have an account? <a href="{{url('/customer/registration')}}" id="signupFakeLink">Create account</a>
  </div>
</div>
  </div>
</div>

<script>
  (function() {
    // DOM elements
    const emailInput = document.getElementById('loginEmail');
    const passwordInput = document.getElementById('loginPassword');
    const loginForm = document.getElementById('customerLoginForm');
    const submitBtn = document.getElementById('loginSubmitBtn');
    const messageContainer = document.getElementById('messageContainer');
    const togglePasswordBtn = document.getElementById('togglePasswordBtn');
    const eyeIcon = document.getElementById('eyeIcon');
    const rememberCheckbox = document.getElementById('rememberCheckbox');
    const guestBtn = document.getElementById('guestDemoBtn');
    const forgotLink = document.getElementById('forgotPasswordLink');
    const signupLink = document.getElementById('signupFakeLink');

    // ------------------------------------------------------------------
    // Helper: show temporary message (success/warning/error)
    function showMessage(text, type = 'error') {
      messageContainer.innerHTML = `<div class="alert ${type === 'success' ? 'alert-success' : ''}"><i class="fas ${type === 'success' ? 'fa-circle-check' : 'fa-triangle-exclamation'}" style="margin-right:6px;"></i> ${text}</div>`;
      // auto clear after 3.5 secs only for info not blocking UI
      setTimeout(() => {
        if (messageContainer.innerHTML.includes(text)) {
          messageContainer.innerHTML = '';
        }
      }, 3800);
    }

    // Clear message when user starts typing (clean UX)
    function clearMessageOnTyping() {
      if (messageContainer.innerHTML !== '') {
        messageContainer.innerHTML = '';
      }
    }
    emailInput.addEventListener('input', clearMessageOnTyping);
    passwordInput.addEventListener('input', clearMessageOnTyping);

    // ------------------------------------------------------------------
    // Password visibility toggle
    let passwordVisible = false;
    togglePasswordBtn.addEventListener('click', () => {
      passwordVisible = !passwordVisible;
      const type = passwordVisible ? 'text' : 'password';
      passwordInput.type = type;
      if (passwordVisible) {
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      } else {
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      }
    });

    // ------------------------------------------------------------------
    // Mock authentication logic (modern demo)
    // Real-world apps would connect to backend, but here we simulate validation
    // Expected valid demo users: 
    // - customer@example.com / any password >= 4 chars (just for demo)
    // - Also special demo: user@modern.com / "demo123" to show specific welcome
    // We'll implement a realistic client-side validation with patterns.
    
    function validateCredentials(email, password) {
      // Trim and normalize
      const trimmedEmail = email.trim().toLowerCase();
      const trimmedPass = password.trim();
      
      // Basic email format check (standard regex)
      const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
      if (!emailRegex.test(trimmedEmail)) {
        return { valid: false, message: 'Please enter a valid email address (e.g., name@domain.com).' };
      }
      if (trimmedPass.length === 0) {
        return { valid: false, message: 'Password cannot be empty.' };
      }
      if (trimmedPass.length < 3) {
        return { valid: false, message: 'Password must be at least 3 characters.' };
      }
      
      // Demo credential sets (mock customer data)
      // For premium demo: 2 accepted credential pairs
      const validAccounts = [
        { email: 'customer@example.com', pass: 'demo123' },
        { email: 'alex@modernshop.com', pass: 'welcome24' },
        { email: 'emily.customer@gmail.com', pass: 'iloveshopping' }
      ];
      
      // Also let any password work if email matches? For better UX, but we want secure feel.
      // We'll add a special: if email ends with @example.com and password length >= 4 => accepted (for quick test)
      const isExampleDomain = trimmedEmail.endsWith('@example.com');
      if (isExampleDomain && trimmedPass.length >= 4) {
        return { valid: true, message: `Welcome demo user! (${trimmedEmail})` };
      }
      
      // Check against mock accounts
      const matched = validAccounts.find(acc => acc.email.toLowerCase() === trimmedEmail && acc.pass === trimmedPass);
      if (matched) {
        return { valid: true, message: `✅ Login successful! Welcome back, ${trimmedEmail.split('@')[0]}.` };
      }
      
      // fallback: if email looks valid but no match, show user-friendly error
      return { valid: false, message: 'Invalid email or password. Try customer@example.com / demo123 or alex@modernshop.com / welcome24' };
    }
    
    // Login handler (with loading effect)
    async function handleLogin(event) {
      event.preventDefault();
      
      const email = emailInput.value;
      const password = passwordInput.value;
      
      // clear old message
      messageContainer.innerHTML = '';
      
      // Disable button and show loading state
      const originalBtnContent = submitBtn.innerHTML;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-pulse"></i> Authenticating...';
      submitBtn.classList.add('btn-loading');
      submitBtn.disabled = true;
      
      // simulate minimal network delay (modern async feel)
      await new Promise(resolve => setTimeout(resolve, 650));
      
      const result = validateCredentials(email, password);
      
      // re-enable button
      submitBtn.innerHTML = originalBtnContent;
      submitBtn.classList.remove('btn-loading');
      submitBtn.disabled = false;
      
      if (result.valid) {
        // success: store "remember me" in localStorage if checked (simulation)
        if (rememberCheckbox.checked) {
          localStorage.setItem('customer_remember', email);
          showMessage(`${result.message} 🔒 Session saved.`, 'success');
        } else {
          localStorage.removeItem('customer_remember');
          showMessage(`${result.message} ✨ Redirecting to dashboard...`, 'success');
        }
        // In a real app, you would redirect or set token.
        // For demo, we show success and reset form optionally? keep email filled.
        // Reset password field for security? not necessary – we can just highlight.
        // But we simulate redirect after 1 sec feeling
        setTimeout(() => {
          // optional: clear sensitive field? Not mandatory but polished.
          // Actually we can notify user that they are logged in.
          // Additional: reset any error styles.
          if (!rememberCheckbox.checked) {
            // just show final notification but do not wipe fields unless we want.
          }
          // Additional modern effect: we could show a green check.
          // We'll just display a final prompt.
          const finalMsg = document.createElement('div');
          // But message already there - we replace it after 1.5 sec? not needed.
        }, 200);
      } else {
        showMessage(result.message, 'error');
        // Shake effect on container (subtle)
        const container = document.querySelector('.login-container');
        container.style.transform = 'translateX(4px)';
        setTimeout(() => { container.style.transform = ''; }, 100);
        setTimeout(() => { container.style.transform = 'translateX(-3px)'; }, 150);
        setTimeout(() => { container.style.transform = ''; }, 250);
      }
    }
    
    // Attach submit event
    loginForm.addEventListener('submit', handleLogin);
    
    // ------------------------------------------------------------------
    // Guest demo: fill with demo credentials but also bypass login?
    guestBtn.addEventListener('click', async (e) => {
      e.preventDefault();
      // Prefill with a valid demo account (customer@example.com / demo123) and trigger smooth login?
      emailInput.value = 'customer@example.com';
      passwordInput.value = 'demo123';
      // Optionally show message and auto-submit
      showMessage('✨ Guest demo: using customer@example.com', 'success');
      // slight delay then submit for seamless flow
      setTimeout(() => {
        const fakeEvent = new Event('submit', { bubbles: true, cancelable: true });
        loginForm.dispatchEvent(fakeEvent);
      }, 400);
    });
    
    // Forgot password - modern interaction
    forgotLink.addEventListener('click', (e) => {
      e.preventDefault();
      showMessage('📧 Password reset link sent to your registered email (demo feature).', 'success');
    });
    
    // signup link – show a nice message
    signupLink.addEventListener('click', (e) => {
      e.preventDefault();
      showMessage('🚀 New customer registration is coming soon! Try guest mode or login with demo.', 'success');
    });
    
    // ------------------------------------------------------------------
    // Load "remember me" feature from localStorage (if any)
    function loadRememberedUser() {
      const remembered = localStorage.getItem('customer_remember');
      if (remembered && remembered.trim() !== '') {
        emailInput.value = remembered;
        rememberCheckbox.checked = true;
        showMessage(`Welcome back! We've filled your email.`, 'success');
        // Optionally focus on password field
        passwordInput.focus();
      }
    }
    loadRememberedUser();
    
    // Additional demo: small tooltip / modern touch – set cursor to pointer on icons
    // Also provides live validation feedback on email field? optional but nice
    emailInput.addEventListener('blur', function() {
      const val = this.value.trim();
      if (val !== '' && !/^[^\s@]+@([^\s@]+\.)+[^\s@]+$/.test(val)) {
        // show hint but not obtrusive
        if (!messageContainer.innerHTML) {
          // we silently show? but only if not interfering. Better not spam.
        }
      }
    });
    
    // disable default browser validation bubbles, we have custom
    loginForm.setAttribute('novalidate', true);
    
    // Add small tooltip for modern feel (just informative)
    const style = document.createElement('style');
    style.textContent = `
      .input-field:-webkit-autofill,
      .input-field:-webkit-autofill:focus {
        transition: background-color 600000s 0s, color 600000s 0s;
      }
      button, .guest-link, .forgot-link {
        cursor: pointer;
      }
    `;
    document.head.appendChild(style);
    
    // Add a floating glow effect on container? not needed, but it's modern.
    console.log('Modern Customer Login Form Ready ✔️');
  })();
</script>
</body>
</html>