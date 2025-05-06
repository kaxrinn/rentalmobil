<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - VROOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('gambarberanda/backgroundlogin.jpg')">

    <div class="w-full max-w-sm bg-white/95 rounded-xl shadow-lg p-6 text-center">
        <div class="mb-4">
            <img src="gambarberanda/Logo 6 - Copy.png" alt="Logo VROOM" class="mx-auto w-24">
        </div>
        <h2 class="text-lg font-semibold text-gray-800 mb-4">
            Buat Akun Anda<br>Untuk Memulai!
        </h2>

        <form action="#" method="POST" class="flex flex-col gap-4">
            <input type="text" placeholder="Nama Pengguna" required
                   class="px-4 py-2 border border-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-700" />

            <input type="email" placeholder="Email" required
                   class="px-4 py-2 border border-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-700" />

            <input type="password" placeholder="Kata Sandi" required
                   class="px-4 py-2 border border-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-700" />

            <input type="number" placeholder="Nomor Handphone" required
                   class="px-4 py-2 border border-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-700" />

            <button type="submit"
                    class="bg-blue-900 text-white py-2 font-bold rounded-md hover:bg-blue-800 transition">
                DAFTAR
            </button>
        </form>

        <p class="text-sm mt-4">
            Sudah Memiliki Akun?
            <a href="#" class="text-blue-900 font-semibold hover:underline">Log in</a>
        </p>
    </div>

</body>
</html>
