=== WP NicEdit ===
Contributors:Brajesh K. Singh
Tags: comments,rich text editor,editor,comment
Requires at least: 2.3.3
Tested up to:2.6.3
Stable tag: trunk

It turns the comment text area to a slick looking rich text editor allowing posting of images,colored texts etc in the comment. 
== Description ==
It turns wordpress comment area to a rich text comment area.It integrates Brian Kirchoff's NicEdit(a WYSIWYG editor) to wordpress comments,making 
it a content rich editable area.It increases the ability of the Comments section.Allows 
visitors to use image,color/other rich text in comment.


== Installation ==

1. Download the plugin and unzip it (didn't you already do this?).
2. Put the 'wp-niceedit' directory into your wp-content/plugins/ directory.
3. Go to the Plugins page in your WordPress Administration area and click 'Activate' next to 

WP Nice Editor.
4. That's it. Have fun!.
	
	
=Config to make it work in IE=

The default installation will work great with all non IE browsers.In IE6,the Rich text 

editor may not work by default.To make it work please follow following steps.
1.Open the comments.php of your theme.
2.Look at the  line having something like this.
 &lt; text area id="comment" columns=COLUMN Rows=ROWS ....&gt;
 
 if there is a warping paragraph tag &lt;p&gt;,remove &lt;p&gt; and make the text area 

unwrapped from &lt;p&gt;
 3.save the file and upload to your theme directory overwriting the older one.
 4.Congrats it will work fine now.

== Frequently Asked Questions ==

= It doesn't work =

Read the installation guide.

= It *still* doesn't work =
Drop a comment, I assure i will reply you within 24 hour of your comments

== Screenshots ==
1.please visit http://nicedit.com

1.screenshot-admin.png show the settings options in admin panel,please note it is taken with 

wordpress 2.6.3 installation.

2.screenshot1.png shows the default editor ,when the full panel is not activated.
3.Screenshot2.png show the comment section when full(extende panel is enabled from backend);


== Help ==
For any help please visit 

http://geekytalks.com/2008/11/wp-nicedit-updated-version-10-released.html

== Support ==
I always love to help the community.Please come and let me know the problem at my website 

http://Geekytalks.com , I assure I will certainly help you, that too without any cost.

==Miscllaneous information:==
GeekyTalks is a part of Cosmic Coders Network.Visit us at [Cosmic Coders ] (http://CosmicCoders.Com "Cosmic Coders"),If you 

wish to get a custom theme designed for you or a blog/website tailored to your need,please 

visit our specialized service at (http://ThinkingInWordpress.com "ThinkingInWordpress.com ")