第五回社内勉強会
=====

*参加者*

*参考*

cmderでVagrantが既にインストールされているか確認
`vagrant -v`
インストールされていない場合は下記からVirtualBoxとVagrantをインストール
VirtualBox
Vagrant

workspace,作業directoryをある程度統一
自分の場合 workspace/php_workspace

`
mkdir workspace/php_workspace
cd workspace //workspaceまで移動
`

仮想環境の登録
VagrantBox から任意のdistributionを選択
`vagrant box add {title} {url}`
今回はtitleをcentos,urlを

Vagrantは一言で言えば、Oracle VirtualBox を操作するコマンドラインツールってところ。ローカルに本番と同じ環境を構築しそこで実行することで、ローカルではちゃんと動いたけど本番環境やステージング環境で動かなくなったということがなくなります。プロジェクト内に開発用端末としてWindowsを使っている人とMac使っている人が混在している場合でも、仮想環境でプログラムを実行するようにすれば環境構築手順がほとんど同じになります。

Vagrantを初期化
`vagrant init centos`
Vagrantfileを編集
`vim Vagrantfile`
26行目付近 config.vm.network :private_network, ip: "192.168.33.30"とかに変更
`vagrant up // Vagrant起動コマンド`

hosteをdevelopers.io.co.jpに変更
Hosts File Manager をインストールすれば、簡単に変更できる

teratermでVagrantに接続する場合、情報が錯綜しているっぽい
ポート 2222でid/passがvagrant keyの設定が必要かどうかと、hostの設定が不明

Vagrantに接続
`vagrant ssh`

接続後、yumで必要なものをインストールする
yumとは
いくつかのLinuxディストリビューションで標準的に利用されるパッケージ管理システム。インターネットで公開されているソフトウェアパッケージを取得して導入したり、最新の更新を適用したり、不要になったものを削除したりすることができる。パッケージ管理システムとは、パッケージに記述されている設定情報を参照して各ファイルを指定場所にコピーし、コピーしたファイルの一覧やバージョン情報などをデータベースに登録。ユーザーは各ファイルの場所やバージョン情報などをチェックする手間が省ける。

`
yum list installed ：　既にインストールしたソフトウェアの一覧を表示
yum list installed | grep ソフトウェア名　：　指定したフトウェアのバージョン名を表示
sudo yum -y install httpd // -yはインストール確認にすべてyesになるオプション
sudo yum  -y install mysql-server // MySQLインストール
sudo yum -y install php
sudo yum -y install php-mysql mysql-devel
`

vimの設定
vim .vimrc

apacheの設定 apacheの文法確認コマンド
`sudo vim /etc/httpd/conf/httpd.conf`

mysqlのパスワード設定
`mysql>set password for root@localhost=password('mypassword');`

mysqlインポート
`mysql -u root -D developers_io -p < list.sql`

DocumentRootにシンボリックリンクを貼る
cd /var/www/html // DocumentRootに移動
ln -s /vagrant/php_workspace php

Vagrantのマウントを確認
pdo確認
git clone
yumでphpとmysqlをインストール(仮想サーバー)
mysql dumpで仮データを登録
ブラウザで確認
PDOの利用


やったこと



所感


次回

