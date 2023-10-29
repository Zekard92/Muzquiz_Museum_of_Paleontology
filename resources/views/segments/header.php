<?php ob_start(); ?>
<header class="text-center text-white bg-gray-900 py-5">
    <div class="pb-5">
        <h1 class="text-6xl font-serif"><?php echo $this->title;?></h1>
    </div>
    <nav class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between py-2 px-4 bg-slate-700 rounded-lg">
        <div id="nav-main">
            <a href="/" class="hover:underline bg-slate-400 text-black p-1 rounded-lg">Home</a>
        </div>
    </nav>
</header>
<?php $this->header = ob_get_clean(); ?>
