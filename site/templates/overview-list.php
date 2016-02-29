<?include_once('head.php');?>
	<?
		$children = $page->children('inoverview=1');
	?>
	<div class="overview content <?=$page->template->name?>">
		<?foreach($children as $c):?>
			<p>
				<a href="<?=$c->url?>" class="item"><?=$c->title?></a>
			</p>
		<?endforeach?>
	</div>
<?include('foot.php');?>
