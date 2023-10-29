<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="css/tailwind.css">
</head>
<body class=" flex flex-col m-0 min-h-screen bg-gray-500">
    <!-- Header -->
    <?php echo $this->header; ?>
    <!-- Content -->
    <main class="flex grow h-full my-5">
        <div class="
        flex
        flex-col
        grow
        bg-slate-300
        mx-20
        items-center
        rounded-lg
        px-5
        shadow-xl
        py-2">
            <?php echo $this->content; ?>
        </div>
    </main>
    <!-- Footer -->
    <?php echo $this->footer; ?>
</body>
</html>
