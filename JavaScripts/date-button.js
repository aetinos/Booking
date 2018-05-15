$(document).ready( function() {
	var minDate = new Date();
	$("#Check-In").datepicker({
		showAnim: 'drop',
		numberOfMonth: 1,
		minDate: minDate,
		dateFromat: 'dd/mm/yy',
		onClose: function(selectedDate) {
			$('#Check-Out').datepicker("option", "minDate", selectedDate);
		}
	});

	$("#Check-Out").datepicker({
		showAnim: 'drop',
		numberOfMonth: 1,
		minDate: minDate,
		dateFromat: 'dd/mm/yy'
	});
});