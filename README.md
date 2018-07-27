# Refactor!

Within this repository is a simple and working API, which has the ability to retrieve users from a CSV, however, there are many issues within the codebase. 

It's your job to refactor the code as best you see fit!

You are not excepted to add any additional functionality.

You are free to use any libraries you wish but we recommend not using any framework to demonstrate your object oriented skills.

Use this as a chance to demonstrate your ability to write clean object oriented code and respect the REST API standards, use OOP best practices like dependency inversion, abstraction, OOP design patterns, dependency injection etc.

Please email us your zipped solution.

## Installation

We have provided you with a vagrant file, which you may choose to use in order to set up a virtual environment, however, this is entirely optional.
 
### Linux

#### 1. Install Vagrant

    $ wget $(curl -sSL https://www.vagrantup.com/downloads.html | perl -0777 -pe 's/.+((https?|ftps?):[^"'"'"']+x86_64.deb).+/\1/s')
    $ sudo dpkg -i vagrant*.deb
    $ vagrant plugin install vagrant-cachier
 
#### 2. Install a supported provider

##### a. LXC

    $ sudo apt-get install lxc lxc-templates cgroup-lite redir
    $ vagrant plugin install vagrant-lxc
    $ vagrant lxc sudoers
    $ vagrant up --provider=lxc

Note: on recent versions of Ubuntu the service lxc-net may fail to start on a system reboot. If you are unable to start the vagrant machine after a reboot try running the command `sudo service lxc-net restart`.

##### b. VirtualBox

    $ sudo apt-get install virtualbox nfs-kernel-server
    $ vagrant plugin install vagrant-bindfs
    $ vagrant plugin install vagrant-vbguest
    $ vagrant up --provider=virtualbox
    
The project should now be accessible through `http://localhost:2020`
    
### Mac OS X

You must first install brew, if you haven't done so already

    $ /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"

Once that's done, run the following commands to install dependencies:

    $ brew install caskroom/cask/brew-cask
    $ brew cask install virtualbox
    $ brew cask install virtualbox-extension-pack
    $ brew cask install vagrant
    $ vagrant plugin install vagrant-cachier
    $ vagrant plugin install vagrant-bindfs
    $ vagrant plugin install vagrant-vbguest

Now you can start the virtual machine:

    $ vagrant up

#### 3. Install the project

You'll need to download composer and install it's dependencies (if you don't already have it):

    $ curl -Ss https://getcomposer.org/installer | php
    $ composer.phar install