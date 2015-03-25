<?include('head.php');?>
	<?
		$full_size = 2000;
		$height = (int) $full_size * 0.7;
	?>
	<div class="overview <?=$page->template->name?>">
		<?foreach($page->children('inoverview=1') as $project):?>
			<a href="<?=$project->url?>" class="item size-<?=$project->size?>">
				<?if(count($thumb = $project->images)>0):?>
					<?
						$thumb = $project->images->first()->size($size_per_image,$height,array('upscaling'=>true, 'cropping'=>false));
					?>				
					<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
 					<div class="caption">
						<h4><?=$project->title?></h4>
					</div>
 				<?endif?>
			</a>
		<?endforeach?>
	</div>
<?include('foot.php');?>