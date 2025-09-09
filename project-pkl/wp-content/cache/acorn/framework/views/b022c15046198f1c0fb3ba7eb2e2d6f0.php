
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'image' => '',
  'title' => '',
  'badges' => [],
  'rating' => '',
  'oldPrice' => '',
  'price' => '',
  'description' => '',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
  'image' => '',
  'title' => '',
  'badges' => [],
  'rating' => '',
  'oldPrice' => '',
  'price' => '',
  'description' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="bg-white rounded-2xl shadow-md overflow-hidden max-w-xs">
  
  <div class="relative">
    <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" class="w-full h-40 object-cover">

    
    <?php if(!empty($badges)): ?>
      <div class="absolute top-2 left-2 flex space-x-2">
        <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <span class="bg-<?php echo e($badge['color']); ?>-600 text-white text-xs px-2 py-1 rounded-md">
            <?php echo e($badge['label']); ?>

          </span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>
  </div>

  
  <div class="p-4">
    
    <div class="flex items-center justify-between mb-1">
      <h3 class="font-semibold text-gray-800"><?php echo e($title); ?></h3>
      <?php if($rating): ?>
        <div class="flex items-center text-yellow-500 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
               viewBox="0 0 20 20" class="w-4 h-4 mr-1">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 
                     3.292a1 1 0 00.95.69h3.462c.969 0 
                     1.371 1.24.588 1.81l-2.8 
                     2.034a1 1 0 00-.364 
                     1.118l1.07 3.292c.3.921-.755 
                     1.688-1.54 1.118l-2.8-2.034a1 
                     1 0 00-1.176 0l-2.8 
                     2.034c-.785.57-1.84-.197-1.54-1.118l1.07-3.292a1 
                     1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.462a1 
                     1 0 00.95-.69l1.07-3.292z"/>
          </svg>
          <span><?php echo e($rating); ?></span>
        </div>
      <?php endif; ?>
    </div>

    
    <div class="mb-2">
      <?php if($oldPrice): ?>
        <span class="text-sm text-gray-500 line-through mr-2">Rp <?php echo e($oldPrice); ?></span>
      <?php endif; ?>
      <?php if($price): ?>
        <span class="text-red-600 font-bold">Rp <?php echo e($price); ?></span>
      <?php endif; ?>
    </div>

    
    <?php if($description): ?>
      <p class="text-gray-600 text-sm line-clamp-2 mb-4">
        <?php echo e($description); ?>

      </p>
    <?php endif; ?>

    
    <div class="flex items-center justify-between">
      <button class="bg-[#C1442E] text-white text-sm px-4 py-2 rounded-xl hover:bg-red-700 transition">
        Pesan Sekarang
      </button>
      <button class="p-2 rounded-full border hover:bg-gray-100 transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
             viewBox="0 0 24 24" class="w-5 h-5 text-gray-500">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 
                   000 6.364L12 20.364l7.682-7.682a4.5 
                   4.5 0 00-6.364-6.364L12 
                   7.636l-1.318-1.318a4.5 
                   4.5 0 00-6.364 0z" />
        </svg>
      </button>
    </div>
  </div>
</div>
<?php /**PATH D:\laragon\www\project-pkl\wp-content\themes\riset-wordpress-sage\resources\views/components/card.blade.php ENDPATH**/ ?>