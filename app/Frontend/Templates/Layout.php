<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="David Hagnere" />


</head>
<body>
<header>
    <nav>
        <div>
            <div>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Chapitres </a></li>
                        <ul>
                            <li><a href="/chapters/last.html">Les derniers chapitres publiée</a></li>
                            <li><a href="/chapters/all.html"> Tous les chapitres</a></li>
                        </ul>
                <ul>

             <?php if ($user->isAdmin()) : ?>

                        <li><a href="/admin/home.html">Administration</a></li>

                    <?php endif; ?>

                    <?php if (!$user->isAuthenticated()) : ?>

                        <li><a href="/admin/connect.html">Se connecter</a></li>
                        <li><a href="/admin/user-insert.html">S'inscrire</a></li>

                    <?php endif; ?>

                    <?php if ($user->isAuthenticated()) : ?>

                        <li><a href="/admin/disconnect.html">Se deconnecter</a></li>

                    <?php endif; ?>
                </ul>
        </div>
            </div>
    </nav>
</header>


<div>
    <div>

    </div>
</div>

<div>
	<?php if ($user->hasFlash()) : ?>
        <div>
			<?= '<p>' . $user->getFlash() . '</p>'; ?>
        </div>
	<?php endif; ?>


	<?php echo '<div>' . $content . '</div>' ?>
</div>


<div>
    <div>
        <footer>
            <p>
                <a> Ce blog est un test !</a>
            </p>
        </footer>
    </div>
</div>
</body>
</html>
