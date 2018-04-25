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

  WORKDIR=/home/vagrant/rename.kr.ua/

  if [ ! -e rename.kr.ua ]; then
      git clone https://github.com/Onix-Systems/rename.kr.ua.git
      cp /vagrant/Dockerfile  ${WORKDIR}
      cp /vagrant/rmkr.sql  ${WORKDIR}
      cp /vagrant/credential  ${WORKDIR}
      cd ${WORKDIR}
  else
      cd ${WORKDIR}
      git pull
  fi

  docker pull mysql:5.7
  docker pull php:7.0-apache
  source /vagrant/credential

  CMYSQL=${MYSQL_HOSTNAME}
  CWEB=rename.kr.ua
  CWEBIMG=${CWEB}:latest
  for CONTAINER in ${CWEB} ${CMYSQL}; do
      if [ ! -z "$(docker ps -q -f name=${CONTAINER})" ]; then
          docker stop ${CONTAINER}
          docker rm ${CONTAINER}
      fi
  done

  if [ -z "$(docker ps -q -f name=${CMYSQL})" ]; then

      docker build -t ${CWEBIMG} .

      docker run --name ${CMYSQL} -v /var/lib/mysql:/var/lib/mysql \
                 -v ${WORKDIR}/rmkr.sql:/docker-entrypoint-initdb.d/rmkr.sql:ro \
                 --env-file ${WORKDIR}credential -e MYSQL_RANDOM_ROOT_PASSWORD=yes \
                 --restart always \
                 -d mysql:5.7

      docker run -d --restart always --name ${CWEB} -p 80:80 \
                 --link ${CMYSQL} --env-file ${WORKDIR}credential \
                 ${CWEBIMG}
  fi

  SHELL

end
