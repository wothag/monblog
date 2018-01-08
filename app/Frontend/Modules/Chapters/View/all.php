<hr>

		<h2>Tous les <?= $nbChapters ?> chapitres </h2>
<hr>

		<?php if(isset($chaptersList)): ?>
				<?php foreach ($chaptersList as $chapters): ?>
						<article>
								<h2>
									<a href="/chapters/chapter-<?= $chapters['id'] ?>.html"><?= $chapters['title']; ?></a>
								</h2>
									<div>
										<p>
											<?= nl2br($chapters['content']); ?>
										</p>
									</div>
	
									<div>
										<p><a href="/chapters/chapter-<?= $chapters['id'] ?>.html">Cliquer pour le texte entier</a></p>							
										<?php if($chapters['dateCreate'] != $chapters['lastModif']): ?>
										<p><?= 'Modifié le ' . $chapters['lastModif']->format(' d/m/Y à H\hi'); ?></p>
										<?php else: ?>
										<p><?= 'Publié le ' . $chapters['dateCreate']->format(' d/m/Y à H\hi'); ?></p>
										<?php endif; ?>
									</div>
						</article>
				<?php endforeach; ?>
		<?php endif; ?>
