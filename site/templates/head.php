<?if(!$page->contentonly):?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?=AIOM::CSS('styles/main.less')?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link rel="stylesheet" type="text/css" href="<?=$config->urls->templates?>css/main.css"> -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="<?=$config->urls->templates?>js/main.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="menu">
				<?
					$parents_or_self = new PageArray();
					$parents_or_self->add($page->parents());
					$parents_or_self->add($page);

				?>
				<?foreach($parents_or_self as $pos):?>
					<h2>
						<?foreach($pos->siblings() as $sibling):?>
							<?if($sibling->inmenu):?>
								<a class="menu-item <?=$sibling->id==$pos->id?'active':''?>" href="<?=$sibling->url?>"><?=$sibling->title?></a>
							<?endif?>
						<?endforeach?>
					</h2>
				<?endforeach?>
				<?
				$subs = $page->children();
				?>
				<?if(count($subs)>0):?>
					<h2>
						<?foreach($subs as $c):?>
							<?if($c->inmenu):?>
								<a class="menu-item" href="<?=$c->url?>"><?=$c->title?></a>
							<?endif?>
						<?endforeach?>
					</h2>
				<?endif?>

			</div>
<?endif?>