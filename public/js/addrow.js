// var product = {
    
//     顧客:[
//         '会社名',
//         '氏名',
//     ],
    
//     従業員:[
//         '従業員ID',
//         '氏名',
//         '所属',
//     ],

//     商談履歴:[
//         '商談日',
//         '会社名',
//         '担当者',
//     ]
// };

var L = 2;

var regexp = /parent/;

$(function(){

    //検索ボックスの初期値を保存
    // var noValue = $(".search_child").html();
    var noValue = $(".product_name,.quantity,.unit_price,.unit,.price").html();

    $("select").on("change",function(){

        //操作されたセレクトボックスのクラス名を取得
        var name = $(this).attr('class');

        //操作されたのが親セレクトボックスだったのみ処理続行
        if(regexp.test(name)){

            //選択された検索対象の値を取得
            var parent_value = $(this).val();

            if(parent_value){
                var item = product[parent_value];

                $(this).next().html('');

                var option;

                for(var i = 0; i < item.length; i++){
                    option  = '<option value="'+ item[i] +'">' + item[i] + '</option>';
                    $(this).next().append(option);
                }

            }else{
                //未選択を選択したら子セレクトボックスも未選択にする
                $(this).next().html(noValue);
            }
        }
    });
    
    //フォームの追加
    $(document).on("click",".add",function(){

        //追加元の範囲を取得
        var target = $(this).parent();

        //検索フォームが4つ以下だったら処理続行
        if(target.parent().children().length < 4){
            
            //プロトタイプ
            //$(this).parent().clone(true).insertAfter($(this).parent())
            //.find(".text_box").attr("name",L)

            //クローンを生成
            var clone = $(this).parent().clone(true);
            
            //$(clone).find(".text_box").attr("name",L).val('');
            //$(clone).find(".search_child > option").text('---');

            //クローン時に持ってきた入力されている値を初期化。テキストボックスのnameを変更

            // $(clone).find(".text_box,.search_child > option").attr("name",L).val('').text('');
            
            $(clone).find(".product_name,.quantity,.unit_price,.unit,.price > option").attr("name",L).text('');

            //追加
            $(clone).insertAfter($(this).parent());

            L += 1;
        }
    });

    //フォームの削除
    $(document).on("click",".del",function(){
        var target = $(this).parent();
        if(target.parent().children().length > 1) {
            target.remove();
        }
    });

});


