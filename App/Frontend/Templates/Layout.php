<!DOCTYPE html>
<html>
<head>
	<title>
		<?= isset($title) ? $title : 'Site de Jean Forteroche' ?>
	</title>

	<meta charset="utf-8" />

</head>

<body>
<div id="wrap">
	<header>
		<h1><a href="/">Jean Forteroche Artiste et Ecrivain</a></h1>

	</header>

	<nav>
		<ul>
			<li><a href="/">Accueil</a></li>
			<?php if ($user->isAuthenticated()) { ?>
				<li><a href="/admin/">Admin</a></li>
				<li><a href="/admin/news-insert.html">Ajouter une news</a></li>
			<?php } ?>
		</ul>
	</nav>

	<div id="content-wrap">
		<section id="main">
			<?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>

			<?= $content ?>
		</section>
	</div>

	<footer></footer>
</div>
</body>
</html>