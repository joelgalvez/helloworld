<?if(!$page->contentonly):?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<?=$pages->get('/settings')->includes?>
		<?/*?><link rel="stylesheet" type="text/css" href="<?=AIOM::CSS('styles/main.less')?>"><?*/?>
		<link rel="stylesheet" type="text/css" href="<?=$config->urls->templates?>css/main.css">
		<style><?=$pages->get('/settings')->css?></style>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		

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

<?function icon($i, $width, $height, $upscaling=false, $cropping=false, $show_leadtext=false) {?>
	<?
		$has_content = $i->getUnformatted('body')!='';
	?>
	<a <?=$has_content?"href=\"{$i->url}\"":""?> class="item size-<?=$i->size?>">
		
		<?if(count($thumb = $i->images)>0):?>
			<figure>
				<?
					$thumb = $i->images->first()->size($width,$height,array('upscaling'=>$upscaling, 'cropping'=>$cropping));
				?>				
				<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
				<figcaption>
					<?=$i->title?>
					<?if($show_leadtext):?>
						<div class="leadtext">
							<?=$project->leadtext?>
						</div>
					<?endif?>
				</figcaption>
			</figure>
		<?endif?>
	</a>
<?}?>