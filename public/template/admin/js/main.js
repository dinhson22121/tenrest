$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/*Delete*/
function removeRow(id,url) {
    if (confirm("Bạn có chắc muốn xoá ?")){
        $.ajax({
             type : 'DELETE',
            datatype: 'JSON',
            data :{id},
            url: url,
            success:function (result){
              if (result.error === false){
                  alert(result.messages)
                  location.reload();
              }else {
                  alert('Xoá lỗi vui lòng thử lại')
              }
            }
        })
    }
}


/*upload*/
$('#upload').change(function (){
    const form = new FormData();
    form.append('file',$(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataTable: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success:function (results){
            console.log(results.url)
            if (results.error === false){
                $('#img_show').html('<a href="'+results.url+'" target="_blank">' +
                    '<img src="'+results.url+'"  width="100px"></a>');

                $('#image').val(results.url);
            }else alert("Upload file bị lỗi");
        }
    })
})

$('#upload').change(function (){
    const form = new FormData();
    form.append('file',$(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataTable: 'JSON',
        data: form,
        url: '/user/upload/services',
        success:function (results){
            console.log(results.url)
            if (results.error === false){
                $('#image_show').html('<a href="'+results.url+'" target="_blank">' +
                    '<img src="'+results.url+'"  width="200px"></a>');

                $('#file').val(results.url);
            }else alert("Upload file bị lỗi");
        }
    })
})
