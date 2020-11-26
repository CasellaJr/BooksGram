<script type="text/javascript">
	$('#serachQuery').keypress(function(){
		String.prototype.replaceAll = function(searchStr, replaceStr) {
			var str = this;

			    // no match exists in string?
			    if(str.indexOf(searchStr) === -1) {
			        // return string
			        return str;
			    }

			    // replace and remove first match, and do another recursirve search/replace
			    return (str.replace(searchStr, replaceStr)).replaceAll(searchStr, replaceStr);
			}
		var search = $(this).val();
		if(search != ""){
			//console.log(val);
			$.ajax({
                url: 'https://www.googleapis.com/books/v1/volumes',
                type: 'get',
                data: {q:search},
                dataType: 'json',
                success:function(response){
                	var data = response.items;
                	$("#searchResult").empty();
                	var i=0;
                	$.each(data , function (key, value){
                		try {
	                		var title = value.volumeInfo.title;
	                		var authorsData = value.volumeInfo.authors;
	                		var categories = value.volumeInfo.categories;
	                		var authors = [];
	                		var cat = [];
	                		
	                		$.each(authorsData , function (key, value){
	                			authors.push(value);
	                		});
	                		$.each(categories , function (key, value){
	                			cat.push(value);
	                		});
	                		//
	                		var thumbnail = value.volumeInfo.imageLinks.thumbnail;
	                		var smallThumbnail = value.volumeInfo.imageLinks.smallThumbnail;
	                		var publishedDate = value.volumeInfo.publishedDate;
	                		var saleInfo = value.saleInfo.country;
	                		var saleability = value.saleInfo.saleability;
	                		var buyLink = value.saleInfo.buyLink;
	                		var price = value.saleInfo.listPrice.amount;
	                		var currencyCode = value.saleInfo.listPrice.currencyCode;
	                		var bookAuthor = authors.join();
	                		var finalCat = cat.join();
	                		var newbuyLink = buyLink.replaceAll('&','$');
	                	}catch (error) {
	                		thumbnail = "NA";
	                		smallThumbnail = "NA";
	                		price = "0";
	                		currencyCode = "NA";
	                		finalCat = "NA";
	                		bookAuthor="NA";
	                		newbuyLink="NA";
	                	}

	                	var newthumnail = thumbnail.replaceAll('&','$');

	                	

                		
                		$("#searchResult").append("<li value='"+i+++"'><a href='/storeCollection?thumbnail="+newthumnail+"&title="+title+"&author="+bookAuthor+"&price="+price+"&buyLink="+newbuyLink+"' data-title='"+title+"' data-author='"+bookAuthor+"' data-thumbnail='"+thumbnail+"' data-publishedDate='"+publishedDate+"' data-publishedDate='"+publishedDate+"' data-price='"+price+"' data-currencyCode='"+currencyCode+"' data-buyLink='"+buyLink+"'>"+title+"</a></li>");

                		$('.collectionData').html(response);
                		
                		
                	});

                }
            });
		}
	});
$('.addNewPost').click(function(){
	var title = $(this).data('title');
	var image = $(this).data('image');
	var baseLink = $(this).data('baselink');
	var author = $(this).data('author');
	var price = $(this).data('price');
	var check = $(this).data('check');
	var jsonData = {
        "_token": "<?php echo e(csrf_token()); ?>",
        "title": title,
        "image" : image,
        "baseLink" :baseLink,
        "author" : author,
        "price" : price,
        "check" : check
    };
    //console.log(jsonData);
    jsonData = JSON.stringify(jsonData);
	$.ajax({
        url: '<?php echo e(url('p')); ?>',
        contentType: "application/json",
    	type: 'POST',
        data: jsonData,
        success:function(response){
        	console.log(response);
        	bootbox.alert('Post Add SucceFully');
        }
    });
});
</script><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/BooksGram/resources/views/collection/post-get.blade.php ENDPATH**/ ?>