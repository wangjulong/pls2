> delete software

    apt-get remove libreoffice-common
    apt-get remove unity-webapps-common
    apt-get remove thunderbird totem rhythmbox empathy brasero simple-scan gnome-mahjongg aisleriot gnome-mines cheese transmission-common gnome-orca webbrowser-app gnome-sudoku  landscape-client-ui-install
    apt-get remove onboard deja-dup
    
> install sunpinyin

    sudo apt-get install fcitx-pinyin
    im-config   # 配置输入法
    sudo killall ibus-daemon
    sudo fcitx -d   # 不好用

> install lamp
    
    apt-get install tasksel
    reboot（重新启动）
    tasksel （选择安装 lamp）
    apt-get update
    apt-get upgrade
    reboot（重新启动）
    apt-get install phpmyadmin
    apt-get install php-gd
    apt-get install git

> config composer

    apt-get install composer
    composer config -g repo.packagist composer http://packagist.phpcomposer.com

/root/.composer/config.json add code 

    "secure-http": "false"
    
    
    composer global require "fxp/composer-asset-plugin:~1.1.2"
    
> config apache2 vhosts
    
    git clone https://github.com/wangjulong/pls2.git
    git clone https://github.com/wangjulong/plsdev.git
    a2enmod rewrite
    
pls2.conf copy to /etc/apache2/sites-enable/pls2.conf

    cp /var/www/plsdev/pls2.conf /etc/apache2/sites-enabled/

    <VirtualHost *:80>
        ServerName frontend.dev
        DocumentRoot /var/www/pls2/frontend/web
        <Directory /var/www/pls2/frontend/web>

            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            Options -Indexes +FollowSymLinks +MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
            Require all granted
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>
    <VirtualHost *:80>
        ServerName backend.dev
        DocumentRoot /var/www/pls2/backend/web
        <Directory /var/www/pls2/backend/web>

            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            Options -Indexes +FollowSymLinks +MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
            Require all granted
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>
    <VirtualHost *:80>
        ServerName vagrant.dev
        DocumentRoot /var/www
        <Directory /var/www>
            Options +Indexes +FollowSymLinks +MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
            Require all granted
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>
    <VirtualHost *:80>
        ServerName plsdev.dev
        DocumentRoot /var/www/plsdev/frontend/web
        <Directory /var/www/plsdev/frontend/web>

            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            Options -Indexes +FollowSymLinks +MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
            Require all granted
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>
    <VirtualHost *:80>
        ServerName plsdevback.dev
        DocumentRoot /var/www/plsdev/backend/web
        <Directory /var/www/plsdev/backend/web>

            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            Options -Indexes +FollowSymLinks +MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
            Require all granted
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>
    
    
> config php-xdebug

    sudo apt install php-xdebug

    修改文件 /etc/php/7.0/apache2/php.ini
    参考官网https://www.jetbrains.com/phpstorm/help/configuring-xdebug.html

    [Xdebug]
    zend_extension="xdebug.so"
    xdebug.remote_enable=1
    xdebug.remote_port="9000"
    xdebug.profiler_enable=1
    xdebug.profiler_output_dir="tmp"
    
> config databases using phpmyadmin

> config /etc/hosts file
    
    vim /etc/hosts
    127.0.0.1       localhost
    127.0.1.1       wjl-OEM
    127.0.0.1       frontend.dev
    127.0.0.1       backend.dev
    127.0.0.1       vagrant.dev
    127.0.0.1       plsdev.dev
    127.0.0.1       plsdevback.dev
    
> config fonts

    apt-get install ttf-wqy-microhei  #文泉驿-微米黑
    apt-get install ttf-wqy-zenhei  #文泉驿-正黑
    apt-get install xfonts-wqy #文泉驿-点阵宋体

> software center Synaptic

    apt-get install synaptic gdebi

> system setting tools

    apt-get install unity-tweak-tool gnome-tweak-tool
    
> clean 

    apt-get -y autoremove 
    apt-get -y autoclean 
    apt-get -y clean
    
# auto mount HD disks settings

    # disk list check
    sudo fdisk -l 

    # disk list check UUID
    sudo blkid
    
    # add config to /etc/fstab
    UUID="9AD0EAEBD0EACD17" /media/wjl/PHP ntfs auto 0 0

# Installing Ubuntu Make

If you are on latest development Ubuntu version, first, add the Ubuntu Make ppa:

    $ sudo add-apt-repository ppa:ubuntu-desktop/ubuntu-make
    $ sudo apt-get update

Then, installing Ubuntu Make:

    $ sudo apt-get install ubuntu-make

Install visual-studio-code and phpstorm

    $ sudo umake ide visual-studio-code
    $ sudo umake ide phpstorm

# Install wine-qq

    $ sudo add-apt-repository ppa:ubuntu-wine/ppa
    $ sudo apt-get update
    $ sudo apt-get install wine-1.6-dev

在 http://www.ubuntukylin.com/ 下载 qq 安装包

    $ sudo dpkg -i deb包名

