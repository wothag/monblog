<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 02/01/2018
 * Time: 20:25
 */

namespace app;

foreach ($listChapters as $chapters)
{
	?>
	<h2><a href="chapters-<?= $chapters['id'] ?>.html"><?= $chapters['title'] ?></a></h2>
	<p><?= nl2br($chapters['content']) ?></p>
	<?php
}