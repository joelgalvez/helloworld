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
			<?icon($c, ['width'=>$size*300,'height'=>$size*300, 'cropping'=>false,'upscaling'=>false,'show_overviewtext'=>false])?>
		<?endforeach?>
	</div>
	<div class="pagination">
		<?=$children->renderPager()?>
	</div>
<?include('foot.php');?>
