less.watch();
less.optimization = 0;
jQuery(document).ready(function(){
  cache = null;
	less.watchTimer = setInterval(function () {
		if (less.watchMode) {
			console.log('Forcing Compile');
			less.refresh(true);
		}
	}, less.poll);
});