# How to use Google Operators?

## How do I use Google for what I need to know?

Google can give you an answer to your problem really fast. Learning how to Google can change a lot in your everyday life and how fast you can find the information you want to know. For example, how you can exclude keywords or how you can put emphasis on a specific keyword or even matching the text.
Often using Google to search for an error message or a specific PHP Function is quick and gives you an appropriate answer on the first results page.

## Table of Contents

- Exclude/Emphasize/Wildcard Keywords
- Matching Text
- Data from specific Websites or TLDs
- Search for a Word's definition
- Searching for multiple things at the same time
- Searching for specific FileTypes
- Filter for a specific time range
- See who links to a Website

## Exclude and emphasize Keywords or use a wildcard

While searching for something there is a probability, that a special keyword might be connected to it, that you don't want to be included in your search.
To exclude a Keyword, simply use a "-" sign before the Keyword. For example:

```
mySearchKeyword -aKeywordIdontWant
```

To emphasize a keyword, simply use a `+` sign before the keyword. For example:

```
mySearchKeyword +anEmphasizedKeyword
```

If you do not know a fitting word, Google can take a wildcard using an `*` and Google will give you the best suitable result.

```
How to learn *
```

## Matching Text

To search for matching text in the description, surround the text in `""`. For example:

```
"My matching Text"
```

To search for matching text in the title, use the following example:

```
My Search intitle:KeywordInTitle
```

To match parts of the URL, you can use the following:

```
How to learn PHP inurl:tutorial
```

## Get data from a specific Website or Top Level Domain

If you want to have the result from a special website, Google can help you too with that. Simply use `site:`
Like with keywords, you can exclude a certain website too. This works for TLD's (Top Level Domains) too. Have a look at these examples:

```
How to learn PHP site:php.earth
How to learn PHP -site:php.earth
How to learn PHP site:edu
```

But what can we do if the website is not reachable due to server-downtime or a maintenance going on?
For that, there is an option to click on the downward arrow next to the link and choose "Cache". Google will show a cached version of that link.
Note: That only works if Google has a cached version of that link.

## Get the definition of a word

Sometimes you might encounter a word you do not know or you don't understand what it means exactly? Don't worry, Google has something for that too. Simply use define, meaning, synonym or definition like this:

```
define robot
robot definition
robot meaning
robot synonym
```

Please note: If you use the synonym, don't use the `+` Operator, as it removes synonyms of this keyword.

## Search for two things at the same time

Like in programming with using IF statements looking for some value or another, we can use OR in a Google query to get one or another like:

```
Query1 OR Query2
```

And you've guessed it. If there's `OR` there must be `AND` too. Just use it like this:

```
Query1 AND Query2
```

## Looking for specific file types

Sometimes you want some special file types, for example, a PDF document. For that Google can query based on file types.

```
filetype:pdf Query
```

You can find a FileType list [here](https://en.wikipedia.org/wiki/List_of_file_formats).

## Get content from a specific time

If you want newly released material, for example, a PHP tutorial how to make a login rather than a tutorial from years ago, you can select a specific time range by clicking Tools and the dropdown where it says "Any time". You can set the time range you want.

![Google Time Range](https://raw.githubusercontent.com/php-earth/PHP.earth/master/assets/images/general/google-time.png "Google Time Range")

## How to find out who links to my site?

Google can show you who links to your site, which can help with your SEO (even though [Google Search Console](https://www.google.com/webmasters/tools/home) is recommended for that).

```
link:php.earth
```
