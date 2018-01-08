/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 06/01/2018
 * Time: 14:50
 */

<div>
	<article>
			<h2><?= $chapters->title() ?></h2>
				<div><?= nl2br($chapters->content()) ?></div>
					<div>
					<p><?php if ($chapters->dateCreate() != $chapters->lastModif()) : ?>
						<?= 'Modifié le ' . $chapters->lastModif()->format(' d/m/Y à H\hi'); ?>
					<?php else : ?>
						<?= 'Publié le ' . $chapters->dateCreate()->format(' d/m/Y à H\hi'); ?>
					<?php endif; ?>
					</p>
					</div>

	</article>
</div>

<div>
	<?php if ($user->isAuthenticated()) : ?>
			<p><ahref="/comments/insert-comment-<?= $chapters->id() ?>.html">Ici pour ajouter un commentaire</a></p>
	<?php endif; ?>
</div>

<div>
	<?php if (empty($comments)) : ?>
		<div>
			<div>
				<p>Aucun commentaire</p>
		</div>
</div>

<div>

    <?php if (!$user->isAuthenticated()) : ?>

			<p><a href="/admin/connect.html" >Connectez-vous</a> ou <a href="/admin/user-insert.html" >Inscrivez-vous </a> pour consulter ou ajouter un commentaire</p>

    <?php endif; ?>

</div>

    <?php else : ?>

        <?php if (!$user->isAuthenticated()) : ?>

				<p><a href="/admin/connect.html">Connectez-vous</a> ou <a href="/admin/user-insert.html" >Inscrivez-vous</a> pour consulter ou ajouter un commentaire</p>

        <?php endif; ?>


        <?php if($user->isAuthenticated() && $user->isAdmin()): ?>

								<?php foreach ($comments as $comment) : ?>

							<div>

								<div>

                                Posté par<?= $comment->author() ?>

											<a title="Signaler le commentaire" href="/comments/flag-comment-<?= $comment->id() ?>.html"></a>
							</div>


                                <div>
							        <p><?= nl2br(htmlspecialchars($comment->content())) ?></p>
						        </div>

                                <div>

                                    <p> <a title="Modifier le commentaire" href="/admin/comment-update-<?= $comment->id() ?>.html"></a><a title="Supprimer le commentaire" href="/admin/comment-delete-<?= $comment->id() ?>.html"></a></p>

                                    <?php if($comment->flag() != 0): ?>

                                        <p><em>Commentaire signalé</em><br>

                                            <em>En attente de modération</em>

                                        </p>
                                    <?php endif; ?>

                                </div>

                            </div>
                    <?php endforeach; ?>
            <?php endif; ?>

        <?php if($user->isAuthenticated() && $user->isUser()): ?>
            <?php foreach ($comments as $comment) : ?>
                    <?php if($comment->flag() === 0): ?>
                        <div>
                            <div>
                                Posté par<?= $comment->author() ?>
                                <a title="Signaler le commentaire" href="/comments/flag-comment-<?= $comment->id() ?>.html"></a>
                            </div>
                         <div>

                                <p><?= nl2br(htmlspecialchars($comment->content())) ?></p>
                        </div>

                            <div class="panel-footer" style="min-height: 60px;">

                                <?php if ($user->isAuthenticated() && $user->isAdmin()) : ?>

                                    <p class="pull-left">

                                        <a class="btn btn-info" title="Modifier le commentaire" href="/admin/comment-update-<?= $comment->id() ?>.html"><span class="glyphicon glyphicon-pencil"></span> </a>

                                        <a class="btn bn-warning" title="Supprimer le commentaire" href="/admin/comment-delete-<?= $comment->id() ?>.html"><span class="glyphicon glyphicon-remove"></span> </a>

                                    </p>

                                <?php endif; ?>

                            </div>

                        </div>

                <?php endif; ?>

            <?php endforeach; ?>

        <?php endif; ?>

    <?php endif; ?>
</div>
