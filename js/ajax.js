function ajax(handleData, action, dataString, time)
{
	if(time == null)
		time = 1000;

	setTimeout(
		function()
		{
		    $.ajax({
		        url: action,
		        type: 'post',
		        data: dataString,
		        cache: false,
		        async: true,

		        success: function (data)
		        {
		            handleData(data);
		        },
				error: function(xhr, status, error) {
					var err = eval("(" + xhr.responseText + ")");
					console.log(err.Message);
				},
	    	});
		}, time
	);
};