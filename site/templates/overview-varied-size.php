<?include('head.php');?>
	<?
		$factor = 200;
		$children = $page->children('inoverview=1,limit=15');
	?>
	<div class="overview <?=$page->template->name?>">
		<?foreach($children as $project):?>
			<a href="<?=$project->url?>" class="item size-<?=$project->size?>">
				<?if(count($thumb = $project->images)>0):?>
					<?
						$size = $project->size;
						if($size=='') {
							$size = 2;
						}

						$thumb = $project->images->first()->size($factor*$size,$factor*$size,array('upscaling'=>false, 'cropping'=>false));
					?>				
					<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
					<div class="caption">
						<h4><?=$project->title?></h4>
						<?/*?>
						<div class="leadtext">
							<?=$project->leadtext?>
						</div>
						<?*/?>
					</div>
				<?endif?>
			</a>
		<?endforeach?>
	</div>
	<div class="pagination">
		<?=$children->renderPager()?>
	</div>
<?include('foot.php');?>