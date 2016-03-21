<?include_once('head.php');?>
<div class="page <?=$page->template->name?>">
	<?
		$children = $page->children('inoverview=1');
	?>
	<div class="overview content <?=$page->template->name?>">
		<h1><?=$page->title?></h1>
		<?if(count($page->images)>0):?>
			<?
				$thumb = $page->images->first()->width(2880, array('upscaling'=>false, 'cropping'=>false));
			?>
			<div class="image">
				<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
				<div class="caption"><?=$thumb->description?></div>
			</div>
		<?endif?>

		<?foreach($children as $c):?>
			<p>
				<a href="<?=$c->url?>" class="item"><?=$c->title?></a>
			</p>
		<?endforeach?>
	</div>
<?include('foot.php');?>
