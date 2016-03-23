<?include('head.php');?>
	<?foreach($page->children('inoverview=1') as $child):?>
		<?
			$child->contentonly = 1;
		?>
		<div class="block">
			<?if($child->template->name=='article'):?>
				<?
					$href = '';
					if($child->getUnformatted('body')!='') {
						$href = "href=\"" . $child->url . "\"";
					}
				?>
				<a <?=$href?> class="item content">
					<h1><?=$child->title?></h1>
					<div class="overviewtext content">
						<?if(count($thumb = $child->images)>0):?>
							<div class="image">
								<?
									$thumb = $child->images->first()->size(600,400,array('upscaling'=>false, 'cropping'=>false));
								?>
								<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
							</div>
						<?endif?>
						<?=$child->overviewtext?>
						<?if($child->getUnformatted('body')!='' && $child->readmore==''):?>
							<div class="readmore" href="<?=$child->url?>"><?=$pages->get('/settings/readmore')->title?></div>
						<?else:?>
							<div class="readmore" href="<?=$child->url?>"><?=$child->readmore?></div>
						<?endif?>
					</div>
				</a>
			<?else:?>
				<div class="content">
					<h1><?=$child->title?></h1>
					<?if(count($child->images)>0):?>
						<?
							$thumb = $child->images->first()->width(2880, array('upscaling'=>false, 'cropping'=>false));
						?>
						<div class="image">
							<img src="<?=$thumb->url?>" alt="<?=$thumb->description?>">
							<div class="caption"><?=$thumb->description?></div>
						</div>
					<?endif?>
					<div class="overviewtext content"><?=$child->overviewtext?></div>
				</div>
				<?=$child->render()?>
			<?endif?>
		</div>
	<?endforeach?>
<?include('foot.php');?>
