# -*- mode: ruby -*-
# vi: set ft=ruby :

  # Please don't change it unless you know what you're doing. -> Ok, I will not!
Vagrant.configure("2") do |config|

  # Online documentation at https://docs.vagrantup.com. -> Thanks for remm. me!

  # Boxes at https://vagrantcloud.com/search.
config.vm.box = "ubuntu/xenial64"

  # Create a forwarded port mapping. -> http://localhost:8080
config.vm.network "forwarded_port", guest: 80, host: 8080

  # Example for VirtualBox:
config.vm.provider "virtualbox" do |v|
v.memory = 2048
v.cpus = 2

end

  # Additional provisioners such as Puppet, Chef, Ansible, Salt, and Docker...
  # config.vm.provision "shell", path: "provision-script.sh"
  config.vm.provision "shell", inline: <<-SHELL

  #!/bin/bash

  set -e

  apt-get update -y
  apt-get install -y \
    apt-transport-https \
    ca-certificates \
    curl \
    software-properties-common
  curl -fsSL https://download.docker.com/linux/ubuntu/gpg | apt-key add -
  add-apt-repository \
     "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
     $(lsb_release -cs) \
     stable"
  apt-get update -y
  apt-get install -y \
         git \
         htop \
         mc \
         docker-ce
  curl -L https://github.com/docker/compose/releases/download/1.21.0/docker-compose-$(uname -s)-$(uname -m) -o /usr/local/bin/docker-compose
  chmod +x /usr/local/bin/docker-compose

  cd /vagrant/

  SHELL

end
