<?include_once('head.php');?>
	<?
		$children = $page->children('inoverview=1,limit=15');
	?>
	<div class="overview <?=$page->template->name?>">
		<?foreach($children as $c):?>
			<?icon($c, ['width'=>1600, 'height'=>800,'showOverviewtext'=>true])?>
		<?endforeach?>
	</div>
	<div class="pagination">
		<?=$children->renderPager()?>
	</div>
<?include('foot.php');?>
