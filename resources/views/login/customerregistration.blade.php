<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title> Create Account | Customer Signup</title>
  <!-- Google Fonts + Inter -->
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
      background: linear-gradient(135deg, #f5f7fc 0%, #eef2f9 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.8rem;
      position: relative;
    }

    /* ambient glow */
    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at 70% 20%, rgba(99, 102, 241, 0.08) 0%, rgba(255,255,255,0) 70%);
      pointer-events: none;
      z-index: 0;
    }

    /* main card */
    .signup-container {
      width: 100%;
      max-width: 580px;
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(0px);
      border-radius: 2rem;
      box-shadow: 0 25px 48px -14px rgba(0, 0, 0, 0.18), 0 2px 6px rgba(0,0,0,0.02);
      transition: transform 0.2s ease, box-shadow 0.25s;
      overflow: hidden;
      z-index: 2;
      border: 1px solid rgba(255,255,255,0.7);
    }

    .signup-container:hover {
      box-shadow: 0 30px 55px -12px rgba(0, 0, 0, 0.22);
    }

    /* header branding */
    .signup-header {
      padding: 1.8rem 2rem 0.8rem 2rem;
      text-align: center;
      background: white;
    }

    .brand-icon {
      background: linear-gradient(145deg, #0f2b3d, #1e4a6e);
      width: 68px;
      height: 68px;
      margin: 0 auto 1rem auto;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 34px;
      box-shadow: 0 12px 22px -10px rgba(30, 74, 110, 0.3);
    }

    .brand-icon i {
      font-size: 2.1rem;
      color: white;
    }

    .signup-header h1 {
      font-size: 1.9rem;
      font-weight: 700;
      background: linear-gradient(125deg, #0b2b3b, #1f5e7e);
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      letter-spacing: -0.3px;
    }

    .signup-header p {
      color: #5b6e8c;
      margin-top: 0.4rem;
      font-size: 0.9rem;
      font-weight: 500;
    }

    /* form area */
    .signup-form {
      padding: 0.5rem 2rem 1.8rem 2rem;
    }

    /* input groups modern */
    .input-group {
      margin-bottom: 1.3rem;
      position: relative;
    }

    .input-group label {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.82rem;
      font-weight: 600;
      color: #1e2a3e;
      margin-bottom: 0.5rem;
      letter-spacing: -0.2px;
    }

    .input-group label i {
      color: #2c6e9e;
      font-size: 0.85rem;
      width: 18px;
    }

    .input-field {
      width: 100%;
      padding: 0.85rem 1rem 0.85rem 2.8rem;
      font-size: 0.95rem;
      font-family: 'Inter', sans-serif;
      border: 1.5px solid #e2edf2;
      border-radius: 1.2rem;
      background-color: white;
      transition: all 0.2s ease;
      outline: none;
      font-weight: 500;
      color: #0f172a;
    }

    .input-field:focus {
      border-color: #2c6e9e;
      box-shadow: 0 0 0 4px rgba(44, 110, 158, 0.12);
      background-color: #ffffff;
    }

    /* absolute icons inside inputs */
    .input-icon {
      position: absolute;
      left: 1rem;
      bottom: 0.85rem;
      color: #8ba0b5;
      font-size: 1rem;
      transition: color 0.2s;
      pointer-events: none;
    }

    .input-group:focus-within .input-icon {
      color: #2c6e9e;
    }

    /* image upload area - optional & modern */
    .image-upload-wrapper {
      margin-bottom: 1.6rem;
      background: #fafcff;
      border-radius: 1.4rem;
      padding: 0.2rem 0;
    }

    .image-label {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.82rem;
      font-weight: 600;
      color: #1e2a3e;
      margin-bottom: 0.7rem;
    }

    .image-label i {
      color: #2c6e9e;
    }

    .optional-badge {
      font-size: 0.65rem;
      font-weight: 400;
      background: #eef3fa;
      padding: 0.2rem 0.6rem;
      border-radius: 20px;
      margin-left: 0.6rem;
      color: #2c6e9e;
    }

    .upload-area {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 1rem;
      background: #f9fbfe;
      border: 1.5px dashed #cbdde9;
      border-radius: 1.2rem;
      padding: 0.6rem 1rem;
      transition: all 0.2s;
    }

    .upload-area:hover {
      border-color: #2c6e9e;
      background: #f4f9ff;
    }

    .custom-file-btn {
      background: white;
      border: 1px solid #cddfe8;
      padding: 0.5rem 1.2rem;
      border-radius: 2rem;
      font-size: 0.8rem;
      font-weight: 600;
      color: #1f5e7e;
      cursor: pointer;
      transition: 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-family: 'Inter', sans-serif;
    }

    .custom-file-btn:hover {
      background: #e6f0f7;
      border-color: #2c6e9e;
    }

    #fileInput {
      display: none;
    }

    .image-preview {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
    }

    .preview-img {
      width: 48px;
      height: 48px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      background: #eef2f6;
    }

    .file-name {
      font-size: 0.75rem;
      color: #2c5a7a;
      max-width: 160px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .remove-img {
      background: none;
      border: none;
      color: #8d9eb0;
      cursor: pointer;
      font-size: 0.9rem;
      transition: color 0.2s;
    }

    .remove-img:hover {
      color: #c2412c;
    }

    /* toggle password inside create account */
    .toggle-password {
      position: absolute;
      right: 1rem;
      bottom: 0.85rem;
      background: none;
      border: none;
      color: #8ba0b5;
      cursor: pointer;
      font-size: 1rem;
      transition: color 0.2s;
    }

    .toggle-password:hover {
      color: #2c6e9e;
    }

    /* signup button */
    .signup-btn {
      width: 100%;
      background: linear-gradient(105deg, #1f5e7e, #0f3f58);
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
      box-shadow: 0 8px 18px -6px rgba(31, 94, 126, 0.4);
      margin-top: 0.6rem;
    }

    .signup-btn:hover {
      background: linear-gradient(105deg, #154e6b, #0c344b);
      transform: translateY(-2px);
      box-shadow: 0 14px 24px -10px rgba(31, 94, 126, 0.5);
    }

    .signup-btn:active {
      transform: translateY(1px);
    }

    /* additional links (login redirect) */
    .login-redirect {
      text-align: center;
      margin-top: 1.8rem;
      font-size: 0.85rem;
      color: #4b5c6e;
    }

    .login-redirect a {
      color: #1f5e7e;
      font-weight: 700;
      text-decoration: none;
      margin-left: 4px;
    }

    .login-redirect a:hover {
      text-decoration: underline;
    }

    /* message area */
    .message-area {
      margin: 1rem 0 0.2rem;
      padding: 0.2rem 0;
      text-align: center;
      font-size: 0.8rem;
      font-weight: 500;
      min-height: 2.8rem;
    }

    .alert {
      background: #fee9e6;
      color: #b43403;
      padding: 0.65rem;
      border-radius: 1rem;
      display: inline-block;
      width: 100%;
      animation: fadeSlide 0.22s ease;
    }

    .alert-success {
      background: #e0f2fe;
      color: #0369a1;
      border-left: 3px solid #0284c7;
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

    @media (max-width: 550px) {
      .signup-container {
        max-width: 100%;
        border-radius: 1.5rem;
      }
      .signup-header {
        padding: 1.3rem 1.3rem 0.5rem;
      }
      .signup-form {
        padding: 0.5rem 1.3rem 1.5rem;
      }
      .upload-area {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    .btn-loading {
      pointer-events: none;
      opacity: 0.8;
      filter: brightness(0.96);
    }
  </style>
</head>
<body>

<div class="signup-container" id="signupContainer">
  <div class="signup-header">
    <div class="brand-icon">
      <i class="fas fa-user-plus"></i>
    </div>
    <h1>Create account</h1>
  </div>

  <div class="signup-form">
    <form id="createAccountForm" method="POST" action="{{ url('/customer/registration-store') }}" enctype="multipart/form-data">
        @csrf
      <!-- Full Name -->
      <div class="input-group">
        <label><i class="fas fa-user-circle"></i> Full name</label>
        <div style="position: relative;">
          <i class="fas fa-user input-icon"></i>
          <input type="text" id="fullName" class="input-field" name="name" placeholder="Alex Johnson" autocomplete="name" required>
        </div>
      </div>

      <!-- Phone Number -->
      <div class="input-group">
        <label><i class="fas fa-phone-alt"></i> Phone number</label>
        <div style="position: relative;">
          <i class="fas fa-mobile-alt input-icon"></i>
          <input type="tel" id="phoneNumber" class="input-field" name="phone" placeholder="+1 234 567 8900" autocomplete="tel" required>
        </div>
      </div>

      <!-- Email -->
      <div class="input-group">
        <label><i class="fas fa-envelope"></i> Email address</label>
        <div style="position: relative;">
          <i class="fas fa-at input-icon"></i>
          <input type="email" id="signupEmail" class="input-field" name="email" placeholder="hello@example.com" autocomplete="email" required>
        </div>
      </div>

      <!-- Password + toggle visibility -->
      <div class="input-group">
        <label><i class="fas fa-lock"></i> Password</label>
        <div style="position: relative;">
          <i class="fas fa-key input-icon"></i>
          <input type="password" id="signupPassword" name="password" class="input-field" placeholder="Create a strong password" autocomplete="new-password" required>
        </div>
      </div>

      <!-- Profile Image - optional section (modern upload) -->
      <div class="image-upload-wrapper">
        <div class="image-label">
          <i class="fas fa-camera"></i> Profile image <span class="optional-badge">Optional</span>
        </div>
        <div class="upload-area" id="uploadArea">
          <input type="file" id="profileImageInput" name="image" accept="image/jpeg, image/png, image/jpg, image/webp">
    
          <div id="imagePreviewContainer" class="image-preview"></div>
        </div>
        <div style="font-size: 0.7rem; color: #6c86a3; margin-top: 5px; padding-left: 4px;">
          <i class="fas fa-info-circle"></i> JPG, PNG or WebP, max 5MB (optional)
        </div>
      </div>

      <button type="submit" class="signup-btn" id="signupSubmitBtn">
        <i class="fas fa-user-check"></i> Register now
      </button>

      <div class="message-area" id="signupMessageContainer"></div>
    </form>

    <div class="login-redirect">
Already have an account? <a href="{{url('/customer/login')}}" id="loginRedirectLink">Sign in</a>
    </div>
  </div>
</div>

<script>
  (function() {
    // DOM elements
    const fullNameInput = document.getElementById('fullName');
    const phoneInput = document.getElementById('phoneNumber');
    const emailInput = document.getElementById('signupEmail');
    const passwordInput = document.getElementById('signupPassword');
    const signupForm = document.getElementById('createAccountForm');
    const submitBtn = document.getElementById('signupSubmitBtn');
    const msgContainer = document.getElementById('signupMessageContainer');
    const toggleBtn = document.getElementById('toggleSignupPassword');
    const eyeIcon = document.getElementById('signupEyeIcon');
    const fileInput = document.getElementById('profileImageInput');
    const triggerBtn = document.getElementById('triggerFileBtn');
    const previewContainer = document.getElementById('imagePreviewContainer');
    const loginRedirectLink = document.getElementById('loginRedirectLink');

    // Optional image data (store base64 preview / file object)
    let selectedImageFile = null;
    let imagePreviewUrl = null;

    // Helper: show message inside form
    function showMessage(text, type = 'error') {
      msgContainer.innerHTML = `<div class="alert ${type === 'success' ? 'alert-success' : ''}"><i class="fas ${type === 'success' ? 'fa-circle-check' : 'fa-exclamation-triangle'}" style="margin-right:8px;"></i> ${text}</div>`;
      setTimeout(() => {
        if (msgContainer.innerHTML.includes(text)) {
          msgContainer.innerHTML = '';
        }
      }, 4000);
    }

    // Clear message on typing
    function clearMessageOnInput() {
      if (msgContainer.innerHTML !== '') msgContainer.innerHTML = '';
    }
    [fullNameInput, phoneInput, emailInput, passwordInput].forEach(field => {
      field.addEventListener('input', clearMessageOnInput);
    });

    // Password toggle visibility
    let passwordVisible = false;
    toggleBtn.addEventListener('click', () => {
      passwordVisible = !passwordVisible;
      passwordInput.type = passwordVisible ? 'text' : 'password';
      eyeIcon.className = passwordVisible ? 'far fa-eye' : 'far fa-eye-slash';
    });

    // Image upload logic (optional) - modern preview + reset
    function updateImagePreview(file) {
      previewContainer.innerHTML = '';
      if (!file) {
        selectedImageFile = null;
        if (imagePreviewUrl) {
          URL.revokeObjectURL(imagePreviewUrl);
          imagePreviewUrl = null;
        }
        return;
      }

      // validate file size (max 5MB)
      if (file.size > 5 * 1024 * 1024) {
        showMessage('Image is too large. Maximum size is 5MB.', 'error');
        fileInput.value = '';
        selectedImageFile = null;
        return;
      }
      // validate type
      if (!['image/jpeg', 'image/png', 'image/webp', 'image/jpg'].includes(file.type)) {
        showMessage('Please select a valid image (JPEG, PNG, WEBP).', 'error');
        fileInput.value = '';
        selectedImageFile = null;
        return;
      }

      selectedImageFile = file;
      if (imagePreviewUrl) URL.revokeObjectURL(imagePreviewUrl);
      imagePreviewUrl = URL.createObjectURL(file);
      
      const imgWrapper = document.createElement('div');
      imgWrapper.style.display = 'flex';
      imgWrapper.style.alignItems = 'center';
      imgWrapper.style.gap = '8px';
      imgWrapper.style.background = '#f0f4f9';
      imgWrapper.style.padding = '4px 10px 4px 6px';
      imgWrapper.style.borderRadius = '40px';
      
      const img = document.createElement('img');
      img.src = imagePreviewUrl;
      img.alt = 'preview';
      img.className = 'preview-img';
      img.style.width = '38px';
      img.style.height = '38px';
      
      const fileNameSpan = document.createElement('span');
      fileNameSpan.className = 'file-name';
      fileNameSpan.textContent = file.name.length > 25 ? file.name.slice(0, 22) + '...' : file.name;
      
      const removeBtn = document.createElement('button');
      removeBtn.type = 'button';
      removeBtn.className = 'remove-img';
      removeBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
      removeBtn.title = 'Remove image';
      removeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        fileInput.value = '';
        selectedImageFile = null;
        if (imagePreviewUrl) {
          URL.revokeObjectURL(imagePreviewUrl);
          imagePreviewUrl = null;
        }
        updateImagePreview(null);
      });
      
      imgWrapper.appendChild(img);
      imgWrapper.appendChild(fileNameSpan);
      imgWrapper.appendChild(removeBtn);
      previewContainer.appendChild(imgWrapper);
    }
    
    triggerBtn.addEventListener('click', () => {
      fileInput.click();
    });
    
    fileInput.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (file) {
        updateImagePreview(file);
      } else {
        updateImagePreview(null);
      }
    });
    
    // Helper: validation for signup fields (robust)
    function validateSignup(name, phone, email, password) {
      const trimmedName = name.trim();
      if (trimmedName.length < 2) return { valid: false, message: 'Please enter your full name (at least 2 characters).' };
      if (!/^[a-zA-Z\u00C0-\u024F\u1E00-\u1EFF\s\-\'\.]+$/.test(trimmedName) && trimmedName.length > 0) {
        // relaxed but ensure not only numbers
        if (!isNaN(trimmedName)) return { valid: false, message: 'Name should contain letters.' };
      }
      
      const trimmedPhone = phone.trim();
      if (trimmedPhone.length < 5) return { valid: false, message: 'Enter a valid phone number (min 5 digits).' };
      const phoneRegex = /^[\+\s0-9\-\(\)]{5,20}$/;
      if (!phoneRegex.test(trimmedPhone)) return { valid: false, message: 'Phone number seems invalid. Use digits, spaces, +, - or parentheses.' };
      
      const trimmedEmail = email.trim().toLowerCase();
      const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
      if (!emailRegex.test(trimmedEmail)) return { valid: false, message: 'Please enter a valid email address (e.g., name@domain.com).' };
      
      const pass = password.trim();
      if (pass.length < 6) return { valid: false, message: 'Password must be at least 6 characters long.' };
      if (!/[A-Z]/.test(pass)) return { valid: false, message: 'Password must contain at least one uppercase letter.' };
      if (!/[0-9]/.test(pass)) return { valid: false, message: 'Password must contain at least one number.' };
      
      return { valid: true, message: 'All good!' };
    }
    
    // mock account creation (demo purpose - no backend, but simulates)
    async function createAccountHandler(event) {
      event.preventDefault();
      
      const name = fullNameInput.value;
      const phone = phoneInput.value;
      const email = emailInput.value;
      const pwd = passwordInput.value;
      
      // optional image metadata
      const hasImage = selectedImageFile !== null;
      
      // validation
      const validation = validateSignup(name, phone, email, pwd);
      if (!validation.valid) {
        showMessage(validation.message, 'error');
        // subtle shake effect
        const container = document.querySelector('.signup-container');
        container.style.transform = 'translateX(3px)';
        setTimeout(() => container.style.transform = '', 120);
        setTimeout(() => container.style.transform = 'translateX(-2px)', 180);
        setTimeout(() => container.style.transform = '', 250);
        return;
      }
      
      // Disable button and simulate loading
      const originalBtnContent = submitBtn.innerHTML;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-pulse"></i> Creating account...';
      submitBtn.classList.add('btn-loading');
      submitBtn.disabled = true;
      
      await new Promise(resolve => setTimeout(resolve, 1100));
      
      // additional fake check: email uniqueness demo
      const existingUsers = JSON.parse(localStorage.getItem('demo_users') || '[]');
      const emailExists = existingUsers.some(user => user.email.toLowerCase() === email.trim().toLowerCase());
      if (emailExists) {
        showMessage('This email is already registered. Please sign in instead.', 'error');
        submitBtn.innerHTML = originalBtnContent;
        submitBtn.classList.remove('btn-loading');
        submitBtn.disabled = false;
        return;
      }
      
      // store user data (in localStorage for demo) including optional image as base64 if image provided
      let imageBase64 = null;
      if (selectedImageFile) {
        try {
          imageBase64 = await convertFileToBase64(selectedImageFile);
        } catch (err) {
          console.warn("Image conversion warning");
        }
      }
      
      const newUser = {
        id: Date.now(),
        fullName: name.trim(),
        phone: phone.trim(),
        email: email.trim().toLowerCase(),
        password: pwd, // In real app, hash it. Demo only.
        createdAt: new Date().toISOString(),
        profileImage: imageBase64 || null
      };
      
      existingUsers.push(newUser);
      localStorage.setItem('demo_users', JSON.stringify(existingUsers));
      
      // Success message + optional image info
      let imageMessage = hasImage ? ' Profile image uploaded.' : ' (no profile image)';
      showMessage(`🎉 Welcome ${name.split(' ')[0]}! Account successfully created.${imageMessage}`, 'success');
      
      // Reset form except maybe keep some fields? but UX: clear most fields but optional
      fullNameInput.value = '';
      phoneInput.value = '';
      emailInput.value = '';
      passwordInput.value = '';
      // reset image field
      if (imagePreviewUrl) URL.revokeObjectURL(imagePreviewUrl);
      imagePreviewUrl = null;
      selectedImageFile = null;
      fileInput.value = '';
      previewContainer.innerHTML = '';
      passwordVisible = false;
      passwordInput.type = 'password';
      eyeIcon.className = 'far fa-eye-slash';
      
      // Reset button
      submitBtn.innerHTML = originalBtnContent;
      submitBtn.classList.remove('btn-loading');
      submitBtn.disabled = false;
      
      // Optional: redirect feeling after 2 sec, but we just show login redirect link hint
      setTimeout(() => {
        if (msgContainer.innerHTML.includes('successfully created')) {
          // additional nudge
        }
      }, 500);
    }
    
    // helper to convert image file to base64
    function convertFileToBase64(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
        reader.readAsDataURL(file);
      });
    }
    
    // attach submit event
    signupForm.addEventListener('submit', createAccountHandler);
    
    // Login redirect link (just informative - simulates routing)
    loginRedirectLink.addEventListener('click', (e) => {
      e.preventDefault();
      showMessage('🔁 Redirecting to login page... (demo integration ready)', 'success');
      // In real scenario you'd redirect: window.location.href = "/login";
      setTimeout(() => {
        // just show note
        console.log("login redirection simulated");
      }, 400);
    });
    
    // Additional small UX: phone number auto-format? (optional but not intrusive)
    // remove HTML5 validation popup
    signupForm.setAttribute('novalidate', true);
    
    // display demo info: if user wants to check localstorage - just for robustness
    console.log("Modern Create Account Ready — fields: name, phone, email, password, optional image.");
  })();
</script>
</body>
</html>