<?php ob_start(); ?>
<footer>
    <div class="
    flex flex-col
    m-3
    p-5
    text-gray-200
    items-center">
    <ul class="
        flex
        flex-row gap-10">
            <li class="hover:underline"><a href="/about">About</a></li>
            <li class="hover:underline"><a href="https://www.github.com/Zekard92">Github</a></li>
            <li class="hover:underline"><a href="https://www.linkedin.com/in/miguel-guajardo/">Linkedin</a></li>
        </ul>
        <span class="text-sm text-accent"><a href="mailto:mguajardoal@paleontologiamuzquiz.com">&copy;2023 - Miguel A. Guajardo</a></span>
    </div>
</footer>
<?php $this->footer = ob_get_clean(); ?>