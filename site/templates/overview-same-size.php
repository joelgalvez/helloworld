<?include_once('head.php');?>
	<?
		$full_size = 4000;
		$columns = 4;
		$size_per_image = (int) $full_size / $columns;
		$height = (int) $size_per_image * 0.7;
		$children = $page->children('inoverview=1,limit=12');
	?>
	<div class="overview <?=$page->template->name?>">
		<?foreach($children as $c):?>
			<?icon($c, $size_per_image, $height, true, true, true)?>
		<?endforeach?>
	</div>
	<div class="pagination">
		<?=$children->renderPager()?>
	</div>
<?include('foot.php');?>