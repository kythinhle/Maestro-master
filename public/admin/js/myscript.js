$(document).ready(function() {
	$("div.alert").delay(3000).slideUp();
});

$(document).ready(function() {
	$("#createThumbnail").click(function() {
		$("#insert").append('<div class="form-group"> <label>New thumbnail image</label> <input type="file" name="fEditDetail[]"> </div>'); 
	});
});

$(document).ready(function() {
	$("a#delThumbnail").on('click', function(){
		var url = "http://onlineshop.dev/admin/product/delthumb/";
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
		var idHinh = $(this).parent().find('img').attr('idHinh');
		var img = $(this).parent().find('img').attr('src');
		var rid = $(this).parent().find('img').attr('id');
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			cache: false,
			data: {"_token" : _token, "idHinh" : idHinh, "urlHinh" : img},
			success: function(data){
				if(data == "ok"){
					$("#" +rid).remove();
				}else{
					alert("Lỗi! Không xóa được");
				}
			}
		});
	})
});