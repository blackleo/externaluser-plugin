# externaluser-plugin
Thrid party api use to show users details in this plugin



{
    "repositories": [
        {
        "type": "vcs",
        "url": "git@github.com:blackleo/externaluser-plugin.git"
        }
    ],
    "type": "wordpress-plugin",
    "require": {
        "php": ">7.2",
        "composer/installers": "~1.7",
        "blackleo/externaluser-plugin": "^1.0"
    },
    "minimum-stability": "dev",
    "prefer-stable": true,
    "extra":[
        {
            "installer-path":{
                "{$name}/": ["type: wordpress-plugin"]
            }
        }
    ],
    "config": {
        "allow-plugins": {
            "composer/installers": true
        }
    }
}

 Please create a file named composer.json and add above code in it.
 
 And run the following command
 
 composer require "blackleo/externaluser-plugin"
 
 Than go to wp-admin and in plugin you will see the plugin please activate it.
 
 It will create a new page named external-use.
 
 When you visit it you will see all user data fetched from https://jsonplaceholder.typicode.com/users/ with functionlaty than when you click on id or firstname or lastname it wll show all the details of that perticuler user.
 
 PS:- Composer is required in your computer
 
