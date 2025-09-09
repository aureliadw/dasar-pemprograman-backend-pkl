


<?php $__env->startSection('content'); ?>

  
  <header class="w-full fixed top-0 left-0 z-50">
    <?php echo $__env->make('sections.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </header>

  
  <div class="mx-auto px-4 py-4 max-w-[1280px]">

    
    <section 
      class="relative bg-cover bg-center h-[80vh] flex items-center justify-center text-white rounded-3xl overflow-hidden mb-20"
      style="background-image: url('<?php echo e(Vite::asset('resources/images/hero.png')); ?>')">
    </section>

    
    <div class="mb-12">
      <h1 class="text-5xl text-gray-900 leading-[1.3] font-[cabinet] font-bold">
        Spesial Hari Ini, <br />
        Spesial untuk Anda
      </h1>
      <p class="mt-2 text-lg text-gray-700 max-w-xl font-[jakarta] font-normal">
        Jelajahi hidangan pilihan dari seluruh penjuru Nusantara, diracik dengan bumbu autentik dan disajikan segar hanya untuk Anda hari ini.
      </p>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 auto-rows-[212px] gap-6 mb-20">
      
      <div class="relative rounded-2xl overflow-hidden shadow-lg row-span-2">
        <img src="<?php echo e(Vite::asset('resources/images/ayamtaliwang.png')); ?>" class="w-full h-full object-cover">
        <div class="absolute bottom-0 w-full p-3 bg-gradient-to-t from-black/70 to-transparent text-white">
          <div class="text-yellow-400">★★★★★</div>
          <div class="font-semibold">Ayam Taliwang</div>
          <div class="text-sm">Mulai Rp 29.000</div>
        </div>
      </div>
      
      <div class="relative rounded-2xl overflow-hidden shadow-lg sm:col-span-2 sm:row-span-2">
        <img src="<?php echo e(Vite::asset('resources/images/rendang.png')); ?>" class="w-full h-full object-cover">
        <div class="absolute bottom-0 w-full p-3 bg-gradient-to-t from-black/70 to-transparent text-white">
          <div class="text-yellow-400">★★★★★</div>
          <div class="font-semibold">Rendang</div>
          <div class="text-sm">Mulai Rp 39.000</div>
        </div>
      </div>
      
      <div class="relative rounded-2xl overflow-hidden shadow-lg row-span-2">
        <img src="<?php echo e(Vite::asset('resources/images/gudeg.png')); ?>" class="w-full h-full object-cover">
        <div class="absolute bottom-0 w-full p-3 bg-gradient-to-t from-black/70 to-transparent text-white">
          <div class="text-yellow-400">★★★★★</div>
          <div class="font-semibold">Gudeg Jogja</div>
          <div class="text-sm">Mulai Rp 24.000</div>
          <button class="mt-2 px-3 py-1 bg-[#C1442E] text-xs rounded-full hover:bg-red-700 transition">Reservasi</button>
        </div>
      </div>
      
      <div class="relative rounded-2xl overflow-hidden shadow-lg row-span-2">
        <img src="<?php echo e(Vite::asset('resources/images/coto1.png')); ?>" class="w-full h-full object-cover">
        <div class="absolute bottom-0 w-full p-3 bg-gradient-to-t from-black/70 to-transparent text-white">
          <div class="text-yellow-400">★★★★★</div>
          <div class="font-semibold">Coto Makassar</div>
          <div class="text-sm">Mulai Rp 34.000</div>
        </div>
      </div>
      
      <div class="relative rounded-2xl overflow-hidden shadow-lg col-span-2">
        <img src="<?php echo e(Vite::asset('resources/images/rasa.png')); ?>" class="w-full h-full object-cover">
      </div>
      
      <div class="relative rounded-2xl overflow-hidden shadow-lg">
        <img src="<?php echo e(Vite::asset('resources/images/rawon.png')); ?>" class="w-full h-full object-cover">
        <div class="absolute bottom-0 w-full p-2 bg-gradient-to-t from-black/70 to-transparent text-white">
          <div class="text-yellow-400 text-sm">★★★★★</div>
          <div class="font-semibold text-sm">Rawon</div>
          <div class="text-xs">Mulai Rp 22.000</div>
        </div>
      </div>
      
      <div class="relative rounded-2xl overflow-hidden shadow-lg">
        <img src="<?php echo e(Vite::asset('resources/images/papeda.png')); ?>" class="w-full h-full object-cover">
        <div class="absolute bottom-0 w-full p-2 bg-gradient-to-t from-black/70 to-transparent text-white">
          <div class="text-yellow-400 text-sm">★★★★★</div>
          <div class="font-semibold text-sm">Papeda & Ikan</div>
          <div class="text-xs">Mulai Rp 49.000</div>
        </div>
      </div>
      
      <div class="relative rounded-2xl overflow-hidden shadow-lg col-span-2">
        <img src="<?php echo e(Vite::asset('resources/images/nasitutug.png')); ?>" class="w-full h-full object-cover">
        <div class="absolute bottom-0 w-full p-2 bg-gradient-to-t from-black/70 to-transparent text-white">
          <div class="text-yellow-400 text-sm">★★★★★</div>
          <div class="font-semibold text-sm">Nasi Tutug Oncom</div>
          <div class="text-xs">Mulai Rp 44.000</div>
        </div>
      </div>
    </div>

    
    <section id="favorite" class="pt-4 pb-16 bg-[#fdfaf7] rounded-3xl">
      
      <div class="mb-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div>
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
            Cita Rasa yang<br> Selalu Dirindukan
          </h2>
          <p class="mt-4 text-gray-600 max-w-xl">
            Dari Sabang sampai Merauke, menu andalan ini menjadi favorit karena
            kelezatannya yang tak lekang oleh waktu.
          </p>
        </div>
        <div class="flex space-x-4">
          <button class="px-4 py-2 bg-[#C1442E] text-white rounded-xl hover:bg-red-700 transition">
            Best Seller
          </button>
          <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition">
            Rekomendasi
          </button>
        </div>
      </div>
      
      <div id="best-seller" role="tabpanel">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          
          <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(Vite::asset('resources/images/buburmanado.png')).'','title' => 'Bubur Manado','badges' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Best Seller', 'color' => 'red'], ['label' => 'Khas Sulawesi', 'color' => 'green']]),'rating' => '4.3','oldPrice' => '22000','price' => '18000','description' => 'Bubur khas Sulawesi dengan campuran sayuran segar, daun kemangi, dan rasa gurih...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(Vite::asset('resources/images/sotobanjar.png')).'','title' => 'Soto Banjar','badges' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Best Seller', 'color' => 'red'], ['label' => 'Khas Kalimantan', 'color' => 'green']]),'rating' => '4.5','oldPrice' => '26000','price' => '22000','description' => 'Hidangan khas Kalimantan dengan kuah bening gurih, suwiran ayam, perkedel, dan bawang...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(Vite::asset('resources/images/rawon.png')).'','title' => 'Rawon','badges' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Best Seller', 'color' => 'red'], ['label' => 'Khas Jawa Timur', 'color' => 'green']]),'rating' => '4.6','oldPrice' => '25000','price' => '20000','description' => 'Sup daging sapi khas Jawa Timur dengan kuah hitam dari kluwek, disajikan dengan tauge dan...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(Vite::asset('resources/images/pempek.png')).'','title' => 'Pempek','badges' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Best Seller', 'color' => 'red'], ['label' => 'Khas Sumatera', 'color' => 'green']]),'rating' => '4.5','oldPrice' => '26000','price' => '20000','description' => 'Olahan ikan khas Palembang dengan rasa gurih kenyal, disajikan dengan kuah cuko pedas-manis.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(Vite::asset('resources/images/rendang.png')).'','title' => 'Rendang','badges' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Best Seller', 'color' => 'red'], ['label' => 'Khas Sumatera', 'color' => 'green']]),'rating' => '4.9','oldPrice' => '42000','price' => '35000','description' => 'Daging sapi empuk khas Minang yang dimasak dengan santan dan rempah hingga meresap...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(Vite::asset('resources/images/sotokudus.png')).'','title' => 'Soto Kudus','badges' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Best Seller', 'color' => 'red'], ['label' => 'Khas Jawa Tengah', 'color' => 'green']]),'rating' => '4.8','oldPrice' => '29000','price' => '25000','description' => 'Soto ayam khas Kudus dengan kuah gurih ringan, suwiran ayam kampung, dan taburan bawang...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(Vite::asset('resources/images/ayambetutu.png')).'','title' => 'Ayam Betutu','badges' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Best Seller', 'color' => 'red'], ['label' => 'Khas Bali', 'color' => 'green']]),'rating' => '4.5','oldPrice' => '49000','price' => '40000','description' => 'Ayam utuh khas Bali yang dibumbui rempah pedas, dimasak perlahan hingga daging empuk dan...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
          <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(Vite::asset('resources/images/nasiliwet.png')).'','title' => 'Nasi Liwet Solo','badges' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Best Seller', 'color' => 'red'], ['label' => 'Khas Jawa Tengah', 'color' => 'green']]),'rating' => '4.4','oldPrice' => '26000','price' => '22000','description' => 'Nasi gurih khas Solo dengan lauk sayur labu siam, ayam suwir, dan areh santan yang creamy.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
        </div>
        <div class="flex justify-center mt-10">
          <a href="<?php echo e(url('/menu')); ?>" 
            class="bg-[#C1442E] text-white px-6 py-3 rounded-full shadow-md hover:bg-[#a83620] transition">
            Lihat Semua Menu
          </a>
        </div>
      </div>
    </section>

    
    <section class="bg-[#C1442E] rounded-3xl px-6 md:px-8 lg:px-12 py-12 mb-20">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

        
        <div class="text-white">
          <h2 class="text-3xl md:text-5xl font-bold leading-tight">
            Paket Keluarga <br> Nusantara
          </h2>
          <p class="mt-3 text-base md:text-lg max-w-md">
            Menu istimewa untuk berbagi cerita di meja makan.
          </p>

          
          <div class="flex gap-3 mt-6">
            <button
              class="w-10 h-10 flex items-center justify-center rounded-full border border-white hover:bg-white hover:text-[#C1442E] transition">
              ←
            </button>
            <button
              class="w-10 h-10 flex items-center justify-center rounded-full border border-white hover:bg-white hover:text-[#C1442E] transition">
              →
            </button>
          </div>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      
          
          <div class="relative rounded-2xl overflow-hidden shadow-lg">
            <img src="<?php echo e(Vite::asset('resources/images/nasitutug2.png')); ?>" class="w-full h-72 md:h-80 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
            <div class="absolute bottom-0 p-4 text-white">
              <div class="flex items-center text-yellow-400 text-xs mb-1">★★★★★</div>
              <h3 class="font-semibold text-base md:text-lg">Nasi Tutug Oncom</h3>
              <p class="text-xs md:text-sm">Mulai Rp 150.000 untuk 4 orang</p>
              <button
                class="mt-2 w-full bg-[#C1442E] text-white py-2 text-sm rounded-full hover:bg-red-700 transition">
                Reservasi Sekarang
              </button>
            </div>
          </div>

          
          <div class="relative rounded-2xl overflow-hidden shadow-lg">
            <img src="<?php echo e(Vite::asset('resources/images/nasiliwet2.png')); ?>" class="w-full h-72 md:h-80 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
            <div class="absolute bottom-0 p-4 text-white">
              <div class="flex items-center text-yellow-400 text-xs mb-1">★★★★★</div>
              <h3 class="font-semibold text-base md:text-lg">Nasi Liwet Solo</h3>
              <p class="text-xs md:text-sm">Mulai Rp 110.000 untuk 4 orang</p>
              <button
                class="mt-2 w-full bg-[#C1442E] text-white py-2 text-sm rounded-full hover:bg-red-700 transition">
                Reservasi Sekarang
              </button>
            </div>
          </div>

          
          <div class="relative rounded-2xl overflow-hidden shadow-lg">
            <img src="<?php echo e(Vite::asset('resources/images/gudeg2.png')); ?>" class="w-full h-72 md:h-80 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
            <div class="absolute bottom-0 p-4 text-white">
              <div class="flex items-center text-yellow-400 text-xs mb-1">★★★★★</div>
              <h3 class="font-semibold text-base md:text-lg">Gudeg Jogja</h3>
              <p class="text-xs md:text-sm">Mulai Rp 96.000 untuk 4 orang</p>
              <button
                class="mt-2 w-full bg-[#C1442E] text-white py-2 text-sm rounded-full hover:bg-red-700 transition">
                Reservasi Sekarang
              </button>
            </div>
          </div>

        </div>
      </div>
    </section>


    
    <section class="pt-10 pb-16 bg-[#fdfaf7] rounded-3xl mb-20">
      
      <div class="text-left mb-10">
        <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4">
          Cerita Dibalik Rasa Nusa
        </h2>
        <p class="text-gray-600 max-w-2xl leading-relaxed">
          Setiap hidangan punya kisah.<br />
          Temukan perjalanan rasa dari bahan pilihan hingga tradisi yang kami jaga.
        </p>
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <div x-data="{ open: true }" class="border border-gray-300 rounded-2xl overflow-hidden">
          <button @click="open = !open"
            class="w-full flex justify-between items-center px-6 py-4 text-base md:text-lg font-medium text-gray-900">
            Sejarah Rasa Nusa
            <span x-show="!open">+</span>
            <span x-show="open">−</span>
          </button>
          <div x-show="open" x-transition class="px-6 pb-6 text-gray-700 bg-gray-900 text-white rounded-b-2xl">
            <p>
              Kami percaya bahwa rasa terbaik lahir dari bahan terbaik. Semua bahan yang kami gunakan berasal dari petani dan nelayan lokal,
              dipilih secara ketat untuk menjaga kesegaran, kualitas, dan rasa yang autentik. Dengan cara ini, kami tidak hanya menjaga cita rasa,
              tetapi juga mendukung perekonomian lokal.
            </p>
          </div>
        </div>
        
        <div x-data="{ open: false }" class="border border-gray-300 rounded-2xl overflow-hidden">
          <button @click="open = !open"
            class="w-full flex justify-between items-center px-6 py-4 text-base md:text-lg font-medium text-gray-900">
            Filosofi Rasa
            <span x-show="!open">+</span>
            <span x-show="open">−</span>
          </button>
          <div x-show="open" x-transition class="px-6 pb-6 text-gray-700">
            <p>
              Setiap hidangan mengandung filosofi tentang kebersamaan, kesederhanaan, dan cinta pada budaya nusantara.
            </p>
          </div>
        </div>
        
        <div x-data="{ open: false }" class="border border-gray-300 rounded-2xl overflow-hidden">
          <button @click="open = !open"
            class="w-full flex justify-between items-center px-6 py-4 text-base md:text-lg font-medium text-gray-900">
            Komitmen Halal
            <span x-show="!open">+</span>
            <span x-show="open">−</span>
          </button>
          <div x-show="open" x-transition class="px-6 pb-6 text-gray-700">
            <p>
              Kami berkomitmen menghadirkan hidangan halal dengan standar kualitas tinggi yang sesuai syariat.
            </p>
          </div>
        </div>
        
        <div x-data="{ open: false }" class="border border-gray-300 rounded-2xl overflow-hidden">
          <button @click="open = !open"
            class="w-full flex justify-between items-center px-6 py-4 text-base md:text-lg font-medium text-gray-900">
            Perjalanan Kami ke Depan
            <span x-show="!open">+</span>
            <span x-show="open">−</span>
          </button>
          <div x-show="open" x-transition class="px-6 pb-6 text-gray-700">
            <p>
              Dengan inovasi dan semangat menjaga warisan budaya, kami terus berkomitmen menghadirkan cita rasa nusantara untuk generasi mendatang.
            </p>
          </div>
        </div>
      </div>
    </section>

    
<section class="bg-[#fdfaf7] pt-8 pb-16 px-6 md:px-12 lg:px-20 overflow-hidden">
  <div class="max-w-[1600px] mx-auto">

    
    <div class="mb-12 text-left">
      <h2 class="text-3xl md:text-5xl font-bold text-gray-900">
        Apa Kata Mereka?
      </h2>
      <p class="text-gray-600 mt-2 max-w-2xl">
        Cerita nyata dari pelanggan yang telah mencicipi dan jatuh cinta pada cita rasa nusantara di Rasa Nusa.
      </p>
    </div>

    
    <div class="flex items-center justify-center gap-6 relative">

      
      <div class="hidden lg:block w-[380px] h-[280px] bg-[#1a1a1a] text-white rounded-2xl overflow-hidden flex items-center p-6 -ml-24">
        <p class="text-sm leading-relaxed opacity-70">
          Rasa cocok saya 
          pulang ke kampung halaman.
        </p>
      </div>

      
      <div class="flex w-[860px] h-[460px] rounded-2xl overflow-hidden shadow-lg z-10">

        
        <div class="w-1/2">
          <img src="<?php echo e(Vite::asset('resources/images/jessica.png')); ?>"
               alt="Jessica"
               class="w-full h-full object-cover">
        </div>

        
        <div class="bg-[#1a1a1a] text-white w-1/2 p-8 flex flex-col justify-between">
          <div class="text-5xl mb-4">“</div>
          <p class="text-base md:text-lg leading-relaxed mb-6">
            Rasa masakannya benar-benar membawa saya pulang ke kampung halaman.
            Rempahnya pas, nasinya pulen, dan sambalnya bikin nagih!
          </p>
          <div>
            <div class="flex items-center text-yellow-400 text-sm mb-2">★★★★★</div>
            <h4 class="font-semibold text-lg">Jessica</h4>
            <p class="text-sm text-gray-300">Bandung</p>
          </div>
        </div>
      </div>

      
      <div class="hidden lg:block w-[380px] h-[280px] rounded-2xl overflow-hidden shadow-md -mr-24">
        <img src="<?php echo e(Vite::asset('resources/images/testi2.png')); ?>"
             alt="Customer 2"
             class="w-full h-full object-cover">
      </div>
    </div>

    
    <div class="flex justify-end gap-3 mt-8 pr-10">
      <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-800 hover:bg-gray-800 hover:text-white transition">
        ←
      </button>
      <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-800 hover:bg-gray-800 hover:text-white transition">
        →
      </button>
    </div>

  </div>
</section>

      
<section class="bg-[#fdfaf7] py-16 px-6 md:px-12 lg:px-20">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
    
    
    <div>
      <h2 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight mb-4">
        Rasakan Kemewahan <br> Cita Rasa Nusantara
      </h2>
      <p class="text-gray-600 mb-6 max-w-md">
        Setiap hidangan adalah karya seni dari rempah terbaik negeri. 
        Nikmati pengalaman bersantap yang berkelas, autentik, dan penuh kehangatan tradisi.
      </p>

      <div class="flex gap-4">
        <a href="#"
           class="bg-[#e74c3c] text-white px-6 py-3 rounded-lg font-medium shadow hover:bg-[#c0392b] transition">
          Pesan sekarang
        </a>
        <a href="#"
           class="bg-[#f3e5e1] text-gray-800 px-6 py-3 rounded-lg font-medium shadow hover:bg-[#e6d8d3] transition">
          Jelajahi Rasa
        </a>
      </div>
    </div>

    
    <div class="relative flex justify-center">
      <div class="overflow-hidden rounded-[120px]">
        <img src="<?php echo e(Vite::asset('resources/images/makanan.png')); ?>" 
             alt="Cita Rasa Nusantara"
             class="w-full h-[400px] object-cover">
      </div>
    </div>

  </div>
</section>


  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\project-pkl\wp-content\themes\riset-wordpress-sage\resources\views/front-page.blade.php ENDPATH**/ ?>