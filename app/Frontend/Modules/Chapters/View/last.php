
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 06/01/2018
 * Time: 14:42
 */

<hr>
	<h2>Les <?= $nbChapters ?> chapitres précédents </h2>
<hr>

	<div>
		<?php foreach ($chaptersList as $chapters): ?>
		<article>
		<h2>
			<a href="/chapters/chapter-<?= $chapters->id() ?>.html"><?= $chapters->title(); ?></a>
		</h2>
				<div>
					<p><?= nl2br($chapters->content()); ?></p>
				</div>
				<div>
					<p><a href="/chapters/chapter-<?= $chapters->id() ?>.html">Cliquez pour la suite ...</a></p>
					<p>
						<?php if($chapters->dateCreate() != $chapters->lastModif()): ?>
							<p><?= 'Modifié le ' . $chapters->lastModif()->format(' d/m/Y à H\hi'); ?></p>
						<?php else: ?>
							<p><?= 'Publié le ' . $chapters->dateCreate()->format(' d/m/Y à H\hi'); ?></p>
						<?php endif; ?>
				</div>
		</article>
		<?php endforeach; ?>
	</div>
