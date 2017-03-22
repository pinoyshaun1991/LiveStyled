# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'bento/ubuntu-14.04'
  config.vm.network "forwarded_port", guest: 80, host: 2020
  config.vm.hostname = "test.local"
  config.vm.synced_folder '.', '/var/www/test'
  config.vm.provision :shell, path: "install/main.sh"

     config.vm.provider "virtualbox" do |vb|
       vb.customize ["modifyvm", :id, "--memory", "2048"]
     end

     # lxc
     config.vm.provider :lxc do |lxc, override|
       override.vm.box = "fgrehm/trusty64-lxc"
       override.vm.box_url = "https://atlas.hashicorp.com/fgrehm/boxes/trusty64-lxc/versions/1.2.0/providers/lxc.box"
     end

end