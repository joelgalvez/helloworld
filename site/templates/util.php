<?function icon($i, $width, $height, $upscaling=false, $cropping=false, $show_leadtext=false) {?>
	<?
		$has_content = $i->getUnformatted('body')!='';
		if(!$i->template->hasField('body')) {
			$has_content = true;
		}
	?>
	<a <?=$has_content?"href=\"{$i->url}\"":""?> class="item size-<?=$i->size?>">
		
		<?if(count($thumb = $i->images)>0):?>
			<figure>
				<?
					$thumb = $i->images->first()->size($width,$height,array('upscaling'=>$upscaling, 'cropping'=>$cropping));
				?>				
				<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
				<figcaption>
					<!-- <?=$i->title?> -->
					<?if($show_leadtext):?>
						<div class="leadtext">
							<?=$i->leadtext?>
						</div>
					<?endif?>
				</figcaption>
			</figure>
			<?if(!$has_content):?>
				<?
					$rest_width = $thumb->width;
					$rest_height = $thumb->height;
				?>
				<?foreach($i->images as $img):?>
					<?
						if($i->images->first()->url == $img->url) {
							continue;
						}
						$thumb_rest = $img->size($rest_width, $rest_height, array('upscaling'=>true, 'cropping'=>true));
					?>
					<figure style="display:none">
						<img src="<?=$thumb_rest->url?>" alt="<?=$thumb_rest->description?>">
						<figcaption>
							<?=$thumb_rest->description?>
						</figcaption>
					</figure>
				<?endforeach?>
			<?endif?>
		<?endif?>
	</a>
<?}?>