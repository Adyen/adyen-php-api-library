$script = <<-SCRIPT
sudo yum install epel-release yum-utils -y
sudo yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm -y
sudo yum-config-manager --enable remi-php73
sudo yum install unzip wget php php-common php-opcache php-mcrypt php-cli php-curl php-xml php-mbstring php-pecl-xdebug -y
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
  config.vm.box = "centos/7"
  config.vm.synced_folder '.', '/home/vagrant/adyen-php-api-library', disabled: false
  config.vm.synced_folder '.', '/vagrant', disabled: true
  config.vm.network :forwarded_port, guest:3000, host: 3000
  config.vm.provision "shell", inline: $script
end
