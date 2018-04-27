$(function() {
    $('table tr input:image').click(function() {
        var row = $(this).closest('tr').find('td:eq(0)').text();
		var cfm = confirm('Drop order ' + row + ' ?');
        
		if (cfm == true) {
			window.location.href = "/functions/del_order.php?order_id=" + row + "";
		} else {
			
		}
    });
});
