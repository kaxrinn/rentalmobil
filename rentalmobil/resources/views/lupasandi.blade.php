<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Kata Sandi - VROOM</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('gambarberanda/backgroundlogin.jpg');">

  <div class="w-full max-w-md bg-white bg-opacity-95 rounded-xl shadow-lg p-6 text-center">
    <div class="flex flex-col items-center">
      <img src="gambarberanda/Logo 6 - Copy.png" alt="Logo VROOM" class="w-24 mb-4">
      <h2 class="text-xl font-semibold text-gray-800 mb-6">Lupa Kata Sandi</h2>

      <form action="#" class="flex flex-col gap-6 w-full">
        <input type="email" placeholder="Email anda" required
          class="w-full px-4 py-2 border-2 border-blue-900 rounded-md text-sm outline-none">

        <input type="password" placeholder="Kata Sandi Baru" required
          class="w-full px-4 py-2 border-2 border-blue-900 rounded-md text-sm outline-none">

        <div class="flex flex-col items-center gap-3 mt-4">
          <button type="submit"
            class="w-3/4 py-2 bg-blue-900 text-white rounded-md font-bold hover:bg-blue-800 transition duration-300">
            Simpan
          </button>
          <a href="{{ route('login') }}"
            class="w-3/4 py-2 bg-blue-400 text-white rounded-md font-bold text-center hover:bg-blue-900 transition duration-300">
            Kembali
          </a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
