<?include('head.php');?>
	<?
		$full_size = 800;
		$size_per_image = (int) $full_size ;
		$height = (int) $size_per_image * 0.7;
		$children = $page->children('inoverview=1,limit=12');
	?>
	<div class="overview <?=$page->template->name?>">
		<?foreach($children as $item):?>
			<a href="<?=$item->url?>" class="item size-<?=$item->size?>">
				<?if(count($item->images)>0):?>
					<?
						$thumb = $item->images->first()->size($size_per_image,$height,array('upscaling'=>false, 'cropping'=>false));
					?>				
					<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
					<div class="caption">
						<h4><?=$item->title?></h4>
						<div class="leadtext">
							<?=$item->leadtext?>
						</div>
					</div>
				<?endif?>
			</a>
		<?endforeach?>
	</div>
	<div class="pagination">
		<?=$children->renderPager()?>
	</div>
<?include('foot.php');?>