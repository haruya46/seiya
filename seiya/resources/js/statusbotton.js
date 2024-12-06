export const StatusButton = function () {
    $('.StatusButton').on('click', function () {
    let a = $(this);
    console.log(a.attr('title'));
        $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: a.attr('title'), 
          //formのaction要素を参照
          type: "get",  //formのmethod要素を参照
          // data: form.serialize(),     //formで送信している内容を送る
        })
        
          //通信が成功した時
        .done((res) => {
            console.log(res);
            if (res == 1) {
                // 正解の場合、クイズIDに基づいて特定のクラスの要素の色を変更
                $(this).css("color","blue");
                console.log("公開");
            } else if (res == 0) {
                // 不正解の場合
                $(this).css("color", "");
                console.log("非公開");
            }
    
        })
          //通信が失敗したとき
        .fail((error) => {
            console.log("失敗");
    
        })
    });
    }