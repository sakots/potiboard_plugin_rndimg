# potiboard_plugin rndimg

お絵かき掲示板 POTI-board のための外部phpプログラムです。 https://poti-k.info/

## rndimg.php

さとぴあさんの [newimg.php](https://github.com/satopian/potiboard_plugin) を参考に、ランダムで画像を表示するphpを作りました。

## 設置方法

1. [POTI改公式サイト](https://poti-k.info/)からPOTI-boardをダウンロードして設置します。
2. rnd.phpを potiboard.phpと同じディレクトリにアップロードします。

## 特徴

POTI-boardの画像保存フォルダからランダムに画像を表示します。楽しいだけ。

## 使い方

- 画像と同じようにこのphpのファイルをimgタグで呼び出します。
  - HTMLファイルに `<img src="https://hoge.ne.jp/bbs/newimg.php" alt="" width="300">` のように書きます。
- 画像が無い時にデフォルト画像を表示させる事もできます。

## 履歴

### [2020/05/24] lot.200524

- GitHubに公開