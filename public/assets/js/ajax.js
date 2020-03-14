function AjaxCall(formData,ul,trans){ 
alert('in1');  
    	$.ajax({ url: ul,
            data: formData,
            type: 'post',
            dataType: "json",
           success: function(data){
           	alert('in 2'+data['sucess']);
           	return data;
           },
		error: function() {
		         return -1;
		      },
		    	});	
 }; 
