<?php
require_once 'vendor/autoload.php';

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

const VAPID_SUBJECT = 'https://gafu8383.github.io/push';
const PUBLIC_KEY = 'BLRmm8Be6bli2tddSYqWcVoUydC1FCgHyP9iBiMeL2iOHMip4A6J_iqh1Xsg6M7303KpovBNwg2qIkVplBFzTeQ';
const PRIVATE_KEY = 'dadf3mFFTx8f3T4D7jDh2Mb5VvzvBOCTOWBgW08rGLo';

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
