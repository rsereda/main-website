if [ $HOSTNAME != "homestead" ]; then
  echo ""
  echo "You are not in vagrant!"
  echo "Make sure you are in the vagrant homestead terminal"
  echo ""
  exit 0
fi

echo ""
echo ""
echo "*Installing Website on Vagrant*"

echo "udpating packages"
sudo apt-get update

echo "*Setting up main-website"
cd ~/Code/main-website
composer install
php artisan october:up
echo "*main-website setup complete"

echo "*Script complete!"
