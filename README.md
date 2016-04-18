Kiron October CMS
=======

The Kiron October CMS: https://octobercms.com/
October CMS Documentation: https://octobercms.com/docs/cms/themes

It uses Twig for its templates: http://twig.sensiolabs.org/
The most important information about twig and the extended features from October CMS can be found here:  https://octobercms.com/docs/markup/templating


**Only for Backend development**
October CMS is based on Laravel: http://laravel.com/docs/5.1



Setting up your local environment
-------

Will be updated soon


---


## Where to edit what? ##

**Backend**

Create appropriate plugins for your work, of course they have to be stored in the plugins directory.


----------


**Frontend**

The markup of components provided by plugins are in the folder of the plugin: *plugins/author/pluginname/components/nameofcomponent/default.htm*

All other files are in the *themes/wings* folder.

**Less/CSS**

You can find the less files in *assets/less/*.* The file that should be compiled after changes is the bootstrap.less file. As the styles.less got really long (and ugly) please create a new less file for the page your are working on (about.less, students.less, faculties.less ...) and include them in the bootstrap.less. You will need to install a less compiler if you don't have one. If you use Brackets or Atom there is a less autocompile plugin and the files are already configured to work with it.

**Content**
The content can be found in the content folder, there are subfolders for each site.

**Pages**
The pages can be found in the pages directory, please read the October CMS documentation about pages before editing the file. If you just want to do minor changes don't change anything in the first to blocks separated by the ==.

**Text you write directly in the page should be written like that:**

    {{ 'your text' |_ }}

this enables translating for this text.

**If you have bigger text parts please use the editable component with a content block:**

    title and config
    ....
    [editable about]
    file = "home/about.htm"
	...
	other components

	==
	the code section
	==
	the page
	...
	{% component 'about' %}
	...
	rest of the page

You have to create the content file in the content folder (e.g. the content/home/about.htm).

**Layouts**

All pages except the startpage are rendered in the title-text layout (layouts/title-text.htm). The start page uses the start-page.htm layout.
