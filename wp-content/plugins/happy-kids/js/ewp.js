var sending = 0;
jQuery(document).ready(function(){
});

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+jQuery/;
  return regex.test(email);
}

function checkValidate(){
    var goDate = jQuery('select[name*="start-date"]').val();
    var goMonth = jQuery('select[name*="start-month"]').val();
    var comebackDate = jQuery('select[name*="comeback-date"]').val();
    var comebackMoth = jQuery('select[name*="comeback-month"]').val();
    var comeback = new Date(comebackDate + '/' + comebackMoth);
    var go = new Date(goDate + '/' + goMonth);
    var name = jQuery('input[name*="name"]').val();
	var phone = jQuery('input[name*="phone"]').val();
	var email =  jQuery('input[name*="email"]').val();
    
    if(comebackDate && comebackMoth && (comeback.getTime() < go.getTime())){
        alert('Ngày trở về phải lớn hơn ngày đi');
        return 0;
    }
    if(!name){
        alert('Bạn cần điền tên');
        return 0;
    }
    if(!phone){
        alert('Bạn cần điền số điện thoại');
        return 0;
    }
    /*
    if(!email) {
        alert('Bạn cần điền địa chỉ email');
        return 0;
    }
    */
    return 1;
}
