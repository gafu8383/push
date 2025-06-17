// プッシュ通知を受け取ったときのイベント
self.addEventListener('push', function (event) {
    const title = 'Push通知テスト';
    const options = {
        body: event.data.text(), // サーバーからのメッセージ
        tag: title, // タイトル
        icon: 'icon-512x512.png', // アイコン
        badge: 'icon-512x512.png' // アイコン
    };

    event.waitUntil(self.registration.showNotification(title, options));
});

// プッシュ通知をクリックしたときのイベント
self.addEventListener('notificationclick', function (event) {
    event.notification.close();

    event.waitUntil(
        // プッシュ通知をクリックしたときにブラウザを起動して表示するURL
        clients.openWindow('https://nnahito.com/')
    );
});


// Service Worker インストール時に実行される
// キャッシュするファイルとかをここで登録する
self.addEventListener('install', (event) => {
    console.log('service worker install ...');
});
