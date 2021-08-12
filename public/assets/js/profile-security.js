$('#security-pin').click(function () {
    if($(this).is(':checked')){
        $('#master-escrow-edit').modal('show');
    }
})
$('#setCodeBtn').click(function () {
    if($('#master_code').val() == ''){
        $('#errorSpan').html('Please input Master Code');
        $('#errorSpan').show();
        return;
    }else if($('#master_code').val().length < 6){
        $('#errorSpan').html('Master Code should be greater 6 than digital number');
        $('#errorSpan').show();
        return;
    }else if($('#code_confirmation').val() == ''){
        $('#errorSpan').html('Please confirm Master Code');
        $('#errorSpan').show();
        return;
    }else if($('#master_code').val() != $('#code_confirmation').val()){
        $('#errorSpan').html('Please input correct confirmation code');
        $('#errorSpan').show();
        return;
    }else if($('#master_code').val() != $('#code_confirmation').val()){
        $('#errorSpan').html('Please input correct confirmation code');
        $('#errorSpan').show();
        return;
    }else{
        $('#masterCodeForm').submit();
    }
});
$('#setPasswordBtn').click(function () {
    if($('#password').val() == ''){
        $('#passErrorSpan').html('Please input Password');
        $('#passErrorSpan').show();
        return;
    }else if($('#password').val().length < 6){
        $('#passErrorSpan').html('Password length should be greater 6');
        $('#passErrorSpan').show();
        return;
    }else if($('#password_confirmation').val() == ''){
        $('#passErrorSpan').html('Please confirm Password');
        $('#passErrorSpan').show();
        return;
    }else if($('#password').val() != $('#password_confirmation').val()){
        $('#passErrorSpan').html('Please input correct confirmation code');
        $('#passErrorSpan').show();
        return;
    }else{
        $('#passwordForm').submit();
    }
});
