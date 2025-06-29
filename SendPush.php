<?php
require_once 'vendor/autoload.php';

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

const VAPID_SUBJECT = 'https://push.kamichita.f5.si/';
const PUBLIC_KEY = 'BI3cmMF3aztywu1vkGxfTGpR2hFEhFSnhE1BQafj08LECgr60ET6hEMp84zNEEMYLM5_S_D7kydUdRmHD-tV5Fk';
const PRIVATE_KEY = '5exnDTaspZ5mePOgMAF0JSVkndMmKs1zB7ddBZPPnFQ';

// push通知認証用のデータ
$subscription = Subscription::create([
    'endpoint' => '「必要なトークンを変換して取得（これが重要！！！）」で取得されたendpoint',
    'publicKey' => '「必要なトークンを変換して取得（これが重要！！！）」で取得されたuserPublicKey',
    'authToken' => '「必要なトークンを変換して取得（これが重要！！！）」で取得されたuserAuthToken',
]);

// ブラウザに認証させる
$auth = [
    'VAPID' => [
        'subject' => VAPID_SUBJECT,
        'publicKey' => PUBLIC_KEY,
        'privateKey' => PRIVATE_KEY,
    ]
];

$webPush = new WebPush($auth);

$report = $webPush->sendOneNotification(
    $subscription,
    'push通知の本文だよ！'
);

$endpoint = $report->getRequest()->getUri()->__toString();

if ($report->isSuccess()) {
    echo '送信成功！';
} else {
    echo '送信失敗やで';
}
