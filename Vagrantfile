$script = <<-SCRIPT
sudo apt-get update
sudo apt-get install unzip wget nano php7.4 php7.4-common php7.4-opcache php7.4-cli php7.4-curl php7.4-xml php7.4-mbstring php7.4-xdebug -y
cd /home/vagrant/adyen-php-api-library
echo "Installing composer"
sh bin/composer-installer.sh
if [ $? -ne 0 ]
    then
        echo "Failed installing composer"
        exit 1
    else
        echo "Composer installed successfully"
        sudo mv composer.phar /bin/composer
        sudo chmod a+x /bin/composer
        composer install
fi
SCRIPT

Vagrant.configure("2") do |config|
  config.vm.box = "mpasternak/focal64-arm"
  config.vm.network "private_network", ip: "192.168.58.30"
  config.vm.provider :parallels do |v|
      v.memory = "4096"
      v.cpus = 2
  end
  config.vm.synced_folder '.', '/home/vagrant/adyen-php-api-library', disabled: false
  config.vm.network :forwarded_port, guest:3000, host: 3000
  config.vm.provision "shell", inline: $script
end
