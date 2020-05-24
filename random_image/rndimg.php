<?php
// POTI-boardの投稿画像をランダムで呼び出すphp
// rndimg.php(c)さこつ 2020 lot.200524
// https://poti-k.info/
//フリーウェアですが著作権は放棄しません。
// さとぴあさん https://pbbs.sakura.ne.jp/ のnewimg.phpを参考に作りました。

// 使い方
//potiboard.phpと同じディレクトリにアップロードして
//HTMLファイルに画像を表示する時のように

//rndimg.php ←このファイルの名前をurlで指定します。

//例）
// <img src="https://hoge.ne.jp/bbs/rndimg.php" alt="" width="300">
//↑
//この例では横幅300px、高さの指定なし。

//---------------- 設定 ----------------

// 画像がない時に表示する画像を指定
$default='';
//例
// $default='https://hoge.ne.jp/image.png';
//設定しないなら初期値の
// $default='';
//で。

//--------- 説明と設定ここまで ---------

include(__DIR__.'/config.php');//config.phpの設定を読み込む

$img = glob(__DIR__.'/'.IMG_DIR.'*.{png,jpg,jpeg,gif}', GLOB_BRACE);
shuffle($img);

//画像を出力
$img_type=mime_content_type($img[0]);

switch ($img_type):
	case 'image/png':
		header('Content-Type: image/png');
		break;
	case 'image/jpeg':
		header('Content-Type: image/jpeg');
		break;
	case 'image/gif':
		header('Content-Type: image/gif');
		break;
	default :
		header('Content-Type: image/png');
	endswitch;
		
readfile($img[0]);
?>
