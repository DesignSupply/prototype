// WordPressディレクトリ名
const wordpress_directory = '';
// POST先のPHPファイルパス
const api_url = location.protocol + '//' + location.hostname + '/' + wordpress_directory + 'wp-content/themes/prototype/plugins/infinite-loading/loading.php';
// 初期表示投稿数（投稿取得開始位置）
let current = 3;
// 追加取得投稿数
const add = 3;
// 追加取得トリガー要素指定
const trigger = document.getElementById('infinite_loading_button');
// 無限ローディング表示のコンテナ要素指定
const container = document.getElementById('infinite_loading_container');
if(trigger) {
  trigger.addEventListener('click', function() {
    fetch(api_url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: 'currently_loaded_count=' + current + '&additional_loading_count=' + add
    })
    .then(function(response) {
      return response.json();
    })
    .then(function(json) {
      json.content.forEach(function(item) {
        container.insertAdjacentHTML('beforeEnd', item);
      })
      current = current + add;
      if(json.complete) {
        trigger.remove();
      }
    })
    .catch(function(error) {
      return error.message;
    });
  });
}