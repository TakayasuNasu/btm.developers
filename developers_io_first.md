第一回社内勉強会
=========

参考
* [VirtualBox] - VirtualBoxダウンロード
* [Vagrant] - Vagrantダウンロード
* [Vagrant + Chef Solo] - サックリ始めるためのチュートリアル
* [Berkshelf] - Berkshelfを試してみる
* [環境構築] - VagrantとChefを使った環境構築
* [cmder] - ポータブルなWindows用コンソールエミュレータ
* [chef-repo] - 個人的に年末作ったChef+Berkshelf
* [chef-repo] - 個人的に年末作ったChef+Berkshelf
* [chef-repo] - 個人的に年末作ったChef+Berkshelf

各種コマンド

```sh
# CentOSをダウンロード
vagrant box add centos http://developer.nrel.gov/downloads/vagrant-boxes/CentOS-6.4-x86_64-v20130427.box

# vagrantにboxが追加されたか確認
vagrant box list

# 仮想環境を初期化
vagrant init centos

# カレントディレクトリがどこにあってもVagrant sshできるようにする
vagrant ssh-config --host centos >> ~/.ssh/config

# gemでChefをインストール
gem i chef --no-ri --no-rdoc

# knife-soloをインストール
gem i knife-solo --no-ri --no-rdoc --pre

# knifeの設定
knife configure

# knife-soloでリポジトリを作成
knife solo init chef-repo

# Berkshelfをインストール
gem i berkshelf --no-ri --no-rdoc

# レシピをダウンロード
berks install --path cookbooks

# 仮想環境にchefをインストール
knife solo prepare centos

# 仮想環境へ設定を反映させる
knife solo cook centos

```

[VirtualBox]:https://www.virtualbox.org/wiki/Downloads
[Vagrant]:http://www.vagrantup.com/
[Vagrant Box]:http://www.vagrantbox.es/
[Vagrant + Chef Solo]:http://qiita.com/taiki45/items/b46a2f32248720ec2bae
[Berkshelf]:http://qiita.com/uchiunyo/items/5aa243f7a39ae443e10d
[環境構築]:http://qiita.com/hamichamp/items/e27a0ecacc33482936c8
[cmder]:http://bliker.github.io/cmder/
[chef-repo]:http://www.i-nasu.com/gitbucket/taka/my_cher_repo
