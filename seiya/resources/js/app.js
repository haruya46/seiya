import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

jQuery(document).ready(function($) {
    $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100,
 
  
     callbacks: {
      onImageUpload : function(files, editor, welEditable) {
         for(var i = files.length - 1; i >= 0; i--) {
                 sendFile(files[i], this);
          }
      }
     } 
 });
        function sendFile(file, el) {
        var form_data = new FormData();
        form_data.append('file', file);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: form_data,
            type: "POST",
            url: 'temp', // 画像保存用のルート
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $(el).summernote('insertImage', response.url);
            },
            error: function(xhr, status, error) {
                console.error("画像アップロードエラー:", error);
                alert("画像のアップロードに失敗しました。");
            },
            complete: function() {
                $('#loading-spinner').hide(); // スピナーを非表示
            }
        });
    }
});