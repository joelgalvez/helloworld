<?include_once('head.php');?>
	<?
		$full_size = 2000;
		$height = (int) $full_size * 0.7;
	?>
	<div class="overview <?=$page->template->name?>">
		<?foreach($page->children('inoverview=1') as $c):?>
			<?
				$size = $c->size;
				if($size=='') {
					$size = 2;
				}
			?>
			<?icon($c, 2000, 2000, true, false, false)?>
		<?endforeach?>
	</div>
<?include('foot.php');?>