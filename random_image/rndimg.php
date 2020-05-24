<?php
// POTI-boardの投稿画像をランダムで呼び出すphp
// rndimg.php(c)さこつ 2020 lot.200524a
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

//画像をチェックするログの行数

$depth = '200';

// その行数探しても画像がない時に表示する画像を指定
$default='';
//例
// $default='https://hoge.ne.jp/image.png';
//設定しないなら初期値の
// $default='';
//で。

//--------- 説明と設定ここまで ---------

include(__DIR__.'/config.php'); //config.phpの設定を読み込む

$fp = fopen(LOGFILE, "r"); //ログを開く
	$img = [];
	$i=0;
	while ($line = fgets($fp ,4096)) {
		list(,,,,,,,,,$ext,,,$time,) = explode(",", $line);
		if ($ext&&is_file(IMG_DIR.$time.$ext)){
			if(is_file(THUMB_DIR.$time.'s.jpg')){ //サムネイルはあるか?
				$img[$i]=THUMB_DIR.$time.'s.jpg';
			}
			else{//サムネイルが無かったら
				$img[$i]=IMG_DIR.$time.$ext;
			}
		}
		if($i>=$depth){break;} //$depthのぶん発言チェックして終了
		++$i;
	
	}
	fclose($fp); //ログを閉じる
	if(empty($img)){ //画像が無かったら
		$img=$default; //デフォルト画像を表示
	}

//画像を出力

shuffle($img); //シャッフル

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