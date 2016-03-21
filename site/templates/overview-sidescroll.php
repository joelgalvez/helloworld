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
			<?icon($c, ['width'=>1200,'height'=>1200, 'cropping'=>true,'upscaling'=>true,'showOverviewtext'=>false])?>
		<?endforeach?>
	</div>
<?include('foot.php');?>
