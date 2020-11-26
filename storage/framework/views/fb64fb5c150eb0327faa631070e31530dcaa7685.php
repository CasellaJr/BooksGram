<script type="text/javascript">
	$('#serachQuery').keypress(function(){ //keypress counts the number of keys pressed in an input form
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
                		//i++;
                		// console.log(value.volumeInfo.title);
                		//var amount;
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
	                		newbuyLink = "NA";
	                	}

	                	
	                	var newthumnail = thumbnail.replaceAll('&','$');
	                	
	                	console.log(newbuyLink);
	                	
                		
                		$("#searchResult").append("<li value='"+i+++"'><a href='/p/create?thumbnail="+newthumnail+"&title="+title+"&author="+bookAuthor+"&price="+price+"&buyLink="+newbuyLink+"'  class=post_data target=_blank data-title='"+title+"' data-author='"+bookAuthor+"' data-thumbnail='"+thumbnail+"' data-publishedDate='"+publishedDate+"' data-publishedDate='"+publishedDate+"' data-price='"+price+"' data-currencyCode='"+currencyCode+"' data-buyLink='"+buyLink+"'>"+title+"</a></li>");
                		
                		
                	});
                }
            });
		}
	});
</script><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/BooksGram/resources/views/posts/post-get.blade.php ENDPATH**/ ?>