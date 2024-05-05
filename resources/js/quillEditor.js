
import Quill from 'quill';
import "quill/dist/quill.bubble.css";
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";

const quill = quillEditor("quill_editor")

window.onload = function () {
    document.getElementById('editerForm')
        .addEventListener('submit', function (event) {
            event.preventDefault();

            document.querySelector('textarea[name=content]').value = quill.root.innerHTML;

            this.submit();
        });
};


function quillEditor(make_id) {
    // ツールバー機能の設定
    const toolbarOptions = [
        // 見出し
        [{
            'header': [1, 2, 3, false]
        }],
        // 太字,アンダーバー
        ['bold', 'underline'],
        // 文字色
        [{
            'color': []
        },
        ],
        // リスト
        [{
            'list': 'ordered'
        },
        {
            'list': 'bullet'
        }
        ],
        // 画像挿入
        ['image'],
        // 動画
        ['video'],
        // URLリンク
        ['link']
    ];

    make_id = '#' + make_id;

    // エディタの情報を生成
    const quill = new Quill(make_id, {
        modules: {
            toolbar: toolbarOptions
        },
        theme: set_themes()
    });

    return quill;
}


// テーマ設定（PCとSPでテーマを切り替える）
function set_themes() {
    let themes;
    if (window.parent.screen.width > 750) {
        themes = "snow";
    } else {
        themes = "bubble";
    }
    return themes;
}