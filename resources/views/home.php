<?php ob_start(); ?>
<main>
    <p>"Welcome to my website"</p>
    <ul>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
        <li>a</li>
    </ul>
</main>
<?php $content = ob_get_clean(); ?>
