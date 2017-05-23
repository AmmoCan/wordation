# Wordation

This is a <a href="https://wordpress.org" title="Go to WordPress.org site">WordPress</a> w/ <a href="http://foundation.zurb.com/sites/docs/" title="Go to Foundation site">Foundation for Sites</a> v6.3.1 starter theme, based on <a href="http://underscores.me/" title="Go to Underscores site">Underscores</a>, which includes Font Awesome icons.

## Prerequisites
* Node.js v7.10.x and npm v4.5.x
* Gulp.js - from Terminal/Command Prompt run:
`npm install gulp-cli -g` `npm install gulp -D`

## How to get started
1. Clone or [download](https://github.com/AmmoCan/wordation/archive/master.zip "Download the Wordation Zip") the project into your `themes` directory `(./wp-content/themes)`
2. From the theme directory, run `npm install`. All of the theme dependencies will be installed into `node_modules`.
3. Run a find for the string/slug `wordation` throughout the theme and replace it with the name of your project.
4. Run `gulp serve`

## Gulp
Gulp is configured to handle Sass compiling, vendor-prefixing, CSS/JS minifying, concatenating, and browser reloading. It will be watching the Sass, JS and PHP files, and will compile once a change has been made. All while injecting new CSS after compilation and reloading the browser.

### There are 3 gulp commands you can use:
1. `gulp serve` - will run all of the gulp tasks, watch your files, and start a node server that does auto refreshing and CSS injection
2. `gulp watch` - everything in `gulp serve` except running the node server
3. `gulp` - a one-time command that will run your Sass, JS and image tasks

**CSS/Sass Tasks** – gulp will compile a compressed CSS and source-map file.

**JavaScript Tasks** - gulp will concatenate all of the JavaScript files located in `./assets/js` into a new file named `app.js`.

**What's up with the 'dist' directory?** - the `./assets/dist` directory is the production version of our project assets, where gulp will send the JS and CSS files once it's done running the designated tasks. The logic behind this is so we can keep our production ready assets separate from our dev assets. You can change where the production ready assets go by adjusting the `gulp.dest()` paths in the `gulpfile.js` for the 'js' and 'styles' tasks. Be sure to adjust your enqueue path in `functions.php` as well.

**Browsersync** - in the `gulpfile.js` file under the "Path Configs" section around line 33 you will find `var bsProxy = '';`. Since this starter theme will reside inside a WordPress installation we will need to enter either the vhost-based url `bsProxy = 'local.dev';`, a localhost address with a port `bsProxy = 'localhost:8888';`, or a localhost sub directory `bsProxy = 'localhost/site1';` for Browsersync to work. To learn more visit the <a href="https://browsersync.io/docs/options" title="Go check out the Browsersync documentation">Browsersync Docs</a>.

## How to use the Foundation Sass files
Using the `_settings.scss` file, you can overwrite a Foundation default style before things get compiled, thereby making your final CSS lighter. To do this, find the variable in the file, uncomment it, then set the value you desire. The file is located in `./assets/sass`.

Also, in the `app.scss` file, you can remove a Foundation CSS module by commenting out the associated mixin. For instance, if your project doesn't use Foundation's Orbit module, simply comment out the `@include foundation-orbit` mixin and the code will never reach your final `app.css` file.

Be sure to check out the <a href="http://foundation.zurb.com/sites/docs/" title="Go check out the Foundation documentation">Foundation for Sites Docs</a> to learn about their mixins for custom control on styles.
