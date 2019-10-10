jQuery(document).ready(function(){
	var form = jQuery('#faqsearch');

	if(form.length){
		var listing = jQuery(".faqslisting > details");
		console.log(listing);
		form.on('input',function(e){
			var input = e.target.value;

			filterItems(input);

		});

		function filterItems(filter){
			jQuery.each(listing,function(index,value){
				txtValue = listing[index].textContent || listing[index].innerText;
				if(txtValue.toUpperCase().indexOf(filter.toUpperCase()) == -1){
					listing[index].classList.add('hidden');
				} else {
					listing[index].classList.remove('hidden');
				}
			});
		}
	}
});