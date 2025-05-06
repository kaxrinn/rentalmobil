<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - VROOM</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('gambarberanda/backgroundlogin.jpg')">

  <div class="w-full max-w-md bg-white bg-opacity-95 rounded-xl shadow-lg p-6 text-center">
    <div class="mb-4">
      <img src="gambarberanda/Logo 6 - Copy.png" alt="Logo VROOM" class="w-24 mx-auto">
    </div>
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Selamat Datang di VROOM!</h2>
    <form action="#" class="flex flex-col gap-5">
      <input 
        type="email" 
        placeholder="Email" 
        required 
        class="px-4 py-2 w-full border-2 border-blue-900 rounded-md text-sm focus:outline-none"
      />
      <input 
        type="password" 
        placeholder="Kata Sandi" 
        required 
        class="px-4 py-2 w-full border-2 border-blue-900 rounded-md text-sm focus:outline-none"
      />
      <button 
        type="submit" 
        class="bg-blue-900 hover:bg-blue-950 text-white font-bold py-2 rounded-md w-2/3 mx-auto"
      >
        MASUK
      </button>
      <p class="text-sm">
        Belum punya akun? 
        <a href="{{ route('register') }}" class="text-blue-900 font-semibold hover:underline">Klik Disini</a>
      </p>
      <p class="text-sm">
        Lupa kata sandi? 
        <a href="{{ route('lupasandi') }}" class="text-blue-900 font-semibold hover:underline">Klik Disini</a>
      </p>
    </form>
  </div>

</body>
</html>
