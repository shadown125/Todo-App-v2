<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">

    <meta property="og:title" content="Todo App" >
    <meta property="og:type" content="website" >
    <meta property="og:description" content="This App gonna be your best friend in evey day journey" >
    <meta property="og:locale" content="pl_PL" >
    <meta property="og:locale:alternate" content="en_GB" >

    <title>Todo App</title>

    <link rel="stylesheet" href="./build/main.css">

    <script src="./build/runtime.js" defer></script>
    <script src="./build/vendor.js" defer></script>
    <script src="./build/main.js" defer></script>
</head>
<body>
    <?php include('header.php'); ?>
    <main class="page-body">
        <div class="wrapper">
            <div class="container">
                <?php include("main-navigation-sidebar.php"); ?>
                <div class="content-container">
                    <div class="progression-content">

                    </div>
                    <section class="todos">
                        <div class="todos-header">
                            <h3 class="h3 headline">In progression</h3>
                            <a href="./" class="button"></a>
                            <div class="description">Today</div>
                        </div>
                        <div class="todos-wrapper">
                            <ul>
                                <li>
                                    <div class="header">
                                        <div class="circle"></div>
                                        <h3 class="h3 headline">My Todo</h3>
                                        <button class="button-complete"></button>
                                        <button class="button-edit"></button>
                                        <button class="button-delete"></button>
                                    </div>
                                    <div class="description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis elit sit amet nisi vulputate ornare. Etiam porttitor efficitur nisl, sed sagittis massa pharetra ut.
                                        Cras bibendum magna vel est tempus tincidunt. Curabitur ac aliquam libero. Morbi imperdiet lacus nec dui dapibus, id ultricies lorem sagittis. Maecenas ultrices mattis augue.
                                        Praesent ornare ornare elit a volutpat. Donec ac tincidunt purus. Pellentesque egestas elit sit amet blandit pretium.
                                        Aliquam iaculis viverra neque ut vestibulum. Suspendisse potenti. Curabitur sed erat dapibus, cursus dolor auctor, convallis diam. Sed quam libero, euismod vitae consectetur at, gravida sit amet lectus.
                                    </div>
                                </li>
                                <li>
                                    <div class="header">
                                        <div class="circle"></div>
                                        <h3 class="h3 headline">My Todo</h3>
                                        <button class="button-complete"></button>
                                        <button class="button-edit"></button>
                                        <button class="button-delete"></button>
                                    </div>
                                    <div class="description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis elit sit amet nisi vulputate ornare. Etiam porttitor efficitur nisl, sed sagittis massa pharetra ut.
                                        Cras bibendum magna vel est tempus tincidunt. Curabitur ac aliquam libero. Morbi imperdiet lacus nec dui dapibus, id ultricies lorem sagittis. Maecenas ultrices mattis augue.
                                        Praesent ornare ornare elit a volutpat. Donec ac tincidunt purus. Pellentesque egestas elit sit amet blandit pretium.
                                        Aliquam iaculis viverra neque ut vestibulum. Suspendisse potenti. Curabitur sed erat dapibus, cursus dolor auctor, convallis diam. Sed quam libero, euismod vitae consectetur at, gravida sit amet lectus.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer">
        <div class="wrapper">
            <div class="container">

            </div>
        </div>
    </footer>
</body>
</html>