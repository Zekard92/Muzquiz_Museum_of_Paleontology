# Museo de Paleontología Múzquiz
This is the official website repo for Múzquiz's Paleontology Museum.

# setup
This webapp depends on Apache2 to work, be sure to have it configured before begining to work.

The app is expecting you to route the traffic a the root of the file system, then,
a .htaccess file with re-route it into public/index.php, which begins the application.

When the application is installed, it requires you to configure certain composer commands:
- ´composer install´
- ´composer dump-autoload´

These commands will install the dependencies required by the project and dump-autoload to load all the php classes.
