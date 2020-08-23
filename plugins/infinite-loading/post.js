// POST先のPHPファイルパス
const api_url = 'http://localdev.local/wp-content/themes/prototype/plugins/infinite-loading/loop.php';
// 初期表示投稿数（投稿取得開始位置）
let current = 3;
// 追加取得投稿数
const add = 3;
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
    console.log(json.content[0])
    json.content.forEach((item) => {
      container.insertAdjacentHTML('beforeEnd', item);
    })
    current = current + add;
    if(json.complete) {
      trigger.remove();
    }
  })
  .catch((error) => {
    return error.message;
  });
});