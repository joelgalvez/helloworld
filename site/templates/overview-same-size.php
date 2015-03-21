<?include('head.php');?>
	<?
		$full_size = 2000;
		$columns = 4;
		$size_per_image = (int) $full_size / $columns;
		$height = (int) $size_per_image * 0.7;
		$children = $page->children('inoverview=1,limit=12');
	?>
	<div class="overview <?=$page->template->name?>">
		<?foreach($children as $project):?>
			<a href="<?=$project->url?>" class="item size-<?=$project->size?>">
				<?if(count($thumb = $project->images)>0):?>
					<?
						$thumb = $project->images->first()->size($size_per_image,$height,array('upscaling'=>true, 'cropping'=>true));
					?>				
					<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
					<div class="caption">
						<h2><?=$project->title?></h2>
						<div class="leadtext">
							<?=$project->leadtext?>
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