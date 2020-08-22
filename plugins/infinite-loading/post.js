// POST先のPHPファイルパス
const api_url = 'http://localdev.local/wp-content/themes/prototype/plugins/infinite-loading/loop.php';
// 初期表示投稿数
let current = 0;
// 追加取得投稿数
const add = 1;
// 追加取得トリガー要素指定
const trigger = document.getElementById('infinite_loading_button');
// 無限ローディング表示のコンテナ要素指定
const container = document.getElementById('infinite_loading_container');
trigger.addEventListener('click', () => {
  fetch(api_url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    },
    body: `currently_loaded_count=${current}&additional_loading_count=${add}`
  })
  .then((response) => {
    return response.json();
  })
  .then((json) => {
    container.insertAdjacentHTML('beforeEnd', json.content);
    if(json.count < 1) {
      trigger.remove();
    }
  })
  .catch((error) => {
    console.log(error);
  });
  current = current + add;
});