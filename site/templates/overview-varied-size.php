<?include_once('head.php');?>
	<?
		$factor = 200;
		$children = $page->children('inoverview=1,limit=15');
	?>
	<div class="overview <?=$page->template->name?>">
		<?foreach($children as $c):?>
			<?
				$size = $c->size;
				if($size=='') {
					$size = 2;
				}
			?>
			<?icon($c, $size*300, $size*300, false, false)?>
		<?endforeach?>
	</div>
	<div class="pagination">
		<?=$children->renderPager()?>
	</div>
<?include('foot.php');?>