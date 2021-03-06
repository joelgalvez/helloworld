<?require './scss.inc.php';?>
<?function icon($i, $args) {?>
	<?
	$args += [
			 $height => 600,
			 $width => 800,
			 $upscaling => false,
			 $cropping => false,
			 $show_overviewtext => false
		 ];
		 extract($args);
		 $count=0;
		 $total = count($i->images);
	?>
	<?
		$has_content = $i->getUnformatted('body')!='';
		if(!$i->template->hasField('body')) {
			$has_content = true;
		}
	?>
	<a <?=$has_content?"href=\"{$i->url}\"":""?> class="item size-<?=$i->size?>">
		<figure>
			<?if(count($thumb = $i->images)>0):?>
				<?
					$thumb = $i->images->first()->size($width,$height,array('upscaling'=>$upscaling, 'cropping'=>$cropping));
				?>
				<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
			<?endif?>
			<figcaption>
				<?if($i->title!='no-title'):?>
					<?=$i->title?><!--
				--><?endif?><!--
				--><?if(!$has_content && $total>1):?><!--
				-->, <span class="count">1 / <?=$total?></span>
				<?endif?>
				<?if($show_overviewtext):?>
				<?=$i->overviewtext?> <?=$thumb->description?>
				<?endif?>
			</figcaption>
		</figure>
		<?if(!$has_content):?>
			<?
				$rest_width = $thumb->width;
				$rest_height = $thumb->height;
				$count=2;
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
						<?=$i->title?><span class="count">, <?=$count?> / <?=$total?></span>
						<?=$thumb_rest->description?>
					</figcaption>
				</figure>
				<?
					$count++;
				?>
			<?endforeach?>
		<?endif?>
	</a>
<?}?>

<?
	function visit(Page $parent, $enter, $exit=null, $currentPage=null)
	{
	    foreach ($parent->children() as $child) {
	        call_user_func($enter, $child, $currentPage);

	        if ($child->numChildren > 0) {
	            visit($child, $enter, $exit, $currentPage);
	        }

	        if ($exit) {
	            call_user_func($exit, $child, $currentPage);
	        }
	    }
	}
?>
