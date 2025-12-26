<header class="relative w-full mt-10 z-50">
    <div class="mx-auto px-4">
      <div class="flex items-center justify-between h-16">
  
        <div class="flex items-center">
          <img src="{{ asset('images/header-logo.png') }}" alt="Logo" class="max-w-[140px] ml-[20px] w-auto">
        </div>
  
        <!-- Desktop Menu (≥1024px) -->
        <nav class="hidden lg:flex space-x-8 text-[20px] font-regular text-[#333333] mb-[40px]">
          <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
          <a href="#" class="hover:text-blue-600">How It Works</a>
          <a href="#" class="hover:text-blue-600">Find a Gym</a>
          <a href="#" class="hover:text-blue-600">Become a Host</a>
          <a href="#" class="hover:text-blue-600">About Us</a>
          <a href="#" class="hover:text-blue-600">Blog</a>
          <a href="#" class="hover:text-blue-600">Contact</a>
        </nav>
  
        <!-- Desktop Buttons (≥1024px) -->
        <div class="hidden lg:flex items-center gap-6 mb-[40px]">
          <a href="{{ route('login') }}" class="text-[20px] font-regular text-[var(--text-color)] hover:text-blue-600">Login</a>
          <a href="{{ route('register') }}" class="sign-up-btn">Sign Up</a>
        </div>
  
        <!-- Hamburger (<1024px) -->
        <button id="menuBtn" class="lg:hidden text-2xl">☰</button>
  
      </div>
    </div>
  
    <!-- Mobile Menu (<1024px) -->
    <div id="mobileMenu" class="hidden lg:hidden mt-10">
      <nav class="flex flex-col space-y-4 p-2 text-[20px] font-regular text-[var(--text-color)]">
        <a href="#">Home</a>
        <a href="#">How It Works</a>
        <a href="#">Find a Gym</a>
        <a href="#">Become a Host</a>
        <a href="#">About Us</a>
        <a href="#">Blog</a>
        <a href="#">Contact</a>
        <a href="#">Login</a>
        <a href="#" class="bg-[#4682B4] text-white text-center py-2 rounded-full">
          Sign Up
        </a>
      </nav>
    </div>
  </header>
  
  <script>
    const menuBtn = document.getElementById("menuBtn");
    const mobileMenu = document.getElementById("mobileMenu");
  
    menuBtn.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
  
      if (menuBtn.innerText === "☰") {
        menuBtn.innerText = "✕";
      } else {
        menuBtn.innerText = "☰";
      }
    });
  </script>
  