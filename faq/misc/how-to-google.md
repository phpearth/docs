---
image: https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/general/google-time.png
redirect_from: general/how-to-google
---

# How to use Google operators?

![Google Operators](https://media.giphy.com/media/3ohs4Aa0cVe4X22Kvm/giphy.gif "Google Operators")

Google can help you find answers to a lot of your questions. Knowing how to use
Google can improve your productivity and simplify your developer's life.

Learn how to find the relevant information you seek by excluding keywords, or
matching the entire phrases, and more. Using Google to search for an error
message or a specific PHP function is quick and gives you an appropriate answer
on the first results page.

## Exclude a keyword

While searching for something there is a probability, that you want to exclude
some keyword from the results. To exclude a keyword, use a `-` sign before the
keyword:

```text
keyword -aKeywordIdontWant
```

## Matching text

To search for exact matching text in the description, wrap the keywords in `""`:

```
"exact matching phrase"
```

To search for matching text in the title, use the `intitle:` operator:

```
my search intitle:KeywordInTitle
```

To match parts of the URL, you can use the `inurl:` operator:

```
how to learn PHP inurl:tutorial
```

The `allintitle:` operator searches all the given keywords in the title.
Similarly also the `allinurl:` works for all keywords in the URL.

## Wildcard search

If you do not know a fitting word, you can use wildcard searching using an
asterisk character `*` for similar phrases.

```
"How to learn *"
```

## Get data from a specific website or top level domain

If you want to have the result from a special website, use the `site:` operator:

```
learn PHP site:php.earth
```

Like with keywords, you can exclude a certain website too:

```
learn PHP -site:w3schools.com
```

This works for TLD's (**T**op **L**evel **D**omains) too. Notice the `.edu`
below is a TLD:

```
Learn PHP site:.edu
```

## Cached

When a website is not reachable due to server-downtime or a maintenance, sometimes
you can use a `Cached` option by clicking on the downward arrow next to the link.
Google will show you a last cached version of that link if available.

![Google Cached](https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/faq/misc/google-cached.png "Google Cached")

## Get the definition of a word

Sometimes you might encounter a word you do not know or you don't understand
what it means exactly. Don't worry, Google has a feature for that too. Simply
use `define`, `meaning`, `synonym` or `definition` keywords like this:

```
define robot
robot definition
robot meaning
robot synonym
```

> If you use the keyword `synonym`, don't use the `+` operator, as it removes
> synonyms of this keyword.

## Search for two things at the same time

Like in programming with using `IF` statements looking for some value or another,
we can use `OR` in a Google query to get results from one of the keywords:

```
keyword1 OR keyword2
```

And you've guessed it. If there's `OR` there must be `AND` too:

```
keyword1 AND keyword2
```

## Looking for specific file types

Sometimes you want to find only specific file types. For example, a PDF document.
For that, Google can search certain file type, using the `filetype:` operator:

```
keyword filetype:pdf
```

* [List of file formats](https://en.wikipedia.org/wiki/List_of_file_formats).

## Get content from a specific time

If you want newly released material (for example, a PHP tutorial for how to make
a login rather than a tutorial from years ago), you can select a specific time
range by clicking Tools and then the drop-down menu where it says `Any time`.
From there, you can set the time range you want.

![Google Time Range](https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/general/google-time.png "Google Time Range")

## How to find out who links to my site?

Google can show you who links to your site, which can help with your SEO (even
though [Google Search Console](https://www.google.com/webmasters/tools/home) is
recommended for that).

```
link:php.earth
```

## Find related sites

To find similar sites you can use `related:`

```text
related:phptherightway.com
```

## Searching images

To search for similar images go to https://images.google.com and enter either
image URL or upload an image which you want to search:

![Google images search](https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/faq/misc/google-images.png "Google Images Search")

## Advanced search

When you want even more advanced search options, use the `Advanced search`:

![Google advanced search](https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/faq/misc/google-advanced.png "Google advanced search")

After selecting `Advanced search` option, you'll see the form:

![Google advanced search](https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/faq/misc/google-advanced-2.png "Google advanced search")
