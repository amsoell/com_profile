window.addEvent('domready', function() {
	document.formvalidator.setHandler('fullname',
		function (value) {
			regex=/^.+ .*$/;
			return regex.test(value);
	});
});