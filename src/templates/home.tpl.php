<?php include 'partials/header.tpl.php';?>

<body>
    <header>
        <h1><?= $title;?></h1>
    </header>
    <nav>
        <a href="?url=login">Login</a>
        <a href="?url=register">Registrarse</a>
    </nav>
    <main>
        <?php foreach($alumnes as $alumne):?>
                <p><?= $alumne;?></p>
        <?php endforeach;?>
    </main>
</body>
</html>