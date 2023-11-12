<?php ob_start(); ?>
<div class="bg-black">
    <h1 class="text-4xl font-serif bg-white rounded-r-full text-center w-52 capitalize">
        Sobre nosotros
    </h1>
</div>
<div class="flex flex-col grow bg-white mt-5">
    <span class="my-5 text-2xl capitalize text-center rounded-t-full">Museo paleontológico de Múzquiz</span>
    <div class="px-10 bg-slate-200 mx-5 mb-5 py-5 rounded-lg">
        <p>Adolfo E. Romo</p>
        <p>La Cascada</p>
        <p>CP 26340"</p>
        <p>Ciudad M. Múzquiz, Múzquiz, Coahuila</p>
        <p>Tel: +52 (864) 616-4800</p>
        <p>Cel: +52 (864) 103-1051</p>
        <p class="text-right pt-10">
            <a href="mailto:info@paleontologiamuzquiz.com" class="uppercase">info@paleontologiamuzquiz.com</a>
        </p>
    </div>
</div>
<?php $this->content = ob_get_clean(); ?>
