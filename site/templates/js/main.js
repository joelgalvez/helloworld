$(function() {
    $(document.links).filter(function() {
        return this.hostname != window.location.hostname;
    }).attr('target', '_blank');

    $('a.item').each(function() {
    	var item = $(this);
    	var figures = $(this).find('figure');
    	if(figures.size()>1) {
    		item.css('cursor', 'pointer');
    		item.on('click.item', function() {
    			var visibleFigure = item.find('figure:visible');
    			visibleFigure.hide();
    			if(visibleFigure.next().size()==0) {
    				item.find('figure').hide();
    				item.find('figure:first').show();
    			} else {
    				visibleFigure.next().show();	
    			}
    		})
    	}
    })
});