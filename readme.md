# Joomla Day USA Template tutorial

## Step 1 - Set up files
1. Add the required files.  
2. Now Zip it up and install it.  Don't move on until it installs.
3. Now that you have done that, you can rename all the author elements in templateDetails.xml
4. Change the template_preview.png and template_thumnail.png files
5. Ok now you're ready for Step 2

##Step 2 - Add the component
1. Add the component.

In Joomla! the component displays a component which is decided by the menu item.  You may commonly use things like com_content to show article blogs.  Or perhaps a single article.  Or perhaps you have a forms extension.  Or a shop.  Whatever it is, if we don't load the component it won't be able to load.

However, in some cases, you really don't want a component.  Say for example a page where you wanted only modules.  In those cases, simply omit the component.

##Step 3 - Set some default CSS
1. Add some CSS.  In this case we've got for the very tiny (sub 5kb) [pure.css](https://purecss.io).  
2. Let's add the link, let's add the SHA integrity key, and let's make cross origin anonymous.

##Step 4 - Add Module Positions
1. Ok that's all the CSS and JavaScript we'll add for now.  Let's add some module positions
2. I'll base the module positions on my design.  
3. You'll see we used countModules.  This checks to see if any modules are assigned to that module position.  If there aren't, we don't need to load it.

##Step 5 - add some structure to the page and call the module positions
1. Ok let's add some grid items to the page
2. I've added a full screen image to the repository.  It looks like we need:
    * The menu is 100% width
    * The hero image is 100% width
    * Below hero is a conundrum, but let's make it two columns
    * Let's make feature 2 columns
    * Our services might look like 3 columns, but let's make it a category blog.  So let's use the component in this section.
    * Reviews is 100% width
    * Call to action is 2 column
    * Footer is two rows.  A 3 colum and a 4 column
    * Below footer is 100% width
3. Let's use pure grid to create those items.                        

##Step 6 - Get Joomla! to output the modules
1. Ok I see that footer is a little more technical.  For the sake of simplicity I'll leave that as it is.
2. All the 100% sections can be left as they are as well for now - it's only a tutorial
3. But what about the 2 column sections?  We can do this within Joomla! that way if we aren't happy we can simply change the classes.
4. Let's add the module content and use Joomla! to add those classes
5. Let's start by adding the code to call the modules

##Step 7 - Strip out the HTML
1. You will see that modules load in their module positions.  But they are all 100% width.  If we add two it goes to a new row.
2. Let's remove all of our HTML except the module call.  We'll add that HTML to the module Chrome.

##Step 8 - Set up the module Chrome
1. Let's use a module chrome to create our CSS classes and surrounding HTML structure.
2. Create a folder named HTML
3. Create a file called modules.php




#### We encourage Pull requests.  Please make this template better.

###### Thanks to [Elisa Foltyn](https://www.joomla.de/wissen/joomla-tipps-im-advent/470-tuerchen-nummer-10) who created an excellent tutorial on creating your own Joomla! template on joomla.de without which I would not have managed this.  
###### And thanks to [Charlie Lodder](https://volunteers.joomla.org/joomlers/1813-charlie-lodder) for answering a question on Joomla! Stack Exchange which helped me to understand Module Chromes too.