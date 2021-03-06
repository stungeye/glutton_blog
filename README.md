## Glutton Blog

Simple file-system based blogging tool in PHP:

* Textfiles placed in the pages folder become blog posts.
* Post files can contain Markdown formatting.
* Files must be named as follows: `yyyy-mm-dd-title-of-post.markdown`
* The system is configured via the $conf hash defined in `config.php`

The following blog pages are automatically generated:

* Homepage `/`
* Archive page `/archive`
* Permalink Post Pages with Disqus commenting. `/yyyy/mm/dd/title-of-post`
* Atom 1.0 Feed `/atom`

Includes and Relies On:

* [PHP Markdown Extra](http://michelf.com/projects/php-markdown/extra/)
* [Highlight.js Syntax Highlighting for Code Blocks](http://softwaremaniacs.org/soft/highlight/en/)
* [Disqus Comments](http://disqus.com)
* ModRewrite via `.htaccess` for pretty URLs.

Example Deployed Blog: [http://mobilehtml5.stungeye.com/](http://mobilehtml5.stungeye.com/)

**Note:** This project still needs some refactoring to remove hardcoded Google AdSense snippets.

## License

This is free and unencumbered software released into the public domain.  See LICENSE for details.
