$(function() {
    $('table tr input:image').click(function() {
        var order = $(this).closest('tr').find('td:eq(0)').text();
		var food = $(this).closest('tr').find('td:eq(1)').text();
		var cfm = confirm('Drop order record?');
        
		if (cfm == true) {
			window.location.href = "/functions/del_order.php?order_id=" + order + "&" + "food_id=" + food + "";
		} else {
			
		}
    });
});
