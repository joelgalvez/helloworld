<?if(!$page->contentonly):?>
	<?
		$footer = $pages->get('/footer');
		if(!$footer instanceof NullPage){
			echo '<footer>';
			$footer->contentonly=true;
			echo $footer->render();
			echo '</footer>';
		}
	?>

	</div>
</body>
</html>
<?endif?>