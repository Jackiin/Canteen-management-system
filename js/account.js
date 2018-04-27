function account() {	
			/*
			$('form').submit(function() {
		
			});	
			*/
		
		$('#next').unbind('click').click(function() {
			
			$('#order01').ajaxSubmit();	
			$('#order02').ajaxSubmit();	
			$('#order03').ajaxSubmit();	
			$('#order04').ajaxSubmit();	
			var order01 = $('#order01').formSerialize();
			var order02 = $('#order02').formSerialize();
			var order03 = $('#order03').formSerialize();
			var order04 = $('#order04').formSerialize();
			var order = order01 + "&" + order02 + "&" + order03 + "&" + order04;
			
			
			$.get("/accounting.php", order, function(data) {
				alert(order);
				window.location.href = "/accounting.php?" + order;
			});
			
			
		});
		
}