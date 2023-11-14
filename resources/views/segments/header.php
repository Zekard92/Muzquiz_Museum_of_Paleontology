<?php ob_start(); ?>
<header class="">
    <div class="bg-black pb-5">
        <h1 class="rounded-br-full bg-white text-3xl font-serif w-60"><?php echo $this->title;?></h1>
    </div>
    <nav class="max-w-screen-full
    py-2
    px-4
    flex
    flex-wrap
    items-center
    justify-between">
        <div id="nav-main" class="mx-auto">
            <a href="/" class=" hover:text-accent-variant text-white p-1 text-xl font-semibold">Home</a>
            <a href="/About" class=" hover:text-accent-variant text-white p-1 text-xl font-semibold">About</a>
        </div>
    </nav>
</header>
<?php $this->header = ob_get_clean(); ?>
