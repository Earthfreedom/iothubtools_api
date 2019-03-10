$(function(){

    // データからhtmlを出力する関数
    function make_dom(data){
        var str = '';
        for (var i=0;i<data.length;i++){
            str += `<tr>
                       <td class="table-text">
                           ${data[i].device_name}
                       </td>
                       <td class="table-text">
                           ${data[i].device_id}
                       </td>
                       <td class="table-text">
                           ${data[i].user_id}
                       </td>
                       <td>
                           <button type="button" class="btn btn-danger destroy" id="${data[i].id}">削除</button>
                       </td>
                   </tr>`;
        }
        return str;
    }


    // 登録する関数
    function storeData(){
        // 送信先の指定
        var url = '/api/devices';
        // 入力情報の取得
        var data = {
            device_name:$('#device_name').val(),
            device_id:$('#device_id').val(),
            device_use_line:$('#device_use_line').val(),
            sub_device_true_or_false:$('#sub_device_true_or_false').val(),
            svg_device_1:$('#svg_device_1').val(),
            svg_device_2:$('#svg_device_2').val(),
            device_use_mA:$('#device_use_mA').val(),
            device_use_V:$('#device_use_V').val()
        };
        // console.log(data)
        // データ送信
        $.ajax({
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            url:url,
            type:'POST',
            data:JSON.stringify(data),
            processData: false,
            contentType: false
        })
            .done(function (data) {
                console.log(data);
                console.log('done');
                $('#echo').html(make_dom(data));
            })
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(XMLHttpRequest)
                console.log('fail');
            })
            .always(function () {
                console.log('post:complete');
            });
    }

    // 表示する関数
    function indexData(){
        const url = '/api';
        $.getJSON(url)
            .done(function (data, textStatus, jqXHR) {
                console.log(data);
                $('#echo').html(make_dom(data));
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.status + textStatus + errorThrown);
            })
            .always(function () {
                console.log('get:complete');
            });
    }

    // 削除する関数
    function deleteData(id){
        // 送信先の指定
        var url = `/api/device/${id}`;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url:url,
            type:'POST',
            processData: false,
            contentType: false
        })
            .done(function (data) {
                console.log(data);
                console.log('done');
                $('#echo').html(make_dom(data));
            })
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
                console.log('fail');
            })
            .always(function () {
                console.log('post:complete');
            });
    }

    // 読み込み時に実行
    indexData();
    +// 送信ボタンクリック時に登録
        $('#submit').on('click',function(){
            if(
                $('#task').val() == '' ||
                $('#deadline').val() == ''
            ){
                alert('taskとdeadlineは入力必須です！')
            }else{
                storeData();
                $('#task').val(''),
                    $('#deadline').val(''),
                    $('#comment').val('')
            }
        });

// 削除ボタンクリック時に削除
    $('#echo').on('click','.destroy',function(){
        // 削除するタスクのidを取得
        var id = $(this).attr('id');
        deleteData(id);
    });

});
