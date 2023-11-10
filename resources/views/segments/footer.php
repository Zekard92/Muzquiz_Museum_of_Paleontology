<?php ob_start(); ?>
<footer class="bg-gray-900">
    <div class="
    flex flex-col
    bg-slate-700
    rounded-lg
    m-3
    p-5
    text-gray-400
    items-center">
    <ul class="
        flex
        flex-row gap-4">
            <li class="hover:underline"><a href="/about">About</a></li>
            <li class="hover:underline"><a href="https://www.github.com/Zekard92">Github</a></li>
            <li class="hover:underline"><a href="https://www.linkedin.com/in/miguel-guajardo/">Linkedin</a></li>
        </ul>
        <span class="text-sm text-gray-500">&copy;2023 - Miguel A. Guajardo</span>
    </div>
</footer>
<?php $this->footer = ob_get_clean(); ?>