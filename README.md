## Glutton Blog

Simple file-system based blogging tool in PHP:

* Textfiles placed in the pages folder become blog posts.
* Post files can contain Markdown formatting.
* Files must be named as follows: `yyyy-mm-dd-title-of-post.markdown`

The following blog pages are automatically generated:

* Homepage `/`
* Archive page `/archive`
* Permalink Post Pages with Disqus commenting. `/yyyy/mm/dd/title-of-post`
* Atom 1.0 Feed `/atom`

Example Deployed Blog: [http://mobilehtml5.stungeye.com/](http://mobilehtml5.stungeye.com/)

**Note:** This project still needs some refactoring to remove hardcoded Disqus and Google AdSense snippets.

## License

This is free and unencumbered software released into the public domain.  See LICENSE for details.
